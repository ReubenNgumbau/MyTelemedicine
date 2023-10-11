<!DOCTYPE html>
<html>
<head>
    <title>Telemedicine Chat</title>
    <style>
        /* Add your CSS styles here to make the form presentable */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .chat-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            height: 400px;
            overflow-y: scroll;
        }
        .message-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }
        .send-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Telemedicine Chat</h2>
        <div class="chat-box" id="chat-box">
            <!-- Messages will be displayed here -->
        </div>
        <textarea class="message-input" id="message" rows="3" placeholder="Type your message here..."></textarea>
        <button class="send-button" onclick="sendMessage()">Send</button>
    </div>

    <script>
        function sendMessage() {
            var messageInput = document.getElementById("message");
            var message = messageInput.value.trim();
            if (message !== "") {
                // You can send the message to the server here
                // For now, we'll just display it in the chat box
                var chatBox = document.getElementById("chat-box");
                chatBox.innerHTML += '<p><strong>You:</strong> ' + message + '</p>';
                messageInput.value = "";
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }
    </script>
</body>
</html>

