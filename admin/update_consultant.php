<?php
$servername = "localhost";
$username = "root";
$db_password = ""; // Change this variable name to avoid conflict
$database = "telemedicine";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    $user_id = $_POST["consultant_id"]; // Change variable name to user_id
    $new_role_id = $_POST["new_role_id"];

    // Add proper input validation here, e.g., checking for empty fields, valid input, etc.

    try {
        // Check if the user with the provided ID exists in the consultants table
        $check_sql = "SELECT * FROM consultants WHERE user_id = :user_id";
        $stmt = $conn->prepare($check_sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Update the user's role_id
            $update_sql = "UPDATE consultants SET role_id = :new_role_id WHERE user_id = :user_id";
            $stmt = $conn->prepare($update_sql);
            $stmt->bindParam(':new_role_id', $new_role_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            // Redirect to a success page or perform other actions as needed
            $message = 'User updated successfully.';
        } else {
            // User with the provided ID does not exist in the consultants table, handle the error here
            echo "Consultant not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Consultant Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Update Consultant Role</h1>
    <div class="container">
        <form method="POST" action="">
            <label for="consultant_id">Select Consultant:</label>
            <select name="consultant_id" id="consultant_id">
                <?php
                // Display options for full_name from the consultants table
                try {
                    $select_sql = "SELECT user_id, full_name FROM consultants"; // Change to user_id
                    $result = $conn->query($select_sql);

                    foreach ($result as $row) {
                        echo "<option value='" . $row['user_id'] . "'>" . $row['full_name'] . "</option>"; // Change to user_id
                    }
                } catch (PDOException $e) {
                    echo "Error fetching consultant names: " . $e->getMessage();
                }
                ?>
            </select>
            <br>
            <label for="new_role_id">Select New Role:</label>
            <select name="new_role_id" id="new_role_id">
                <option value="1">Doctor</option>
                <option value="2">Admin</option>
            </select>
            <br>
            <input type="submit" value="Update Role">
        </form>
    </div>
</body>
</html>
