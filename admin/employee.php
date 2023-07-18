<?php 
session_start();
if ($_SESSION['role'] != 1 && $_SESSION['role'] != 2) {
    header('Location: http://localhost/demo/LuxuryGarage/templates/noaccess.php');
    exit();
}
?>
