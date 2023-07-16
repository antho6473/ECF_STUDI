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

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include '../header.php';


    include('../../database/connDb.php');
    $id = $_GET['id'];
    $sql = "SELECT title, content FROM services WHERE id='$id'";

    $result = $conn->query($sql);
    $row = $result->fetch_row();

    $title = $row[0];
    $content = $row[1];

    $conn->close();

    if (isset($_POST['title']) &&  isset($_POST['content'])) {
        include('../../database/connDb.php');
        $title = $_POST['title'];
        $content = htmlspecialchars($_POST['content']);

        $sql = "UPDATE services SET content = '$content' WHERE id='$id'";

        $result = $conn->query($sql);

        $successMessage = sprintf(
            'Contenu modifié avec succès '
        );

        $conn->close();
    }


    ?>

    <div class="container">
        <h1 class="pt-5 text-center">Modifier le contenu d'un service</h1>
        <form action="#" method="POST" id="formEvent" enctype="multipart/form-data" class="contactForm rounded">
            <?php if (isset($successMessage)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="title" class="form-label">Titre* :</label>
                    <input type="text" name="title" class="form-control input" id="title" value="<?= $title ?>">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="content" class="form-label">Contenu* :</label>
                    <textarea name="content" class="form-control input" id="content" cols="30" rows="10"><?= $content ?></textarea>
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