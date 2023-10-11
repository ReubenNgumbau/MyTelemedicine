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
        h2 {
            font-size: 1.8rem;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-size: 1.2rem;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        select {
            height: 40px;
        }
        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
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
        <h1>Survey</h1>
    </header>
    <main>
        <h2>Please take a moment to complete our survey:</h2>
        <form action="process_survey.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="rating">Rate our FHTK Services:</label>
            <select id="rating" name="rating" required>
                <option value="5">Excellent</option>
                <option value="4">Very Good</option>
                <option value="3">Good</option>
                <option value="2">Fair</option>
                <option value="1">Poor</option>
            </select>

            <label for="feedback">Additional Comments (Optional):</label>
            <textarea id="feedback" name="feedback" rows="4"></textarea>

            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        &copy; 2023 Faster Healing Tech Kenya.
    </footer>
</body>
</html>

