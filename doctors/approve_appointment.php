<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['appointment_id'])) {
        $appointmentId = $_POST['appointment_id'];

        // Update the appointment status to 'Approved' in the database
        $sql = "UPDATE appointments SET status = 'Approved' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $appointmentId);

        if ($stmt->execute()) {
            // Successful update
            echo "Appointment approved successfully!";
        } else {
            // Error updating the appointment
            echo "Error: Unable to approve the appointment.";
        }
    } else {
        // Invalid request, appointment_id parameter missing
        echo "Error: Missing appointment_id parameter.";
    }
} else {
    // Invalid request method
    echo "Error: Invalid request method.";
}
?>


