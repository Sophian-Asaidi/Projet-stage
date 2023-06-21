<!DOCTYPE html>
<html>
    <head>
        <title>Recherche</title>
        <link rel="stylesheet" href="recherche.css">
        <link rel="stylesheet" href="chemin/vers/jquery-ui.css">
        <script src="chemin/vers/jquery.js"></script>
        <script src="chemin/vers/jquery-ui.js"></script>
    </head>
    <body>
        <nav class="navbar">
            <a href="acceuil.php">Déconnexion</a>
        </nav>
        <div class="container">
            <form class="search-form" action="autocomplet.php" method="GET">
                <input class="search-input" type="text" name="term" placeholder="Rechercher...">
                <button class="search-button" type="submit">Rechercher</button>
            </form>
        </div>
    </body>
</html>
