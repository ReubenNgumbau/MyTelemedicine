<?php
// Database connection parameters
include'connection.php';

// Sample doctors data
$doctors = [
    ['johndoe@gmail.com', 'Cardiology'],
    ['janesmith@gmail.com', 'Orthopedics'],
    ['sarahjohnson@gmail.com', 'Pediatrics'],
    // Add more doctors here
];

// // Create a database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check if the connection is successful
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Insert doctors into the database
foreach ($doctors as $doctor) {
    $name = $doctor[0];
    $area_of_treatment = $doctor[1];

    $sql = "INSERT INTO doctors (name, area_of_treatment) VALUES ('$name', '$area_of_treatment')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor inserted successfully: $name - $area_of_treatment<br>";
    } else {
        echo "Error inserting doctor: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
