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

            <div class="col-lg-9">
                <div class="row">
                    
                    <?php include 'templates/usedCarsRender.php' ?>

                </div>
            </div>
        </div>
    </div>

    <?php include 'templates/footer.php' ?>
    <!--
    <script>
        function fetchData(){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {action:action};
                success: function(data){
                    $()
                }
            });
        }
    </script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>