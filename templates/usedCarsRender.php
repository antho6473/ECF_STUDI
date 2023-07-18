<style>
    .card-img-top, .c-img {
        object-fit: cover;
    }
</style>
<?php
require('database/connDb.php');

$sql = "SELECT id, brand, price, years, energy, km, abs, airbag, seat, descr, photo1, photo2, photo3 FROM usedCars";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $brand = $row['brand'];
        $price = $row['price'];
        $years = $row['years'];
        $energy = $row['energy'];
        $km = $row['km'];
        $abs = $row['abs'];
        $airbag = $row['airbag'];
        $seat = $row['seat'];
        $descr = $row['descr'];
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
        if (empty($photo1) && empty($photo2) && !empty($photo3)) {
            $nb_photo = 1;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo3', photo2 = '', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } elseif (empty($photo1) && !empty($photo2) && !empty($photo3)) {
            $nb_photo = 2;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo2', photo2 = '$photo3', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } elseif (empty($photo2) && empty($photo3) && !empty($photo1)) {
            $nb_photo = 1;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo1', photo2 = '', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } elseif (empty($photo3)  && !empty($photo1)  && !empty($photo2)) {
            $nb_photo = 2;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo1', photo2 = '$photo2', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } elseif (empty($photo1) && empty($photo3)  && !empty($photo2)) {
            $nb_photo = 1;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo2', photo2 = '', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } elseif (empty($photo2)  && !empty($photo1)  && !empty($photo3)) {
            $nb_photo = 2;

            require 'database/connDb.php';
            $sql = "UPDATE usedcars SET photo1 = '$photo1', photo2 = '$photo3', photo3 = '' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        } else {
            $nb_photo = 3;

            require('database/connDb.php');
            $sql = "UPDATE usedcars SET photo1 = '$photo1', photo2 = '$photo3', photo3 = '$photo3' WHERE id='$id'";
            $conn->query($sql);
            $conn->close();

        }
?>

        <div class="col-lg-5 py-2 mx-auto">
            <div class="card">
                <?php if ($nb_photo == 1) : ?>

                    <img height="250px" class="card-img-top" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo1 ?>" alt="Photo 1">

                <?php elseif ($nb_photo == 2) : ?>

                    <div id="hero-carousel<?= $id ?>" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active c-item">
                                <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo1 ?>" class="d-block w-100 c-img" alt="Slide 1">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo2 ?>" class="d-block w-100 c-img" alt="Slide 2">
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
                                <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo1 ?>" class="d-block w-100 c-img" alt="Slide 1">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo2 ?>" class="d-block w-100 c-img" alt="Slide 2">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="http://localhost/demo/LuxuryGarage/uploads/<?= $photo3 ?>" class="d-block w-100 c-img" alt="Slide 3">
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

                <div class="card-body">
                    <h4 class="card-title text-center"><?= $brand ?></h3>
                    <h4 class="card-title text-center"><?= $price ?>€</h3>
                    <p class="card-text">Année de fabrication: <?= $years ?></p>
                    <p class="card-text">Kilométrage: <?= $km ?>km</p>
                    <a href="http://localhost/demo/LuxuryGarage/templates/detailsUsedCar.php?id=<?= $id ?>"><button class="myButton mb-2">Détail</button></a>
                    <a href="http://localhost/demo/LuxuryGarage/templates/usedCarContact.php?id=<?= $id ?>"><button class="myButton mb-2">Envoyer un message</button></a>
                </div>
            </div>
        </div>

<?php
    }
}
?>