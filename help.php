<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Help</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            font-size: 16px;
            padding-left: 300px;
            margin-top: 80px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-left: 350px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Add more CSS styles and content as needed for your help page */

        /* Example button style */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Help Center</h1>
    </header>
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <p>How will i get my ordered prescribed tablets. ...</p>
        <p>How long will it take to get my order. ...</p>

        <h2>Contact Support</h2>
        <p>If you have any further questions or need assistance, please feel free to contact our support team:</p>
        <a href="mailto:fhtk@gmail.com" class="btn">Email Support</a>
    </div>
</body>
</html>
