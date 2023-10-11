<?php
include 'sidebar.php';
include 'connection.php';
include 'session.php';

$consultant = $_SESSION['name'];
$errorMessage = "";

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Retrieve consultation requests for the logged-in user from the database
$sql = "SELECT doctor_name, appointment_date, description FROM consultations WHERE consultant = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $consultant);
    $stmt->execute();
    $stmt->bind_result($doctorName, $appointmentDate, $description);

    $consultationRequests = array();

    while ($stmt->fetch()) {
        $consultationRequests[] = array(
            'doctor_name' => $doctorName,
            'appointment_date' => $appointmentDate,
            'description' => $description
        );
    }

    $stmt->close();
} else {
    // Error preparing the SQL statement
    $errorMessage = "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Consultations</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            color: #333;
            padding-left: 45px;
            margin-top: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        textarea {
            resize: none;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .no-requests {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <h2>Consultation Requests</h2>
    <div class="container">
        <?php
        if (!empty($errorMessage)) {
            echo '<div class="error-message">' . $errorMessage . '</div>';
        }
        ?>
        <form>
            <?php
            if (count($consultationRequests) > 0) {
                foreach ($consultationRequests as $request) {
                    echo '<div class="form-group">';
                    echo '<label for="doctor_name">Doctor Name:</label>';
                    echo '<input type="text" name="doctor_name" value="' . htmlspecialchars($request['doctor_name']) . '" readonly>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="appointment_date">Appointment Date and Time:</label>';
                    echo '<input type="text" name="appointment_date" value="' . htmlspecialchars($request['appointment_date']) . '" readonly>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="description">Description:</label>';
                    echo '<textarea name="description" rows="4" readonly>' . htmlspecialchars($request['description']) . '</textarea>';
                    echo '</div>';
                }
            } else {
                echo '<p class="no-requests">No consultation requests found.</p>';
            }
            ?>
        </form>
    </div>
</body>
</html>





