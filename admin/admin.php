<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
    header('Location: http://localhost/demo/LuxuryGarage/templates/noaccess.php');
    exit();
}
?>
