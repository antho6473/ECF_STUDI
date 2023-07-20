<?php 
session_start();
if ($_SESSION['role'] != 1 && $_SESSION['role'] != 2) {
    header('Location: https://conglutinative-spli.000webhostapp.com/templates/noaccess.php');
    exit();
}
?>
