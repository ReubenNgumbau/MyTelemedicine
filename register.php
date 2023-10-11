<!DOCTYPE html>
<html lang="en">

<head>
    <br></br>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
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
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style for the login link button */
        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                margin: 0 auto;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Faster Healing Tech Kenya.</h2>
        <form action="process_registration.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="gender" class="control-label">Gender</label>
                <select type="text" id="gender" name="gender" class="form-control form-control-sm rounded-0" required>
                    <option>Male</option>
                    
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</body>

</html>