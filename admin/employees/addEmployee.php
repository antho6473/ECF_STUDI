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
    <link rel="stylesheet" href="../../ressources/styles/style.css">
</head>

<body>
    <!-- Inclure le header-->
    <?php
    include '../header.php';



    if (isset($_POST['email']) &&  isset($_POST['pass'])) {
        include('../../database/connDb.php');
        $user = $_POST['email'];
        $pass = $_POST['pass'];
        $role = "1";
        $sql = "SELECT email, pass, role_id FROM users WHERE email = '$user'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $errorMessage = sprintf(
                'L\'email est déjà utilisée: (%s)',
                $_POST['email']
            );
        } else {
            $passHashed = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, pass, role_id) VALUES ('$user', '$passHashed', '$role')";

            $result = $conn->query($sql);
            $successMessage = sprintf(
                'L\'employé a été ajouté avec succés : (%s)',
                $_POST['email']
            );
        }
        $conn->close(); 
    }

    ?>


    <div class="container">
        <h1 class="pt-5 text-center">Ajouter un nouvel employé</h1>
        <p class="text-center text-dark">Veuillez saisir les futur identifiants de l'employé
        </p>
        <form action="#" method="POST" id="formEvent" enctype="multipart/form-data" class="contactForm rounded">
            <?php if (isset($errorMessage)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($successMessage)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="email" class="form-label">Email* :</label>
                    <input type="email" name="email" class="form-control input" id="email">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="pass" class="form-label">Mot de passe* :</label>
                    <input type="password" name="pass" class="form-control input" id="pass">
                </div>
                <span id="error"></span>

                <div class="col-lg-6 mx-auto">
                    <button class="myButton" type="submit">Envoyer</button>
                </div>
            </div>
        </form>

        <script>
            let nom = document.getElementById('email');
            let prenom = document.getElementById('pass');

            formEvent.addEventListener("submit", function(e) {
                if (email.value.trim() == "" || pass.value.trim() == "") {
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