<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Platform Survey</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0074a2;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            padding-left: 20px;
            margin-top: 80px;
        }

        main {
            text-align: center;
            padding: 20px;
            margin-left: 300px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #0074a2;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #0074a2;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to our FHTK Survey</h1>
    </header>
    <main>
        <p>We value your feedback. Please take a moment to complete our survey:</p>
        <a href="survey.php" class="button">Take Survey</a>
    </main>
    <footer>
        &copy; 2023 Faster Healing Tech Kenya.
    </footer>
</body>
</html>

