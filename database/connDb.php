<?php
// Récupération des informations de connexion à la base de données depuis les variables d'environnement
$servername = 'localhost'; // Adresse du serveur MySQL
$dbname = 'garageparrot'; // Nom de la base de données    
$username = 'anthony'; // Nom d'utilisateur MySQL   
$password = 'Anthony'; // Mot de passe MySQL


// Créer une conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// verifier la connexion
if ($conn->connect_error) {
    die("La connexion a échouée: " . $conn->connect_error);
}
