<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

    session_start();

if(isset($_SESSION['role'])){
    echo $_SESSION['role'];
} else {
    header('Location: ../functions/login.php');
    exit();
}