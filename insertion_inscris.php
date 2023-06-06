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
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];

    // Vérification de la longueur du mot de passe
    if (strlen($mot_de_passe) > 16) {
        echo "Le mot de passe ne peut pas dépasser 16 caractères.";
        exit();
    }

    // Préparation de la requête d'insertion
    $requete = $conn->prepare("INSERT INTO inscription (Prenom, Nom, email, mot_de_passe) VALUES (:prenom, :nom, :email, :mot_de_passe)");

    // Liaison des valeurs des variables aux paramètres de la requête
    $requete->bindValue(":prenom", $prenom);
    $requete->bindValue(":nom", $nom);
    $requete->bindValue(":email", $email);
    $requete->bindValue(":mot_de_passe", $mot_de_passe);

    // Exécution de la requête
    $requete->execute();

    // Affichage du message d'inscription réussie en JavaScript et qui redirige vers la page d'inscription
    echo "<script>alert('Votre inscription est réussie.'); window.location.href = 'inscription.php';</script>";

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
