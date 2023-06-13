<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $sport = $_POST['sport'];
    $auteur = $_POST['auteur'];
    $livre = $_POST['livre'];
    $film = $_POST['film'];
    $serie = $_POST['serie'];
    $anime = $_POST['anime'];

    // Préparation de la requête d'insertion
    $requete = $conn->prepare("INSERT INTO thematique (sport, auteur, livre, film, serie, anime) VALUES (:sport, :auteur, :livre, :film, :serie, :anime)");

    // Liaison des valeurs des variables aux paramètres de la requête
    $requete->bindValue(":sport", $sport);
    $requete->bindValue(":auteur", $auteur);
    $requete->bindValue(":livre", $livre);
    $requete->bindValue(":film", $film);
    $requete->bindValue(":serie", $serie);
    $requete->bindValue(":anime", $anime);

    // Exécution de la requête
    $requete->execute();

    echo "Les informations ont été insérées avec succès dans la base de données.";

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
