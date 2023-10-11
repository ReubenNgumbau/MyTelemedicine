<?php include 'sidebar.php';
include'connection.php';
include'session.php';
?>
<?php
// Include necessary files and perform user authentication

// Check if the user is logged in
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php"); // Redirect to the login page if not logged in
//     exit();
// }

// Include your database connection file here

// Retrieve the user's medical history from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM medical_history WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical History</title>
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

table.medical-history {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table.medical-history th, table.medical-history td {
    padding: 10px;
    border: 1px solid #ddd;
}

.no-history {
    color: #999;
    font-style: italic;
}

.add-entry {
    margin-top: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="date"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Medical History</h1>
        
        <?php
        // Display the user's medical history
        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<tr><th>Date</th><th>Condition</th><th>Notes</th></tr>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['condition'] . '</td>';
                echo '<td>' . $row['notes'] . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo 'No medical history found.';
        }
        ?>

        <!-- Add a form to allow users to add new medical history entries -->
        <h2>Add New Entry</h2>
        <form method="post" action="add_medical_history.php">
            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            <label for="condition">Medical Condition:</label>
            <input type="text" name="condition" required><br>
            <label for="notes">Notes:</label>
            <textarea name="notes" rows="4" required></textarea><br>
            <input type="submit" value="Add Entry">
        </form>
    </div>
</body>
</html>

<?php
// Include footer and close the database connection
// include('footer.php');
mysqli_close($conn);
?>
