<?php include 'sidebar.php';
include'connection.php';
// include'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Telemedicine Platform</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Add your custom styles here -->
    <style>
        /* Customize your FAQ page styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-left: 300px;
        }
        h1 {
            color: #333;
            padding-left: 20px;
            margin-top: 80px;
        }
        .faq-item {
            margin-bottom: 20px;
        }
        .faq-question {
            font-weight: bold;
            color: #007BFF;
            cursor: pointer;
        }
        .faq-answer {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        
        <div class="faq-item">
            <div class="faq-question">1. What is telemedicine?</div>
            <div class="faq-answer">Telemedicine is the remote diagnosis and treatment of patients through telecommunications technology.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">2. How do I schedule an online appointment?</div>
            <div class="faq-answer">You can schedule an appointment by logging into your account and selecting the 'Schedule Appointment' option.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">3. Is telemedicine secure and private?</div>
            <div class="faq-answer">Yes, we prioritize the security and privacy of your information through secure connections and encrypted data.</div>
        </div>

        <!-- Add more FAQ items as needed -->

    </div>

    <script>
        // JavaScript to toggle FAQ answers
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
