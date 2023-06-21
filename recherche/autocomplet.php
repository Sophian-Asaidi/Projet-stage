<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération du terme de recherche depuis la requête GET
    $term = $_GET['term'];

    // Requête SQL avec jointure pour récupérer les utilisateurs correspondant au terme de recherche
    $query = "SELECT DISTINCT t.auteur, t.livre, t.film, t.serie, t.anime, t.sport, i.Prenom
              FROM thematique AS t
              INNER JOIN inscription AS i ON t.ID = i.ID 
              WHERE t.auteur LIKE :term OR t.livre LIKE :term OR t.film LIKE :term OR t.serie LIKE :term OR t.anime LIKE :term OR t.sport LIKE :term";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":term", '%' . $term . '%');
    $stmt->execute();

    $results = array();

    // Parcours des résultats de la requête
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = '';

        // Construction de la chaîne de résultat
        if (!empty($row['Prenom'])) {
            $result .= 'Utilisateur : ' . $row['Prenom'] . ' | ';
        }
        if (!empty($row['auteur'])) {
            $result .= 'Auteur : ' . $row['auteur'] . ' | ';
        }
        if (!empty($row['livre'])) {
            $result .= 'Livre : ' . $row['livre'] . ' | ';
        }
        if (!empty($row['film'])) {
            $result .= 'Film : ' . $row['film'] . ' | ';
        }
        if (!empty($row['serie'])) {
            $result .= 'Serie : ' . $row['serie'] . ' | ';
        }
        if (!empty($row['anime'])) {
            $result .= 'Anime/Manga : ' . $row['anime'] . ' | ';
        }
        if (!empty($row['sport'])) {
            $result .= 'Sport : ' . $row['sport'] . ' | ';
        }

        // Ajout du résultat au tableau des résultats
        $results[] = $result;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Recherche</title>
        <link rel="stylesheet" href="recherche.css">
        <link rel="stylesheet" href="chemin/vers/jquery-ui.css">
        <script src="chemin/vers/jquery.js"></script>
        <script src="chemin/vers/jquery-ui.js"></script>
        <style>
            .back-button {
                padding: 10px 20px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                background-color: #666666;
                color: #ffffff;
                cursor: pointer;
                box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
            }

            .back-button:hover {
                background-color: #999999;
            }
        </style>
    </head>
    <body>
        <h1>Voici la liste des personnes ayant choisi le mot "<?php echo $term; ?>"</h1>

        <button class="back-button" onclick="window.location.href = 'recherche.php'">Accueil</button>

        <ul id="results">
            <?php
            foreach ($results as $result) {
                echo "<li>$result</li>";
            }
            ?>
        </ul>

        <script>
            // Code JavaScript pour mettre en place la fonctionnalité de recherche
            $(function () {
                $("#search").autocomplete({
                    source: "recherche.php",
                    minLength: 2
                });
            });
        </script>
    </body>
</html>
