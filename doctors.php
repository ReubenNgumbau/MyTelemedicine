<?php
// Include the database connection parameters
include 'connection.php';
include 'session.php';
// include 'process_form.php';

$patient_name = $_SESSION['name'];
// Query to retrieve doctors from the database
$sql_statement = "SELECT * FROM doctors";
$result_1 = $conn->query($sql_statement );

// Initialize an array to store the doctors
$doctors = [];

if ($result_1->num_rows > 0) {
    // Fetch each doctor's data and store it in the $doctors array
    while ($row = $result_1->fetch_assoc()) {
        $doctors[] = $row;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor List</title>
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
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
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
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 999;
        }
    </style>
</head>
<body>
    <h1>Doctor List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Area of Treatment</th>
        </tr>
        <?php foreach ($doctors as $doctor) : ?>
            <tr>
                <td><?= $doctor['id']; ?></td>
                <td><?= $doctor['name']; ?></td>
                <td><?= $doctor['area_of_treatment']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- Add your form code here -->
    <form action="process_form.php" method="post">
        <!-- Add form fields here -->
        <label for="patient_name">Consultant:</label>
        <input type="text" name="patient_name" value="<?php echo $patient_name; ?>" readonly>
        
        <label for="doctor_id">Select Doctor:</label>
        <select id="doctor_id" name="doctor_id" required>
            <?php foreach ($doctors as $doctor) : ?>
                <option value="<?= $doctor['id']; ?>"><?= $doctor['name']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="appointment_date">Book Appointment:</label>
        <input type="date" id="appointment_date" name="appointment_date" required>

        <input type="submit" value="Submit">
    </form>
    <!-- Display the notification -->
    <div id="notification">
        <?php echo $notification; ?>
    </div>

    <!-- Add your JavaScript for displaying the notification here -->
    <script>
<?php if (!empty($noti_fication)) : ?>
    // JavaScript code to show a notification when there is a notification
    window.onload = function() {
        var notificationDiv = document.getElementById("notification");
        notificationDiv.style.display = "block";
        setTimeout(function() {
            notificationDiv.style.display = "none";
        }, 3000); // Display the notification for 3 seconds
    }
<?php endif; ?>

    </script>
</body>
</html>







