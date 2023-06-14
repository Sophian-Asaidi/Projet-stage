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
    $requete = $conn->prepare("INSERT INTO thematique (ID, sport, auteur, livre, film, serie, anime) VALUES (:id, :sport, :auteur, :livre, :film, :serie, :anime)");

    // Récupération de l'ID à partir de la table inscription
    $requete_id = $conn->prepare("SELECT ID FROM inscription ORDER BY ID DESC LIMIT 1");
    $requete_id->execute();
    $id_inscription = $requete_id->fetchColumn();

    // Liaison des valeurs des variables aux paramètres de la requête
    $requete->bindValue(":id", $id_inscription);
    $requete->bindValue(":sport", $sport);
    $requete->bindValue(":auteur", $auteur);
    $requete->bindValue(":livre", $livre);
    $requete->bindValue(":film", $film);
    $requete->bindValue(":serie", $serie);
    $requete->bindValue(":anime", $anime);

    // Exécution de la requête
    $requete->execute();

    header("Location: canaux/chat.php");
    exit();

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
