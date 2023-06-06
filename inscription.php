<!DOCTYPE html>
<html>
<head>
    <title>Mon Réseau Social - Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><a href="acceuil.php">Inscription</a></h1>
            <form action="insertion_inscris.php" method="POST">
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" id="prenom" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" class="btn">S'inscrire</button>
            </form>
        </div>
</html>
