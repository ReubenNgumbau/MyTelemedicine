<?php
session_start();
include 'connection.php';

if (!isset($_POST['email'], $_POST['password'])) {
    exit('Please make sure you have filled both the username and password form fields!');
}

$email = $_POST['email'];
$password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$query = "SELECT user_id, password, role_id FROM consultants WHERE email = ?";
$result = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($result, "s", $email);
mysqli_stmt_execute($result);
mysqli_stmt_store_result($result);

if (mysqli_stmt_num_rows($result) > 0) {
    mysqli_stmt_bind_result($result, $user_id, $hashed_password, $role_id);
    mysqli_stmt_fetch($result);

    if (password_verify($password, $hashed_password)) {
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $email;
        $_SESSION['id'] = $user_id;
        
        // Check the user's role and redirect accordingly
        if ($role_id == 0) {
            // User with role 0 ( default consultant/patient)
            header('Location: sidebar.php');
        }elseif ($role_id == 1) {
            // User with role 1 (doctor)
            header('Location: doctors/doctor_dashboard.php');
        }elseif ($role_id == 0) {
            // User with role 1 or  (superadmin)
            header('Location: superadmin.php');
        } else {
            // Default redirect for other roles (e.g., regular users)
            header('Location: user_dashboard.php');
        }
    } else {
        header('Location: login.php');
    }
} else {
    echo 'Incorrect username and/or password!';
}

mysqli_stmt_close($result);

