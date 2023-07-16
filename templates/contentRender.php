<?php
require('database/connDb.php');

$sql = "SELECT id, title, content FROM services";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row["title"];
        $content = $row["content"];
?>

        <div class="col-lg py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/image<?= $id ?>.jpg" alt="<?= $title ?>">
                <div class="card-body">
                    <h3 class="card-title text-center"><?= $title ?></h3>
                    <p class="card-text"><?= $content ?></p>
                </div>
            </div>
        </div>

<?php
    }
}
$conn->close();
?>