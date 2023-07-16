<?php
require('database/connDb.php');

$sql = "SELECT lastname, firstname, testimonial, rating FROM testimonials WHERE approuved = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lastname = $row["lastname"];
        $firstname = $row["firstname"];
        $testimonial = $row["testimonial"];
        $rating = $row["rating"];
?>

        <div class="col-lg-12 rounded comment my-4">
            <h4 class="text-center"><?= $lastname . ' ' . $firstname ?></h4>
            <p class="text-center">“ <?= $testimonial ?> “</p>
            <div class="stars text-center">
                <?php 
                for($i = 0; $i < $rating; $i++){
                    echo '<span class="fa-star gold">★</span>';
                }

                for($i = 0; $i < 5-$rating; $i++){
                    echo '<span class="fa-star">★</span>';
                }

                ?>
            </div>
        </div>


<?php
    }
}
$conn->close();
?>