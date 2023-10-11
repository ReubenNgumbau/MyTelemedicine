<?php
// Include necessary files (sidebar.php, connection.php, and session.php)

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize and retrieve the appointment ID from the URL
    $appointment_id = intval($_GET['id']);

    // Perform any necessary validation or security checks here

    // Connect to the database (you can use your existing connection code)
    include 'connection.php';

    // Create a query to delete the appointment with the specified ID
    $delete_query = "DELETE FROM appointments WHERE id = $appointment_id";

    // Execute the query
    if (mysqli_query($conn, $delete_query)) {
        // Appointment deleted successfully
        header("Location: view_appointments.php"); // Redirect to the appointment list page
        exit();
    } else {
        // Handle any errors that occurred during the deletion
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // 'id' parameter is not set in the URL, handle this case as needed
    echo "Invalid request";
}
?>
