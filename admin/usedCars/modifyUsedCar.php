<?php

require '../employee.php';

set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

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


    include('../../database/connDb.php');
    $id = $_GET['id'];
    $sql = "SELECT brand, price, years, energy, km, abs, airbag, seat, descr, photo1, photo2, photo3  FROM usedcars WHERE id = '$id'";

    $result = $conn->query($sql);
    $row = $result->fetch_row();

        $brand = $row[0];
        $price = $row[1];
        $years = $row[2];
        $energy = $row[3];
        $km = $row[4];
        $abs = $row[5];
        $airbag = $row[6];
        $seat = $row[7];
        $descr = $row[8];
        $photo1 = $row[9];
        $photo2 = $row[10];
        $photo3 = $row[11];

    $conn->close();

    if (isset($_POST['years']) &&  isset($_POST['price']) && isset($_POST['km']) && $_POST['km'] > 0 && $_POST['years'] > 0 && $_POST['price'] > 0) {
        include('../../database/connDb.php');
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


        if (empty($photo1) && empty($photo2) && !empty($photo3)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr', 
        photo3 = '$photo3' 
        WHERE id='$id'";
        } elseif (empty($photo1) && !empty($photo2) && !empty($photo3)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr',  
        photo2 = '$photo2',
        photo3 = '$photo3'
        WHERE id='$id'";
        } elseif (empty($photo2) && empty($photo3) && !empty($photo1)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr', 
        photo1 = '$photo1' 
        WHERE id='$id'";
        } elseif (empty($photo3)  && !empty($photo1)  && !empty($photo2)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr', 
        photo1 = '$photo1', 
        photo2 = '$photo2' 
        WHERE id='$id'";
        } elseif (empty($photo1) && empty($photo3)  && !empty($photo2)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr',
        photo2 = '$photo2' 
        WHERE id='$id'";
        } elseif (empty($photo2)  && !empty($photo1)  && !empty($photo3)) {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr', 
        photo1 = '$photo1',
        photo3 = '$photo3' 
        WHERE id='$id'";
        } elseif (!empty($photo2)  && !empty($photo1)  && !empty($photo3)){
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr', 
        photo1 = '$photo1', 
        photo2 = '$photo2',
        photo3 = '$photo3' 
        WHERE id='$id'";
        } else {
            $sql = "UPDATE usedcars SET 
        brand = '$brand', 
        price = '$price', 
        years = '$years', 
        energy = '$energy', 
        km = '$km', 
        abs = '$abs', 
        airbag = '$airbag', 
        seat = '$seat', 
        descr = '$descr' 
        WHERE id='$id'";
        }
        
        $result = $conn->query($sql);

        $successMessage = sprintf(
            'Contenu modifié avec succès '
        );

        $conn->close();
    }


    ?>

<div class="container">
        <h1 class="pt-5 text-center">Modifier une voiture</h1>
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
                        <input type="text" class="form-control" name="brand" id="brand" value="<?= $brand ?>">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="price" class="form-label">Prix* :</label>
                        <input type="number" class="form-control" name="price" id="price" value="<?= $price ?>">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="years" class="form-label">Année* :</label>
                        <input type="number" class="form-control" name="years" id="years" value="<?= $years ?>">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="energy" class="form-label">Energie :</label>
                        <input type="text" class="form-control" name="energy" id="energy" value="<?= $energy ?>">
                    </div>
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="km" class="form-label">Kilométrage* :</label>
                        <input type="number" class="form-control" name="km" id="km" value="<?= $km ?>">
                    </div>

                    <div class="col-lg-6 mb-2">
                        Options:
                        <input type="checkbox" class="form-check-input" name="abs" id="abs" <?php if($abs == 1){echo "checked";}?>>
                        <label for="abs" class="form-check-label">ABS</label>
                        <input type="checkbox" class="form-check-input" name="airbag" id="airbag" <?php if($airbag == 1){echo "checked";}?>>
                        <label for="airbag" class="form-check-label">Airbag</label>
                    </div>

                    <div class="col-lg-6 mb-2">
                        <label for="seat" class="form-label">Nombre de places :</label>
                        <select id="seat" class="form-select" name="seat">
                            <option value="default">Choisir...</option>
                            <option <?php if($seat == 2){echo "selected";}?> value="2">2 places</option>
                            <option <?php if($seat == 4){echo "selected";}?> value="4">4 places</option>
                            <option <?php if($seat == 5){echo "selected";}?> value="5">5 places</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mb-2 mx-auto">
                        <label for="descr" class="form-label">Description :</label>
                        <textarea class="form-control input" name="descr" id="descr" cols="" rows="5"><?= $descr ?></textarea>
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
                    <div>
                        Les images précédentes : 
                    <?php if (!empty($photo1)) : ?>
                        <img style="object-fit: contain;" height="100px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo1 ?>" alt="">

                    <?php endif; ?>

                    <?php if (!empty($photo2)) : ?>
                        <img style="object-fit: contain;" height="100px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo2 ?>" alt="">

                    <?php endif; ?>

                    <?php if (!empty($photo3)) : ?>
                        <img style="object-fit: contain;" height="100px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo3 ?>" alt="">

                    <?php endif; ?>
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

        formEvent.addEventListener("submit", function(e) {
            if (price.value.trim() == "" || years.value.trim() == "" || km.value.trim() == "") {
                let error = document.getElementById('error');
                error.innerHTML = 'Veuillez remplir tout les champs qui possèdent " * " .';
                e.preventDefault();
            } 
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>