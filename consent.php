<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can link to your CSS stylesheet here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            margin-top: 20px;
            margin-left: 350px;
        }
        
        header {
            background-color: #0073e6;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 5px;

        }
        
        h1 {
            margin: 0;
            font-size: 16px;
            padding-left: 150px;
            margin-top: 80px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        main {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .consent-form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        
        h2 {
            color: #0073e6;
        }
        
        p {
            margin-bottom: 15px;
        }
        
        ol {
            margin-left: 20px;
            margin-bottom: 15px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        button[type="submit"] {
            background-color: #0073e6;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #005bbf;
        }
        
        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            background-color: #0073e6;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Consent</h1>
    </header>

    <main>
        <section class="consent-form">
            <h2>Consent for Telemedicine Services</h2>
            <p>
                I, <input type="text" name="patient_name" placeholder="Your Name" required>, hereby consent to receive telemedicine services from [FHTK].
            </p>

            <p>
                I understand that telemedicine involves the use of electronic communications to enable healthcare providers to remotely diagnose, treat, and provide healthcare services to me. These services may include, but are not limited to, medical consultations, evaluations, and medical advice.
            </p>

            <p>
                By signing this consent form, I acknowledge and agree to the following:
            </p>

            <ol>
                <li>I have the right to confidentiality with respect to my medical information, and all existing confidentiality protections apply to the information disclosed during the telemedicine consultation.</li>
                <li>I understand that there are potential risks to the use of telemedicine, including but not limited to technical failures, interruptions, or breaches of security. [Your Platform Name] will take reasonable steps to ensure the security of your information.</li>
                <li>I may refuse or terminate telemedicine services at any time without affecting my right to future care or treatment.</li>
            </ol>

            <p>
                Please type your name below to provide your electronic signature, indicating your consent to telemedicine services:
            </p>

            <input type="text" name="electronic_signature" placeholder="Electronic Signature" required>
            <br>

            <label for="date">Date:</label>
            <input type="date" name="date" required>

            <button type="submit">Submit</button>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> [Faster Healing Tech Kenya]</p>
    </footer>
</body>
</html>

