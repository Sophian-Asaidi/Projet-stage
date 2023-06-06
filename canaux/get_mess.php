<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les messages de la base de données
    $requete = $conn->query("SELECT * FROM message ORDER BY id ASC");
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Générer le HTML pour les messages
    $html = '';
    foreach ($resultat as $message) {
        $html .= '<div class="message"><span>' . $message['utilisateur'] . ':</span> ' . $message['contenu'] . ' <time>' . $message['created_at'] . '</time></div>';
    }

    // Retourner le HTML des messages
    echo $html;
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
