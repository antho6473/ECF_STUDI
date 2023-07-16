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
    session_start();
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
        <div class="col-lg py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/carosserie.jpg" alt="Carosserie">
                <div class="card-body">
                    <h3 class="card-title text-center">Carosserie</h3>
                    <p class="card-text">Nos spécialistes en carrosserie utilisent des techniques de pointe pour réparer et restaurer l'apparence de votre véhicule. Que ce soit pour des dommages légers ou majeurs, nous sommes là pour vous offrir un service de qualité et redonner à votre voiture son éclat d'origine. Prenez rendez-vous dès aujourd'hui et offrez une nouvelle jeunesse à votre véhicule. Votre satisfaction est notre priorité absolue.</p>
                </div>
            </div>
        </div>

        <!-- Deuxième card service : Mécanique -->
        <div class="col-lg py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/mecanique.jpg" alt="Mécanique">
                <div class="card-body">
                    <h3 class="card-title text-center">Mécanique</h3>
                    <p class="card-text">Bienvenue dans notre section Mécanique ! Chez Luxury Garage, notre équipe expérimentée offre des services de mécanique automobile de haute qualité. Que ce soit pour une vidange d'huile, un remplacement de pneus ou des réparations plus complexes, nous utilisons des équipements de pointe et des pièces de qualité. Nous vous garantissons un service professionnel, honnête et transparent.</p>
                </div>
            </div>
        </div>

        <!-- Troisème card service : Pneus -->
        <div class="col-lg py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/pneu.jpg" alt="Pneus">
                <div class="card-body">
                    <h3 class="card-title text-center">Pneus</h3>
                    <p class="card-text">Nous assurons le montage professionnel de pneus pour tous types de véhicules. Notre équipe expérimentée offre un service rapide et fiable. Que ce soit pour un changement saisonnier, un remplacement usuel ou une amélioration de performance, nous sommes là pour vous aider. Nous utilisons des équipements de pointe et suivons les procédures recommandées par les fabricants pour un montage précis et sécurisé</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Section avis -->
    <div class="container comments">
        <h2 class="text-center">Les Avis</h2>

        <div class="col-lg-12 comment my-4">
            <h4 class="text-center">HUGO</h4>
            <p class="text-center">“ Je recommande vivement Garage Parrot. Excellent accueil, prise en compte des besoins, honnêteté et professionnalisme. “</p>
            <div class="stars text-center">
		        <span class="fa-star gold">★</span>
		        <span class="fa-star gold">★</span>
		        <span class="fa-star">★</span>
		        <span class="fa-star">★</span>
		        <span class="fa-star">★</span>
	        </div>
        </div>

        <div class="col-lg-12 comment my-4">
            <h4 class="text-center">HUGO</h4>
            <p class="text-center">“ Je recommande vivement Garage Parrot. Excellent accueil, prise en compte des besoins, honnêteté et professionnalisme. “</p>
            <div class="stars text-center">
		        <span class="fa-star gold">★</span>
		        <span class="fa-star gold">★</span>
		        <span class="fa-star">★</span>
		        <span class="fa-star">★</span>
		        <span class="fa-star">★</span>
	        </div>
        </div>
    </div>
    


    <!-- Inclure le footer-->
    <?php include 'templates/footer.php' ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>