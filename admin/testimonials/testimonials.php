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

    $sql = "SELECT id, lastname, firstname, testimonial, rating, approuved FROM testimonials";

    ?>
    <h1 class="text-center">Gestion des avis</h1>
    <div class="container">
        <div class="col-lg-12 py-2 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Avis</th>
                        <th scope="col">Note</th>
                        <th scope="col">Approuvé</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $lastname = $row["lastname"];
                            $firstname = $row["firstname"];
                            $testimonial = $row["testimonial"];
                            $rating = $row["rating"];
                            $approuved = $row["approuved"];

                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $lastname ?></td>
                                <td><?= $firstname ?></td>
                                <td><?= $testimonial ?></td>
                                <td><?= $rating ?></td>
                                <td><?php if($approuved == 0){echo 'Non';}else{echo 'Oui';} ?></td>
                                <td>
                                    <a href="deleteTestimonial.php?id=<?= $id ?>"><img src="../../ressources/images/admin/poubelle.png" height="25px" alt=""></a>
                                    <a href="approuveTestimonial.php?id=<?= $id ?>"><img src="../../ressources/images/admin/approuver.png" height="25px" alt=""></a>
                                    <a href="disapprouveTestimonial.php?id=<?= $id ?>"><img src="../../ressources/images/admin/desapprouver.png" height="25px" alt=""></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    $conn->close();
                    ?>

                </tbody>
            </table>

            <a href="https://conglutinative-spli.000webhostapp.com/testimonial.php"><button class="myButton">Ajouter un avis</button></a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>