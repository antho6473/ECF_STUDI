<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../ressources/styles/style.css">
    <style>
        .card-img-top,
        .c-img {
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include 'header.php';

    require '../database/connDb.php';
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

    if (empty($photo1) && empty($photo2) && !empty($photo3)) {
        $nb_photo = 1;
        $renderPhoto1 = $photo3;
    } elseif (empty($photo1) && !empty($photo2) && !empty($photo3)) {
        $nb_photo = 2;
        $renderPhoto1 = $photo2;
        $renderPhoto2 = $photo3;
    } elseif (empty($photo2) && empty($photo3) && !empty($photo1)) {
        $nb_photo = 1;
        $renderPhoto1 = $photo1;
    } elseif (empty($photo3)  && !empty($photo1)  && !empty($photo2)) {
        $nb_photo = 2;
        $renderPhoto1 = $photo1;
        $renderPhoto2 = $photo2;
    } elseif (empty($photo1) && empty($photo3)  && !empty($photo2)) {
        $nb_photo = 1;
        $renderPhoto1 = $photo2;
    } elseif (empty($photo2)  && !empty($photo1)  && !empty($photo3)) {
        $nb_photo = 2;
        $renderPhoto1 = $photo1;
        $renderPhoto2 = $photo3;
    } else {
        $nb_photo = 3;
        $renderPhoto1 = $photo1;
        $renderPhoto2 = $photo2;
        $renderPhoto3 = $photo3;
    }

    $conn->close();

    ?>

    <div class="container">
        <div class="col-6 mx-auto my-5">
            <div class="contactForm rounded">
                <div class="row">

                    <div class="col-lg-6 mb-2 mx-auto">
                        <h3 class="text-center">Modèle : <?= $brand ?></h3>
                        <h4 class="text-center">Prix : <?= $price ?>€</h4>
                    </div>

                    <div class="col-lg-12 mb-2 mx-auto">
                        <?php if ($nb_photo == 1) : ?>

                            <img height="250px" class="card-img-top rounded" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto1 ?>" alt="Photo 1">

                        <?php elseif ($nb_photo == 2) : ?>

                            <div id="hero-carousel<?= $id ?>" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">

                                    <div class="carousel-item active c-item">
                                        <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto1 ?>" class="d-block w-100 c-img rounded" alt="Slide 1">
                                    </div>

                                    <div class="carousel-item c-item">
                                        <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto2 ?>" class="d-block w-100 c-img rounded" alt="Slide 2">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" type="button" data-bs-target="#hero-carousel<?= $id ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" type="button" data-bs-target="#hero-carousel<?= $id ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>

                        <?php elseif ($nb_photo == 3) : ?>

                            <div id="hero-carousel<?= $id ?>" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">

                                    <div class="carousel-item active c-item">
                                        <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto1 ?>" class="d-block w-100 c-img rounded" alt="Slide 1">
                                    </div>

                                    <div class="carousel-item c-item">
                                        <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto2 ?>" class="d-block w-100 c-img rounded" alt="Slide 2">
                                    </div>

                                    <div class="carousel-item c-item">
                                        <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $renderPhoto3 ?>" class="d-block w-100 c-img rounded" alt="Slide 3">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" type="button" data-bs-target="#hero-carousel<?= $id ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" type="button" data-bs-target="#hero-carousel<?= $id ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="col-lg-6 mb-2">
                        <p>Année: <?= $years ?></p>
                        <p>Energie: <?= $energy ?></p>
                        <p>Kilométrage: <?= $km ?>km</p>
                        <p>Nombre de places: <?php if (empty($seat)) {
                                                } else {
                                                    echo $seat;
                                                } ?></p>
                        <p>ABS: <?php if ($abs == 0) {
                                    echo 'Non';
                                } else {
                                    echo 'Oui';
                                } ?></p>
                        <p>Airbag: <?php if ($airbag == 0) {
                                        echo 'Non';
                                    } else {
                                        echo 'Oui';
                                    } ?></p>
                        <p>Description: <?= $descr ?></p>
                    </div>
                </div>



                <a href="http://localhost/demo/LuxuryGarage/usedCars.php"><button class="myButton mb-2">Retour aux annonces</button></a>
                <a href="http://localhost/demo/LuxuryGarage/templates/usedCarContact.php?id=<?= $id ?>"><button class="myButton mb-2">Envoyer un message</button></a>
            </div>
        </div>
    </div>



        <?php include 'footer.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>