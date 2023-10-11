<?php
include 'connection.php';

// Define default roles
$roles = [
    ['role_id' => 0, 'role_name' => 'Default User'],
    ['role_id' => 1, 'role_name' => 'Admin'],
    ['role_id' => 0 Or 1, 'role_name' => 'Superadmin Dashboard']
];

// Insert default roles into the database
foreach ($roles as $role) {
    $role_name = $role['role_name'];
    $role_id = $role['role_id'];
    
    $sql = "INSERT INTO roles (role_id, role_name) VALUES ('$role_id', '$role_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Role '$role_name' added successfully.<br>";
    } else {
        echo "Error adding role '$role_name': " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>

