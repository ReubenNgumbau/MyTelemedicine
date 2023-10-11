<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    $full_name = $_POST["full_name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];

    // Add proper input validation here, e.g., checking for empty fields, valid email format, etc.

    // Create a PDO connection to the database
    $servername = "localhost";
    $username = "root";
    $db_password = ""; // Change this variable name to avoid conflict
    $database = "telemedicine";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the consultant with the same email already exists
        $check_sql = "SELECT * FROM consultants WHERE email = :email";
        $stmt = $conn->prepare($check_sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Consultant with this email already exists, handle the error here
            echo "Consultant with this email already exists. Please use a different email.";
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Assign a default role_id to the user (e.g., 0 for regular users)
            $default_role_id = 0;

            // Insert data into the database, including the default role_id
            $insert_sql = "INSERT INTO consultants (full_name, gender, email, password, dob, phone, role_id)
                           VALUES (:full_name, :gender, :email, :password, :dob, :phone, :role_id)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':role_id', $default_role_id);
            
            $stmt->execute();

            // Redirect to a success page or perform other actions as needed
            header("Location: login.php");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null; // Close the database connection
}
?>




