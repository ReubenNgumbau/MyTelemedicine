<?php
// For example, you can store the data in a database
    // Replace these lines with your database code
    $servername = "localhost";
    $username = "root";
    $db_password = ""; // Change this variable name to avoid conflict
    $database = "telemedicine";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 ?>