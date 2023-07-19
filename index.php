<?php 
    session_start();
?>
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
    <!-- Inclure le header-->
    <?php 
    include 'templates/header.php' ?>

    <!-- Premiere section content1 -->
    <div class="container headContent">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-left">
                    Expérience automobile d'exception, à portée de main chez Garage Parrot
                </h1>
                <p>
                    Bienvenue chez V. PARROT, votre <strong> automobile de confiance</strong> ! Nous sommes spécialisés dans la mécanique, la carrosserie et le montage de pneus.Notre équipe de professionnels expérimentés est là pour prendre soin de votre véhicule de A à Z. Que vous ayez besoin d'une réparation mécanique, d'une remise en état de carrosserie ou d'un changement de pneus, nous sommes équipés des outils et des compétences nécessaires pour vous offrir un service de qualité supérieure.
                </p>
            </div>
            <div class="col-md-5">
                <div class="image1"></div>
            </div>
        </div>
    </div>

    <!-- Deuxième section content2, card des services -->
    <div class="container services">
    <div class="row">
        <h2 class="text-center">Les Services</h2>
        <!-- Première card service : Carosserie -->
        <?php 
        include 'templates/contentRender.php';
        ?>
    </div>
    </div>

    <!-- Section avis -->
    <div class="container comments">
        <h2 class="text-center">Les Avis</h2>

        <?php 
        include 'templates/testimonialsRender.php';
        ?>
    </div>
    


    <!-- Inclure le footer-->
    <?php include 'templates/footer.php' ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>