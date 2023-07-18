<?php

require '../employee.php';

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

    $sql = "SELECT id, brand, price, years, energy, km, abs, airbag, seat, descr  FROM usedCars";

    ?>
    <h1 class="text-center">Gestion des avis</h1>
    <div class="container">
        <div class="col-lg-12 py-2 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Année</th>
                        <th scope="col">Energie</th>
                        <th scope="col">Kilométrage</th>
                        <th scope="col">Description</th>
                        <th scope="col">ABS</th>
                        <th scope="col">Airbags</th>
                        <th scope="col">Nombre de places</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $brand = $row["brand"];
                            $price = $row["price"];
                            $years = $row["years"];
                            $energy = $row["energy"];
                            $km = $row["km"];
                            $abs = $row["abs"];
                            $airbag = $row["airbag"];
                            $seat = $row["seat"];
                            $descr = $row["descr"];

                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $brand ?></td>
                                <td><?= $price ?></td>
                                <td><?= $years ?></td>
                                <td><?= $energy ?></td>
                                <td><?= $km ?></td>
                                <td><?= $descr ?></td>
                                <td><?php if($abs == 0){echo 'Non';}else{echo 'Oui';} ?></td>
                                <td><?php if($airbag == 0){echo 'Non';}else{echo 'Oui';} ?></td>
                                <td><?php if($seat == 0){ }else{echo $seat;} ?></td>
                                <td>
                                    <a href="deleteUsedCar.php?id=<?= $id ?>"><img src="../../ressources/images/admin/poubelle.png" height="25px" alt=""></a>
                                    <a href="modifyUsedCar.php?id=<?= $id ?>"><img src="../../ressources/images/admin/modifier.png" height="25px" alt=""></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    $conn->close();
                    ?>

                </tbody>
            </table>
            <a href="http://localhost/demo/LuxuryGarage/admin/usedCars/addUsedCar.php"><button class="myButton">Ajouter une voiture</button></a>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>