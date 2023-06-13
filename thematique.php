<!DOCTYPE html>
<html>
<head>
    <title>Thématiques</title>
    <link rel="stylesheet" href="css/thematique.css">
</head>
<body>
    <h1>Vos centres d'intérêt</h1>
    <form action="insertion_them.php" method="POST">
        <label for="sport">Sport :</label>
        <input type="text" name="sport" id="sport" required>
        <br><br>
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur" required>
        <br><br>
        <label for="livre">Livre :</label>
        <input type="text" name="livre" id="livre" required>
        <br><br>
        <label for="film">Film :</label>
        <input type="text" name="film" id="film" required>
        <br><br>
        <label for="serie">Série :</label>
        <input type="text" name="serie" id="serie" required>
        <br><br>
        <label for="anime">Anime/Manga :</label>
        <input type="text" name="anime" id="anime" required>
        <br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

