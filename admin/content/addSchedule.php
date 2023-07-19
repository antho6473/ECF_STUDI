<?php

require '../admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="include 'https://conglutinative-spli.000webhostapp.com/employee.php';">
</head>

<body>
    <!-- Inclure le header-->
    <?php
    include '../header.php';



    if (isset($_POST['jours']) &&  isset($_POST['heure'])) {
        include('../../database/connDb.php');
        $jours = $_POST['jours'];
        $heure = $_POST['heure'];
        $sql = "INSERT INTO schedule (jours, heure) VALUES ('$jours', '$heure')";

            $result = $conn->query($sql);
            $successMessage = sprintf(
                'L\'horaire a été ajouté avec succés'
            );
        $conn->close(); 
    }

    ?>


    <div class="container">
        <h1 class="pt-5 text-center">Ajouter un nouvel horaire</h1>
        <div class="col-6 mx-auto">
        <form action="#" method="POST" id="formEvent" enctype="multipart/form-data" class="contactForm rounded">
            <?php if (isset($successMessage)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="jours" class="form-label">Jours* :</label>
                    <input type="text" name="jours" class="form-control input" id="jours">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="heure" class="form-label">Heure* :</label>
                    <input type="text" name="heure" class="form-control input" id="heure">
                </div>
                <span id="error"></span>

                <div class="col-lg-6 mx-auto">
                    <button class="myButton" type="submit">Envoyer</button>
                </div>
            </div>
        </form>
</div>
        <script>
            let jours = document.getElementById('jours');
            let heure = document.getElementById('heure');

            formEvent.addEventListener("submit", function(e) {
                if (jours.value.trim() == "" || heure.value.trim() == "") {
                    let error = document.getElementById('error');
                    error.innerHTML = 'Veuillez remplir tout les champs.';
                    e.preventDefault();
                }
            })
        </script>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>