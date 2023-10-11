<?php
include 'connection.php';
include'session.php';

$doctor_name = $_SESSION['name']; // Assuming this variable contains the logged-in user's ID
$query = "SELECT * FROM appointments WHERE doctor_name = $doctor_name AND status = 'pending'";
$result = mysqli_query($conn, $query);

$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

echo json_encode($appointments);
?>
