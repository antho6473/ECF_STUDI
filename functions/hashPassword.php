<?php

require('../database/connDb.php');

$sql = "SELECT email, pass, role_id FROM users WHERE role_id = '2'";
$user = "user@admin.com";
$pass = "admin64@85";
$role = "2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
} else {
    $passHashed = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, pass, role_id) VALUES ('$user', '$passHashed', '$role')";

    $result = $conn->query($sql);
}
?>