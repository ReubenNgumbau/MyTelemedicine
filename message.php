<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="styyle.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-messages" id="chat-messages">
            <!-- Messages will be displayed here -->
        </div>
        <div class="chat-input">
            <input type="text" id="message" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>

