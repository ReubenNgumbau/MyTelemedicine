<?php
// Include the database connection parameters
include 'connection.php';
// include 'session.php';
include 'sidebar.php';
$patient_name = $_SESSION['name'];

// Initialize variables for notification and result
$notification = "";
$result = false;

// Query to retrieve doctors from the database
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql); 

// Initialize an array to store the doctors
$doctors = [];

if ($result->num_rows > 0) {
    // Fetch each doctor's data and store it in the $doctors array
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patient_name = $_POST['patient_name'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    
    // You can set the appointment_time as needed; I'm assuming you want to set it to the current time.
    $appointment_time = date("H:i:s");
    
    // Set the current date and time for created_at and updated_at
    $current_datetime = date("Y-m-d H:i:s");

    // Insert the data into the appointments table
    $sql = "INSERT INTO appointments (doctor_name, patient_name, appointment_date, appointment_time, status, created_at, updated_at)
    VALUES (
        (SELECT name FROM doctors WHERE id = $doctor_id),
        '$patient_name',
        '$appointment_date',
        '$appointment_time',
        'Pending',  -- Set the initial status to 'Pending'
        '$current_datetime',
        '$current_datetime'
    )";


    if ($conn->query($sql) === TRUE) {
        $notification = "Appointment booked successfully.";
        $result = true;
    } else {
        $notification = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
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
    </style>
</head>
<body>
<h1>Our Doctors</h1>
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
    
    <form method="post" action="">
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
<?php if (!empty($notification)) : ?>
    // JavaScript code to show a notification when there is a notification
    window.onload = function() {
        var notificationDiv = document.getElementById("notification");
        notificationDiv.style.display = "block";
        setTimeout(function() {
            notificationDiv.style.display = "none";
        }, 3000); // Display the notification for 3 seconds
    };
<?php endif; ?>
</script>
</body>
</html>
