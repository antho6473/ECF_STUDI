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
    <?php include 'templates/header.php' ?>

    <div class="container services">
    <div class="row justify-content-between align-items-between">
        <h1 class="text-center">Les Voitures d'occasions</h1>

        <!-- Filtre -->
        <div class="col-lg-2 rounded filtre">
            <h2 class="text-center text-white">
                Filtre
            </h2>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="anneeMin" class="form-label">Année min :</label>
                    <input type="text" class="form-control" name="anneeMin" id="anneeMin">
            </div>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="anneeMax" class="form-label">Année max :</label>
                    <input type="text" class="form-control" name="anneeMax" id="anneeMax">
            </div>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="kmMin" class="form-label">Kilométrage min :</label>
                    <input type="text" class="form-control" name="kmMin" id="kmMin">
            </div>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="kmMax" class="form-label">Kilométrage max :</label>
                    <input type="text" class="form-control" name="kmMax" id="kmMax">
            </div>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="prixMin" class="form-label">Prix min :</label>
                    <input type="text" class="form-control" name="prixMin" id="prixMin">
            </div>
            <div class="col-lg-10 mb-2 mx-auto">
                    <label for="prixMax" class="form-label">Prix min :</label>
                    <input type="text" class="form-control" name="prixMax" id="prixMax">
            </div>
        </div>

        <!-- Première card service : Carosserie -->
        <div class="col-lg-9">
            <div class="row justify-content-between align-items-between">
        <div class="col-lg-5 py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/carosserie.jpg" alt="Carosserie">
                <div class="card-body">
                    <h3 class="card-title text-center">Carosserie</h3>
                    <p class="card-text">Nos spécialistes en carrosserie utilisent des techniques de pointe pour réparer et restaurer l'apparence de votre véhicule. Que ce soit pour des dommages légers ou majeurs, nous sommes là pour vous offrir un service de qualité et redonner à votre voiture son éclat d'origine. Prenez rendez-vous dès aujourd'hui et offrez une nouvelle jeunesse à votre véhicule. Votre satisfaction est notre priorité absolue.</p>
                </div>
            </div>
        </div>

        <!-- Deuxième card service : Mécanique -->
        <div class="col-lg-5 py-2">
            <div class="card">
                <img class="card-img-top" src="ressources/images/index/mecanique.jpg" alt="Mécanique">
                <div class="card-body">
                    <h3 class="card-title text-center">Mécanique</h3>
                    <p class="card-text">Bienvenue dans notre section Mécanique ! Chez Luxury Garage, notre équipe expérimentée offre des services de mécanique automobile de haute qualité. Que ce soit pour une vidange d'huile, un remplacement de pneus ou des réparations plus complexes, nous utilisons des équipements de pointe et des pièces de qualité. Nous vous garantissons un service professionnel, honnête et transparent.</p>
                </div>
            </div>
        </div>

        <!-- Troisème card service : Pneus -->
        <div class="col-lg-5 py-2">
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
    </div>
    </div>

    <?php include 'templates/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>