<!DOCTYPE html>
<html>
<head>
    <title>Mirage Chat</title>
    <link rel="stylesheet" href="chatgen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Fonction pour charger les messages à partir de la base de données
        function loadMessages() {
            $.ajax({
                url: 'get_mess.php',
                method: 'GET',
                success: function(response) {
                    $('#messages-container').html(response);
                    scrollToBottom();
                }
            });
        }

        // Fonction pour envoyer un message à la base de données
        function sendMessage() {
            var messageInput = $('#message-input');
            var message = messageInput.val().trim();
            if (message !== '') {
                $.ajax({
                    url: 'insert_mess.php',
                    method: 'POST',
                    data: { message: message },
                    success: function(response) {
                        messageInput.val('');
                        loadMessages();
                    }
                });
            }
        }

        // Fonction pour faire défiler vers le bas
        function scrollToBottom() {
            var messagesContainer = $('#messages-container');
            messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
        }

        // Charger les messages lors du chargement de la page
        $(document).ready(function() {
            loadMessages();
        });
    </script>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <a href="acceuil.php" class="navbar-item">Accueil</a>
            <a href="deconnexion.php" class="navbar-item">Déconnexion</a>
        </div>
    </div>
    <div class="container">
        <h1>Mirage Chat</h1>
        <div id="messages-container" class="messages"></div>
        <div class="input-container">
            <input type="text" id="message-input" placeholder="Entrez votre message">
            <button onclick="sendMessage()">Envoyer</button>
        </div>
    </div>
</body>
</html>
