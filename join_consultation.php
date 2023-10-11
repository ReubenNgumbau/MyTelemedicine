<?php
include 'sidebar.php';
include 'connection.php';
// include 'session.php';

$errorMessage = "";

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set
    if (isset($_POST['consultation_id'])) {
        // Retrieve form data
        $consultationId = $_POST['consultation_id'];
        
        // You should have a mechanism to verify that the logged-in user has permission to join this consultation
        // This could involve checking the user's role and the consultation details
        
        // Assuming you have verified the user's permission, you can generate the Zoom meeting URL here.
        $zoomMeetingUrl = generateZoomMeetingUrl($consultationId); // Implement this function

        if ($zoomMeetingUrl) {
            // Redirect the user to the Zoom meeting URL
            header('Location: ' . $zoomMeetingUrl);
            exit();
        } else {
            // Handle the case where the Zoom meeting URL cannot be generated
            $errorMessage = "Unable to join the consultation. Please try again later.";
        }
    } else {
        // Not all required fields are set, display an error message
        $errorMessage = "Invalid request.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Join Consultation</title>
    <!-- Add your CSS and JavaScript for the Join Consultation page here -->
</head>
<body>
    <h2>Join Consultation</h2>
    <?php
    if (!empty($errorMessage)) {
        echo '<div style="color: red;">' . $errorMessage . '</div>';
    }
    ?>

    <!-- Display the list of available consultations for the user to choose from -->
    <ul>
        <!-- Loop through the user's consultations and generate a list of options -->
        <?php
        // Replace this with code to fetch and display the user's consultation requests
        foreach ($userConsultations as $consultation) {
            echo '<li>';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="consultation_id" value="' . $consultation['id'] . '">';
            echo '<button type="submit">Join Consultation with Dr. ' . $consultation['doctor_name'] . '</button>';
            echo '</form>';
            echo '</li>';
        }
        ?>
    </ul>

    <!-- Add any additional content or styling for the Join Consultation page here -->
</body>
</html>



