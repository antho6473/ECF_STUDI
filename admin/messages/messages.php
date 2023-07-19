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

    $sql = "SELECT id, lastname, firstname, phone, msg, email FROM messages";

    ?>
    <h1 class="text-center">Gestion des messages</h1>
    <div class="container">
        <div class="col-lg-12 py-2 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
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
                            $phone = $row["phone"];
                            $msg = $row["msg"];
                            $email = $row["email"];


                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $firstname ?></td>
                                <td><?= $lastname ?></td>
                                <td><?= $phone ?></td>
                                <td><?= $email ?></td>
                                <td><?= $msg ?></td>
                                <td><a href="deleteMessage.php?id=<?= $id ?>"><img src="../../ressources/images/admin/poubelle.png" height="25px" alt=""></a></td>
                            </tr>
                    <?php
                        }
                    }
                    $conn->close();
                    ?>

                </tbody>
            </table>

            <a href="https://conglutinative-spli.000webhostapp.com/admin/employees/addEmployee.php"><button class="myButton">Ajouter un employé</button></a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>