<!DOCTYPE html>
<html>
<head>
    <title>Mon Réseau Social - Connexion</title>
    <link rel="stylesheet" href="css/inscription.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><a href="acceuil.php">Connexion</a></h1>
            <form action="connex.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" class="btn">Se connecter</button>
            </form>
        </div>
</html>

