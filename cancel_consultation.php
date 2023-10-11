<?php
// Include the database connection parameters
include 'connection.php';
include 'sidebar.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the cancel button is clicked
    if (isset($_POST['cancel_button'])) {
        $appointment_id = $_POST['appointment_id'];

        // Delete the appointment from the appointments table
        $delete_sql = "DELETE FROM appointments WHERE id = $appointment_id";

        if ($conn->query($delete_sql) === TRUE) {
            // Handle successful deletion (e.g., display a success message)
            $notification = "Appointment canceled successfully.";
            $result = true;
        } else {
            // Handle deletion error (e.g., display an error message)
            $notification = "Error: " . $delete_sql . "<br>" . $conn->error;
        }
    }
}

// Query to retrieve appointments for the logged-in patient
$patient_name = $_SESSION['name'];
$sql = "SELECT * FROM appointments WHERE patient_name = '$patient_name'";
$result = $conn->query($sql);

// Initialize an array to store the appointments
$appointments = [];

if ($result->num_rows > 0) {
    // Fetch each appointment's data and store it in the $appointments array
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cancel Appointment</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            margin: 0;
            padding-left: 300px;
            margin-top: 60px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-left: 280px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        form {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            margin-left: 250px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Notification styling */
        #notification {
            position: fixed;
            top: 10px;
            /* Adjust the top position as needed */
            right: 10px;
            /* Adjust the right position as needed */
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
            /* Ensure it's above other elements */
        }

        .cancel-button {
            background-color: red;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
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
    <h1>Your Appointments</h1>
    <?php if (!empty($appointments)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
            </tr>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td>
                        <?= $appointment['id']; ?>
                    </td>
                    <td>
                        <?= $appointment['doctor_name']; ?>
                    </td>
                    <td>
                        <?= $appointment['appointment_date']; ?>
                    </td>
                    <td>
                        <?= $appointment['status']; ?>
                    </td>
                    <td>
                        <form method="post" action="">
                            <!-- Hidden input to store the appointment ID -->
                            <input type="hidden" name="appointment_id" value="<?= $appointment['id']; ?>">
                            <button class="cancel-button" type="submit" name="cancel_button">Cancel</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>

    <!-- Display the notification -->
    <div id="notification">
        <?php echo $notification; ?>
    </div>

    <!-- Add your JavaScript for displaying the notification here -->
    <script>
        <?php if (!empty($notification)): ?>
            // JavaScript code to show a notification when there is a notification
            window.onload = function () {
                var notificationDiv = document.getElementById("notification");
                notificationDiv.style.display = "block";
                setTimeout(function () {
                    notificationDiv.style.display = "none";
                }, 3000); // Display the notification for 3 seconds
            };
        <?php endif; ?>
    </script>
</body>

</html>