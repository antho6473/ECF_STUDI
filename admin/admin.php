<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
    header('Location: https://conglutinative-spli.000webhostapp.com/templates/noaccess.php');
    exit();
}
?>
