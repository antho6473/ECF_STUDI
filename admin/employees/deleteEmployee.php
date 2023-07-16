<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
    header('Location: http://localhost/demo/LuxuryGarage/templates/noaccess.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../ressources/styles/style.css">
</head>

<body>
    <!-- Inclure le header-->
    <?php
    include '../header.php';


    require '../../database/connDb.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    $conn->query($sql);
    $conn->close();

    ?>
    <div class="container">
        <div class="col-lg-6 py-2 mx-auto">
            <h3 class="text-center text-dark p-5">L'employé a bien été supprimé !</h3>

            <a href="http://localhost/demo/LuxuryGarage/admin/employee.php"><button class="myButton">Retour au gestionnaire</button></a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>