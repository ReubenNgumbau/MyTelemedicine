<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Replace with your database connection code
include'connection.php';

    // Retrieve data from the form
    $doctorName = $_POST["doctor_name"];
    $patientName = $_POST["patient_name"];
    $request = $_POST["request"];

    // Insert the consultation request into the database
    $sql = "INSERT INTO consultations (doctor_name, patient_name, request, status)
            VALUES ('$doctorName', '$patientName', '$request', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Consultation request submitted successfully.");</script>';
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule Consultations</title>
    <!-- Add your CSS styles here if needed -->
</head>
<body>
    <h1>Schedule a Consultation</h1>
    <div class="container">
        <form method="post" action="schedule_consultations.php">
            <label for="doctor_name">Doctor's Name:</label>
            <input type="text" name="doctor_name" required><br>

            <label for="patient_name">Patient's Name:</label>
            <input type="text" name="patient_name" required><br>

            <label for="request">Consultation Request:</label>
            <textarea name="request" required></textarea><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>


