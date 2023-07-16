<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/', '.env');
$dotenv->load();

// Récupération des informations de connexion à la base de données depuis les variables d'environnement
$host = $_ENV['DB_HOST']; // Adresse du serveur MySQL
$dbname = $_ENV['DB_NAME']; // Nom de la base de données    
$username = $_ENV['DB_USER']; // Nom d'utilisateur MySQL   
$password = $_ENV['DB_PASSWORD']; // Mot de passe MySQL


// Créer une conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// verifier la connexion
if ($conn->connect_error) {
    die("La connexion a échouée: " . $conn->connect_error);
}