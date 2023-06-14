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
    $age = $_POST['age'];
    $ville = $_POST['ville'];

    // Vérification de la longueur du mot de passe
    if (strlen($mot_de_passe) > 16) {
        echo "Le mot de passe ne peut pas dépasser 16 caractères.";
        exit();
    }

    // Préparation de la requête d'insertion
    $requete = $conn->prepare("INSERT INTO inscription (Prenom, Nom, email, mot_de_passe, age, ville) VALUES (:prenom, :nom, :email, :mot_de_passe, :age, :ville)");

    // Hasher le mot de passe
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Liaison des valeurs des variables aux paramètres de la requête
    $requete->bindParam(":prenom", $prenom);
    $requete->bindParam(":nom", $nom);
    $requete->bindParam(":email", $email);
    $requete->bindParam(":mot_de_passe", $mot_de_passe_hash);
    $requete->bindParam(":age", $age);
    $requete->bindParam(":ville", $ville);

    // Exécution de la requête
    $requete->execute();

    // Affichage du message d'inscription réussie en JavaScript et redirection vers la page demander.
    echo "<script>alert('Votre inscription est réussie.'); window.location.href = 'thematique.php';</script>";
    
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
