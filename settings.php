<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings - Telemedicine Platform</title>
    <style>
        /* Reset some default browser styles */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        /* Header Styles */
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
        }

        header h1 {
            padding-left: 300px;
            margin-top: 80px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 16px;
        }

        /* Page Container Styles */
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-left: 350px;
        }

        /* Settings Form Styles */
        .settings-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .settings-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .settings-form input[type="text"],
        .settings-form input[type="password"],
        .settings-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .settings-form button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Footer Styles */
        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>User Settings</h1>
    </header>
    <div class="container">
        <h2>General Settings</h2>
        <form class="settings-form" action="#" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="timezone">Timezone:</label>
            <select id="timezone" name="timezone">
                <option value="GMT-5">GMT-5 (Eastern Time)</option>
                <option value="GMT-6">GMT-6 (Central Time)</option>
                <option value="GMT-7">GMT-7 (Mountain Time)</option>
                <option value="GMT-8">GMT-8 (Pacific Time)</option>
            </select>
            
            <button type="submit">Save Changes</button>
        </form>
    </div>
    <footer>
        &copy; 2023 FHTK
    </footer>
</body>
</html>
