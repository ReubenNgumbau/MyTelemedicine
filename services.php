<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Services</title>
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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 350px;
        }
        .service {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }
        .service h2 {
            color: #0074a2;
        }
        .service p {
            margin-top: 10px;
        }
        .apply-button {
            background-color: #0074a2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .apply-button:hover {
            background-color: #005983;
        }
        h1{
            padding-left: 300px;
            margin-top: 60px;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Our Services</h1>
    </header>
    <div class="container">
        <div class="service">
            <h2>Mental Health Services</h2>
            <p>We offer Teletherapy and counseling services for mental health issues, such as anxiety, depression, and stress management..</p>
            <button class="apply-button">Apply</button>
        </div>
        <div class="service">
            <h2>Chronic Disease Management</h2>
            <p>We cater for remote management and monitoring of chronic conditions like diabetes, hypertension, and asthma to track progress and adjust treatment plans as needed..</p>
            <button class="apply-button">Apply</button>
        </div>
        <div class="service">
            <h2>Medical Education and Information</h2>
            <p> We allow access to educational resources, health information, and wellness programs to empower patients with knowledge and tools for self-care.</p>
            <button class="apply-button">Apply</button>
        </div>
        <!-- Add more service sections as needed -->
    </div>
</body>
</html>
