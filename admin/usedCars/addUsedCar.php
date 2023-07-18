<?php
set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

require '../employee.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/demo/LuxuryGarage/ressources/styles/style.css">
</head>

<body>
    <?php

    include '../header.php';

    function kodex_random_string($length = 20)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $string;
    }

    // Recuperation de l'image si necessaire
    if (isset($_FILES['photo1']) && !empty($_FILES['photo1'])) {

        $image_name = $_FILES['photo1']['name'];
        $image_tmp_name = $_FILES['photo1']['tmp_name']; // dossier temporaire 
        $image_error = $_FILES['photo1']['error'];

        if ($image_error === 0) {

            $code_aleatoire = kodex_random_string(30);
            if ($_FILES['photo1']['type'] == 'image/jpeg') {
                $extention = '.jpeg';
            }
            if ($_FILES['photo1']['type'] == 'image/jpeg') {
                $extention = '.jpg';
            }
            if ($_FILES['photo1']['type'] == 'image/png') {
                $extention = '.png';
            }
            if ($_FILES['photo1']['type'] == 'image/jpg') {
                $extention = '.jpg';
            }
            $nomImage = $code_aleatoire . $extention;
            // Enregistrer l'image dans notre dossier uploads
            $destination = "../../uploads/" . $nomImage;
            move_uploaded_file($image_tmp_name, $destination);
        } elseif ($_FILES['photo1']['error'] == 4) {
        } else {
            $errorMessage = sprintf(
                " Il y a eu une erreur lors du téléchargement de l'image " . $_FILES['photo1'] . PHP_EOL . $_FILES['photo1']['error']
            );
        }
    }

    if (isset($_FILES['photo2']) && !empty($_FILES['photo2'])) {

        $image_name = $_FILES['photo2']['name'];
        $image_tmp_name = $_FILES['photo2']['tmp_name']; // dossier temporaire 
        $image_error = $_FILES['photo2']['error'];

        if ($image_error === 0) {

            $code_aleatoire = kodex_random_string(30);
            if ($_FILES['photo2']['type'] == 'image/jpeg') {
                $extention = '.jpeg';
            }
            if ($_FILES['photo2']['type'] == 'image/jpeg') {
                $extention = '.jpg';
            }
            if ($_FILES['photo2']['type'] == 'image/png') {
                $extention = '.png';
            }
            if ($_FILES['photo2']['type'] == 'image/jpg') {
                $extention = '.jpg';
            }
            $nomImage2 = $code_aleatoire . $extention;
            // Enregistrer l'image dans notre dossier uploads
            $destination = "../../uploads/" . $nomImage2;
            move_uploaded_file($image_tmp_name, $destination);
        } elseif ($_FILES['photo2']['error'] == 4) {
        } else {
            $errorMessage = sprintf(
                " Il y a eu une erreur lors du téléchargement de l'image " . $_FILES['photo2'] . PHP_EOL . $_FILES['photo2']['error']
            );
        }
    }

    if (isset($_FILES['photo3']) && !empty($_FILES['photo3'])) {

        $image_name = $_FILES['photo3']['name'];
        $image_tmp_name = $_FILES['photo3']['tmp_name']; // dossier temporaire 
        $image_error = $_FILES['photo3']['error'];

        if ($image_error === 0) {

            $code_aleatoire = kodex_random_string(30);
            if ($_FILES['photo3']['type'] == 'image/jpeg') {
                $extention = '.jpeg';
            }
            if ($_FILES['photo3']['type'] == 'image/jpeg') {
                $extention = '.jpg';
            }
            if ($_FILES['photo3']['type'] == 'image/png') {
                $extention = '.png';
            }
            if ($_FILES['photo3']['type'] == 'image/jpg') {
                $extention = '.jpg';
            }
            $nomImage3 = $code_aleatoire . $extention;
            // Enregistrer l'image dans notre dossier uploads
            $destination = "../../uploads/" . $nomImage3;
            move_uploaded_file($image_tmp_name, $destination);
        } elseif ($_FILES['photo3']['error'] == 4) {
        } else {
            $errorMessage = sprintf(
                " Il y a eu une erreur lors du téléchargement de l'image " . $_FILES['photo3'] . PHP_EOL . $_FILES['photo3']['error']
            );
        }
    }



    if (isset($_POST['years']) &&  isset($_POST['price']) && isset($_POST['km']) && $_POST['km'] > 0 && $_POST['years'] > 0 && $_POST['price'] > 0) {
        include_once('../../database/connDb.php');
        $brand = htmlspecialchars($_POST['brand']);
        $price = htmlspecialchars($_POST['price']);
        $years = htmlspecialchars($_POST['years']);
        $energy = htmlspecialchars($_POST['energy']);
        $km = htmlspecialchars($_POST['km']);
        $abs = isset($_POST['abs']);
        $airbag = isset($_POST['airbag']);
        $seat = $_POST['seat'];
        $descr = htmlspecialchars($_POST['descr']);
        $photo1 = $nomImage;
        $photo2 = "";
        $photo3 = "";
        if (isset($nomImage2) && !empty($nomImage2)) {
            $photo2 = $nomImage2;
        }
        if (isset($nomImage3) && !empty($nomImage3)) {
            $photo3 = $nomImage3;
        }

        $sql = "INSERT INTO usedcars (brand, price, years, energy, km, abs, airbag, seat, descr, photo1, photo2, photo3) VALUES ('$brand', '$price','$years','$energy','$km', '$abs','$airbag','$seat','$descr', '$photo1','$photo2','$photo3')";

        $result = $conn->query($sql);

        $successMessage = sprintf(
            'Voiture ajouté avec succés !'
        );
        $conn->close();
    }

    ?>

    <div class="container">
        <h1 class="pt-5 text-center">Ajouter une voiture</h1>
        <div class="col-8 mx-auto">
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

                    <div class="col-lg-12 mb-2 mx-auto">
                        <label for="brand" class="form-label">Modèle :</label>
                        <input type="text" class="form-control" name="brand" id="brand">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="price" class="form-label">Prix* :</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="years" class="form-label">Année* :</label>
                        <input type="number" class="form-control" name="years" id="years">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="energy" class="form-label">Energie :</label>
                        <input type="text" class="form-control" name="energy" id="energy">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="km" class="form-label">Kilométrage* :</label>
                        <input type="number" class="form-control" name="km" id="km">
                    </div>

                    <div class="col-lg-6 mb-2">
                        Options:
                        <input type="checkbox" class="form-check-input" name="abs" id="abs">
                        <label for="abs" class="form-check-label">ABS</label>
                        <input type="checkbox" class="form-check-input" name="airbag" id="airbag">
                        <label for="airbag" class="form-check-label">Airbag</label>
                    </div>

                    <div class="col-lg-6 mb-2">
                        <label for="seat" class="form-label">Nombre de places :</label>
                        <select id="seat" class="form-select">
                            <option selected value="default">Choisir...</option>
                            <option value="2">2 places</option>
                            <option value="4">4 places</option>
                            <option value="5">5 places</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mb-2 mx-auto">
                        <label for="descr" class="form-label">Description :</label>
                        <textarea class="form-control input" name="descr" id="descr" cols="" rows="5"></textarea>
                    </div>


                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="photo1">Photo 1* :</label>
                        <input id="photo1" type="file" id="photo1" name="photo1" accept="image/png, image/jpeg, image/jpg">
                    </div>

                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="photo2">Photo 2 :</label>
                        <input id="photo2" type="file" id="photo2" name="photo2" accept="image/png, image/jpeg, image/jpg">
                    </div>

                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="photo3">Photo 3 :</label>
                        <input id="photo3" type="file" id="photo3" name="photo3" accept="image/png, image/jpeg, image/jpg">
                    </div>




                    <span id="error"></span>

                    <div class="col-lg-6 mx-auto">
                        <button class="myButton" type="submit">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <script>
        let price = document.getElementById('price');
        let years = document.getElementById('years');
        let km = document.getElementById('km');
        let photo1 = document.getElementById('photo1');
        let photo2 = document.getElementById('photo2');
        let photo3 = document.getElementById('photo3');

        formEvent.addEventListener("submit", function(e) {
            if (price.value.trim() == "" || years.value.trim() == "" || km.value.trim() == "") {
                let error = document.getElementById('error');
                error.innerHTML = 'Veuillez remplir tout les champs qui possède " * " .';
                e.preventDefault();
            } else if (typeof photo1.files[0] == 'undefined' && typeof photo2.files[0] == 'undefined' && typeof photo3.files[0] == 'undefined') {
                let error = document.getElementById('error');
                error.innerHTML = 'Veuillez entrer au moins une photo.';
                e.preventDefault();
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>