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

    <div class="container">
        <h1 class="pt-5 text-center">Formulaire de contact</h1>
        <p class="text-center">Nous répondrons à votre demande dans les plus brefs délais
        </p>
        <form action="" method="POST" id="formEvent" enctype="multipart/form-data" class="contactForm rounded">
            <div class="row">
                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="nom" class="form-label">Nom* :</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="prenom" class="form-label">Prénom* :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="email" class="form-label">Email* :</label>
                    <input type="email" name="email" class="form-control input" id="email">
                </div>

                <div class="col-lg-6 mb-2 mx-auto">
                    <label for="telephone" class="form-label">Numéro de téléphone: (facultatif)</label>
                    <input type="phone" name="telephone" class="form-control input" id="telephone">
                </div>

                <div class="col-lg-12 mb-2 mx-auto">
                    <label for="demande" class="form-label">Votre demande*:</label>
                    <textarea class="form-control input" name="demande" id="demande" cols="" rows="5"></textarea>
                </div>


                <span id="error"></span>

                <div class="col-lg-6 mx-auto">
                    <button class="myButton" type="submit">Envoyer</button>
                </div>
            </div>
        </form>

        <script>
            let nom = document.getElementById('nom');
            let prenom = document.getElementById('prenom');
            let email = document.getElementById('email');
            let demande = document.getElementById('demande');

            formEvent.addEventListener("submit", function (e) {
                if (nom.value.trim() == "" || prenom.value.trim() == "" || email.value.trim() == "" || demande.value.trim() == "") {
                    let error = document.getElementById('error');
                    error.innerHTML = 'Veuillez remplir tout les champs.';
                    e.preventDefault();
                }
            })
        </script>
    </div>

    <?php include 'templates/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>