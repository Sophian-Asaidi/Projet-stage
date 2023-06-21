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
    $query = "SELECT nom_au FROM auteur";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $sports = array();

    // Récupération des résultats de la requête
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sports[] = $row['nom_au'];
    }

    // Retourne les résultats au format JSON
    echo json_encode($sports);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
