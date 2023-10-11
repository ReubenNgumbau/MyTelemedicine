<!DOCTYPE html>
<html>
<head>
    <title>Approve Consultations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .consultation {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .approve-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .approve-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Consultation Requests</h1>
    <div class="container">
        <?php
        // Replace with your database connection code
 include'connection.php';
        // Fetch consultation requests from the database
        $sql = "SELECT * FROM consultations WHERE status = 'pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="consultation">';
                echo '<h3>Doctor: ' . $row["doctor_name"] . '</h3>';
                echo '<p>Patient: ' . $row["patient_name"] . '</p>';
                echo '<p>Request: ' . $row["request"] . '</p>';
                echo '<form method="post" action="approve_consultation.php">';
                echo '<input type="hidden" name="consultation_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="approve-button" name="approve">Approve</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No pending consultation requests.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>


