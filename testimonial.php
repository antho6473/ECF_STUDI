<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="ressources/styles/style.css">
</head>

<body>
    <?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include 'templates/header.php';



    if (isset($_POST['nom']) &&  isset($_POST['testimonial']) && isset($_POST['note'])) {
        include_once('database/connDb.php');
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $testimonial = htmlspecialchars($_POST['testimonial']);
        $note = htmlspecialchars($_POST['note']);
        $approuved = true;

        $sql = "SELECT lastname, firstname, testimonial, rating, approuved FROM testimonials WHERE testimonial = '$testimonial'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $errorMessage = sprintf(
                'Le même avis a déjà été posté !'
            );
        } else {

            $sql = "INSERT INTO testimonials (lastname, firstname, testimonial, rating, approuved) VALUES ('$nom', '$prenom','$testimonial','$note','$approuved')";

            $result = $conn->query($sql);

            $successMessage = sprintf(
                'Avis posté avec succés !'
            );
        }
        $conn->close();
    }

    ?>

    <div class="container">
        <h1 class="pt-5 text-center">Poster un témoignage</h1>
        <p class="text-center text-dark">Votre avis compte beaucoup pour nous !
        </p>
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
                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="nom" class="form-label">Nom* :</label>
                        <input type="text" class="form-control" name="nom" id="nom">
                    </div>

                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom">
                    </div>

                    <div class="col-lg-12 mb-2 mx-auto">
                        <label for="testimonial" class="form-label">Votre avis* :</label>
                        <textarea class="form-control input" name="testimonial" id="testimonial" cols="" rows="5"></textarea>
                    </div>

                    <div class="col-lg-2 mb-2 mx-auto">
                        <input type="hidden" name="note" id="note">
                    </div>


                    <div class="stars text-center">
                        <span class="fa-star" data-value="1">★</span><span class="fa-star" data-value="2">★</span><span class="fa-star" data-value="3">★</span><span class="fa-star" data-value="4">★</span><span class="fa-star" data-value="5">★</span>
                    </div>



                    <span id="error"></span>

                    <div class="col-lg-6 mx-auto">
                        <button class="myButton" type="submit">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="ressources/scripts/script.js">

        </script>
    </div>

    <?php include 'templates/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>