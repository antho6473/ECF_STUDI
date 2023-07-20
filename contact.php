<!DOCTYPE html>
<html lang="en" style="height:100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Garage Parrot</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="ressources/styles/style.css">
</head>

<body style="min-height: 100%;
  margin: 0;
  padding: 0;">
    <?php include 'templates/header.php';


    if (isset($_POST['nom']) &&  isset($_POST['prenom']) && isset($_POST['email'])  && isset($_POST['telephone'])  && isset($_POST['demande'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $demande = htmlspecialchars($_POST['demande']);

        require('database/connDb.php');

        $sql = "SELECT firstname, email, msg FROM messages WHERE msg = '$demande'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $errorMessage = sprintf(
                'Vous avez déjà envoyé un message !'
            );
        } else {

            $sql = "INSERT INTO messages (lastname, firstname, email, phone, msg) VALUES ('$nom', '$prenom', '$email', '$telephone', '$demande')";

            $result = $conn->query($sql);

            $successMessage = sprintf(
                'Message envoyé avec succés !'
            );
        }


        $conn->close();
    }

    ?>

    <div class="container">
        <h1 class="pt-5 text-center">Formulaire de contact</h1>
        <p class="text-center text-dark">Nous répondrons à votre demande dans les plus brefs délais
        </p>
        <div class="col-8 mx-auto">
            <form action="" method="POST" id="formEvent" enctype="multipart/form-data" class="contactForm rounded">
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
                        <label for="prenom" class="form-label">Prénom* :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom">
                    </div>

                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="email" class="form-label">Email* :</label>
                        <input type="email" name="email" class="form-control input" id="email">
                    </div>

                    <div class="col-lg-6 mb-2 mx-auto">
                        <label for="telephone" class="form-label">Numéro de téléphone* :</label>
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
        </div>
    </div>
    <script>
        let nom = document.getElementById('nom');
        let prenom = document.getElementById('prenom');
        let email = document.getElementById('email');
        let telephone = document.getElementById('telephone');
        let demande = document.getElementById('demande');

        formEvent.addEventListener("submit", function(e) {
            if (nom.value.trim() == "" || prenom.value.trim() == "" || email.value.trim() == "" || demande.value.trim() == "" || telephone.value.trim() == "") {
                let error = document.getElementById('error');
                error.innerHTML = 'Veuillez remplir tout les champs.';
                e.preventDefault();
            }
        })
    </script>

    <?php include 'templates/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>