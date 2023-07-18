<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="ressources/styles/style.css">
    <link rel="stylesheet" href="ressources/jquery/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="ressources/jquery/jquery-ui.js"></script>
    <style>
    .card-img-top, .c-img {
        object-fit: cover;
    }
    </style>
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



                <div class="list-group">
                    <h5 class="p-3 text-center">Prix</h5>
                    <input type="hidden" id="hidden_minimum_price" value="1000" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <div class="row">
                        <div id="price_show_min" class="col-6 p-1 text-start">1000</div>
                        <div id="price_show_max" class="col-6 p-1 text-end">65000</div>
                    </div>
                    <div id="price_range"></div>
                
                    <h5 class="p-3 text-center">Année</h5>
                    <input type="hidden" id="hidden_minimum_year" value="1980" />
                    <input type="hidden" id="hidden_maximum_year" value="2023" />
                    <div class="row">
                        <div id="year_show_min" class="col-6 p-1 text-start">1980</div>
                        <div id="year_show_max" class="col-6 p-1 text-end">2023</div>
                    </div>
                    <div id="year_range"></div>

                    <h5 class="p-3 text-center">Kilométrage</h5>

                    <input type="hidden" id="hidden_minimum_km" value="10000" />
                    <input type="hidden" id="hidden_maximum_km" value="500000" />
                    <div class="row">
                        <div id="km_show_min" class="col-6 p-1 text-start">10000</div>
                        <div id="km_show_max" class="col-6 p-1 text-end">500000</div>
                    </div>
                    <div id="km_range"></div>

                </div>

            </div>

                <div class="col-lg-9">
                    <div class="row">
                        
                            <div class="row filter_data">

                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php include 'templates/footer.php' ?>

        <script>
            $(document).ready(function() {

                filter_data();

                function filter_data() {
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minimum_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    var minimum_year = $('#hidden_minimum_year').val();
                    var maximum_year = $('#hidden_maximum_year').val();
                    var minimum_km = $('#hidden_minimum_km').val();
                    var maximum_km = $('#hidden_maximum_km').val();
                    $.ajax({
                        url: "fetch_data.php",
                        method: "POST",
                        data: {
                            action: action,
                            minimum_price: minimum_price,
                            maximum_price: maximum_price,
                            minimum_year: minimum_year,
                            maximum_year: maximum_year,
                            minimum_km: minimum_km,
                            maximum_km: maximum_km
                        },
                        success: function(data) {
                            $('.filter_data').html(data);
                        }
                    });
                }

                $('.common_selector').click(function() {
                    filter_data();
                });

                $('#price_range').slider({
                    range: true,
                    min: 1000,
                    max: 65000,
                    values: [1000, 65000],
                    step: 500,
                    stop: function(event, ui) {
                        $('#price_show_min').html(ui.values[0]);
                        $('#price_show_max').html(ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });

                $('#year_range').slider({
                    range: true,
                    min: 1980,
                    max: 2023,
                    values: [1980, 2023],
                    step: 1,
                    stop: function(event, ui) {
                        $('#year_show_min').html(ui.values[0]);
                        $('#year_show_max').html(ui.values[1]);
                        $('#hidden_minimum_year').val(ui.values[0]);
                        $('#hidden_maximum_year').val(ui.values[1]);
                        filter_data();
                    }
                });

                $('#km_range').slider({
                    range: true,
                    min: 10000,
                    max: 500000,
                    values: [10000, 500000],
                    step: 500,
                    stop: function(event, ui) {
                        $('#km_show_min').html(ui.values[0]);
                        $('#km_show_max').html(ui.values[1]);
                        $('#hidden_minimum_km').val(ui.values[0]);
                        $('#hidden_maximum_km').val(ui.values[1]);
                        filter_data();
                    }
                });

            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>