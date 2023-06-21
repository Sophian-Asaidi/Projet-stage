<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les sports
    $query = "SELECT genre_anime FROM anime";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $sports = array();

    // Récupération des résultats de la requête
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sports[] = $row['genre_anime'];
    }

    // Retourne les résultats au format JSON
    echo json_encode($sports);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
