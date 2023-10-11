<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $feedback = $_POST["feedback"];

    // Perform input validation here, e.g., check if fields are not empty, sanitize inputs, etc.

    // Assuming you have a table named "survey_responses" with columns: id, name, email, rating, feedback
    $query = "INSERT INTO survey_responses (name, email, rating, feedback) VALUES (?, ?, ?, ?)";
    
    // Prepare the query
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("ssis", $name, $email, $rating, $feedback);

        // Execute the query
        if ($stmt->execute()) {
            // Data inserted successfully
            header("Location: thank_you.php"); // Redirect to a thank you page
            exit();
        } else {
            // Error handling if the query fails
            $error_message = "Error: " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error handling if the query preparation fails
        $error_message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Platform Survey - Processing</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add any additional styling for this page if needed */
    </style>
</head>
<body>
    <header>
        <h1>Survey Processing</h1>
    </header>
    <main>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } else { ?>
            <p>Thank you for completing the survey!</p>
            <!-- Add any additional content or messages you want to display -->
        <?php } ?>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Faster Healing Tech Kenya.
    </footer>
</body>
</html>
