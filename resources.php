<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FHTK Resources</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file for styling -->
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            margin-top: 20px;
            margin-left: 250px;
        }
        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        header h1 {
            font-size: 16px;
            padding-left: 150px;
            margin-top: 80px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .resource-category {
            margin-bottom: 30px;
        }
        .resource-category h2 {
            font-size: 24px;
            color: #007bff;
        }
        .resource-category ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        .resource-category li {
            margin-bottom: 10px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        footer p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>FHTK Resources</h1>
        <!-- Add your website header/navigation here -->
    </header>

    <main>
        <section class="resource-category">
            <h2>COVID-19 Information</h2>
            <ul>
                <li><a href="https://www.who.int/emergencies/disease-outbreak-news/item/2020-DON221" target="_blank">WHO COVID-19 Updates</a></li>
                <li><a href="https://www.cdc.gov/coronavirus/2019-ncov/index.html" target="_blank">CDC COVID-19 Resources</a></li>
                <!-- Add more COVID-19 resources here -->
            </ul>
        </section>

        <section class="resource-category">
            <h2>Telehealth Guidelines</h2>
            <ul>
                <li><a href="https://www.cms.gov/Medicare/Medicare-General-Information/Telehealth" target="_blank">CMS Telehealth Guidelines</a></li>
                <li><a href="https://www.ama-assn.org/practice-management/digital/ama-quick-guide-telemedicine-practice" target="_blank">AMA Telemedicine Quick Guide</a></li>
                <!-- Add more telehealth guideline resources here -->
            </ul>
        </section>

        <!-- Add more resource categories and links as needed -->

    </main>

    <footer>
        <!-- Add your website footer here -->
        <p>&copy; <?php echo date("Y"); ?> FHTK</p>
    </footer>
</body>
</html>

