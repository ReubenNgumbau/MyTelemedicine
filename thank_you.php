<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Platform Survey - Thank You</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add any additional styling for this page if needed */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        h1 {
            font-size: 1.3rem;
            padding-left: 45px;
            margin-top: 80px;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-left: 300px;
        }
        p {
            font-size: 1.2rem;
            color: #333;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Thank You</h1>
    </header>
    <main>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } else { ?>
            <p>Thank you for completing the survey!</p>
            <!-- Add any additional content or messages you want to display -->
        <?php } ?>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Faster Healing Tech Kenya.
    </footer>
</body>
</html>
