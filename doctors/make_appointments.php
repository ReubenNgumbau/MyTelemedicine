<?php
// Include necessary files
include 'connection.php';
include 'doctor_dashboard.php';

// Check if the user is logged in and has the necessary permissions
if (!isset($_SESSION['name'])) {
    // Redirect to a login page or handle unauthorized access
    exit("Unauthorized access");
}

$doctor_name = $_SESSION['name'];

// Use prepared statements to prevent SQL injection
$sql = "SELECT id, patient_name, appointment_date, status FROM appointments WHERE doctor_name = ? AND status = 'Pending'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $doctor_name);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointments - Telemedicine Platform</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
            padding-left: 300px;
            margin-top: 60px;
        }
        h2 {
            /* background-color: #007BFF;
            color: #fff;
            padding: 20px; */
            text-align: center;
            padding-left: 300px;
            margin-top: 80px;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-left: 280px;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        p {
            margin-left: 280px;
            font-size: 18px;
            color: #333;
            /* Change the text color */
            background-color: #f9f9f9;
            /* Add a background color */
            padding: 10px;
            /* Add some padding */
            border-radius: 5px;
            /* Add rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow */
        }
    </style>
</head>
<body>
    <!-- <h1>Appointments</h1> -->
    <h2>Pending Consultation Requests</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($appointment = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $appointment['id']; ?></td>
                <td><?= $appointment['patient_name']; ?></td>
                <td><?= $appointment['appointment_date']; ?></td>
                <td><?= $appointment['status']; ?></td>
                <td><button onclick="approveAppointment(<?= $appointment['id']; ?>)">Approve</button></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php if ($result->num_rows === 0): ?>
    <p>No consultation requests found.</p>
<?php endif; ?>


    <!-- Add your JavaScript function to approve appointments here -->
    <script>
    function approveAppointment(appointmentId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Successful response
                    alert(xhr.responseText); // Display the success message
                    location.reload(); // Refresh the page if needed
                } else {
                    // Error response
                    alert("Error: " + xhr.status + " - " + xhr.statusText);
                }
            }
        };

        xhr.onerror = function () {
            // Network error
            alert("Network error occurred.");
        };

        xhr.open("POST", "approve_appointment.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("appointment_id=" + appointmentId);
    }
    </script>
</body>
</html>


