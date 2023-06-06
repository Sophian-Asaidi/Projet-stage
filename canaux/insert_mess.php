<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du message
    $message = $_POST['message'];

    // Insertion du message dans la base de données
    $requete = $conn->prepare("INSERT INTO message (utilisateur, contenu) VALUES (:user, :content)");
    $requete->bindValue(":user", "Utilisateur");
    $requete->bindValue(":content", $message);
    $requete->execute();

    // Réponse de succès
    echo "success";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
