<?php
// Informations de connexion à la base de données
$host = 'localhost'; // ou l'adresse IP du serveur
$dbname = 'elearn_v2';
$username = 'root'; // ton nom d'utilisateur MySQL
$password = ''; // ton mot de passe MySQL

try {
    // Création d'une instance de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configuration des attributs de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // echo "Connexion réussie à la base de données!";
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
