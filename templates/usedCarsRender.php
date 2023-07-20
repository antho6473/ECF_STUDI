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
    }
}
?>