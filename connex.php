<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification des données du formulaire de connexion
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête pour vérifier si l'utilisateur existe
        $requete = $conn->prepare("SELECT * FROM inscription WHERE email = :email AND mot_de_passe = :mot_de_passe");
        $requete->bindValue(":email", $email);
        $requete->bindValue(":mot_de_passe", $password);
        $requete->execute();
        
       
        // Vérification des résultats de la requête
        if ($requete->rowCount() > 0) {
            // Utilisateur trouvé, connexion réussie
            echo "<script>alert('Connexion réussie.'); window.location.href = 'recherche/recherche.php';</script>";
            exit();
        } else {
            // Utilisateur non trouvé, échec de la connexion
            echo "<script>alert('Veuillez-vous inscrire avant de vous connecter.'); window.location.href = 'inscription.php';</script>";
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
