<?php

include 'database/connDb.php';
if(isset($_POST["action"])){
    $sql =  "SELECT * FROM usedCars WHERE price > 0";
    if(isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price'])  && !empty($_POST['maximum_price'])){
        $sql .= " AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
    }
    if(isset($_POST['minimum_year'], $_POST['maximum_year']) && !empty($_POST['minimum_year'])  && !empty($_POST['maximum_year'])){
        $sql .= " AND years BETWEEN '".$_POST["minimum_year"]."' AND '".$_POST["maximum_year"]."'";
    }
    if(isset($_POST['minimum_km'], $_POST['maximum_km']) && !empty($_POST['minimum_km'])  && !empty($_POST['maximum_km'])){
        $sql .= " AND km BETWEEN '".$_POST["minimum_km"]."' AND '".$_POST["maximum_km"]."'";
    }
    
    $statement = $conn->query($sql);
    $result = $statement->fetch_all();
    $total_row = $statement->num_rows;
    $output = '';
    if($total_row > 0) {
        foreach($result as $row){
            $id = $row[0];
            $brand = $row[1];
            $price = $row[2];
            $years = $row[3];
            $energy = $row[4];
            $km = $row[5];
            $abs = $row[6];
            $airbag = $row[7];
            $seat = $row[8];
            $descr = $row[9];
            $photo1 = $row[10];
            $photo2 = $row[11];
            $photo3 = $row[12];
            $output .='
            <div class="col-lg-5 py-2 mx-auto">
            <div class="card">';
                 if (empty($photo2) && empty($photo3)) : 

                    $output .= '<img height="250px" class="card-img-top" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo1 .'" alt="Photo 1">';

                elseif (empty($photo3)) :

                    $output .= '<div id="hero-carousel'. $id .'" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active c-item">
                                <img height="250px" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo1 .'" class="d-block w-100 c-img" alt="Slide 1">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo2 .'" class="d-block w-100 c-img" alt="Slide 2">
                            </div>

                        </div>
                        <a class="carousel-control-prev" type="button" data-bs-target="#hero-carousel'. $id .'" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" type="button" data-bs-target="#hero-carousel'. $id .'" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>';

                else :

                    $output .= '<div id="hero-carousel<?= $id ?>" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active c-item">
                                <img height="250px" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo1 .'" class="d-block w-100 c-img" alt="Slide 1">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo2 .'" class="d-block w-100 c-img" alt="Slide 2">
                            </div>

                            <div class="carousel-item c-item">
                                <img height="250px" src="https://conglutinative-spli.000webhostapp.com/uploads/'. $photo3 .'" class="d-block w-100 c-img" alt="Slide 3">
                            </div>

                        </div>
                        <a class="carousel-control-prev" type="button" data-bs-target="#hero-carousel'. $id .'" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" type="button" data-bs-target="#hero-carousel'. $id .'" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>';

                endif;

                $output .= '<div class="card-body">
                    <h4 class="card-title text-center">'. $brand .'</h3>
                    <h4 class="card-title text-center">'. $price .'€</h3>
                    <p class="card-text">Année de fabrication: '. $years .'</p>
                    <p class="card-text">Kilométrage: '. $km .'km</p>
                    <a href="https://conglutinative-spli.000webhostapp.com/templates/detailsUsedCar.php?id='. $id .'"><button class="myButton mb-2">Détail</button></a>
                    <a href="https://conglutinative-spli.000webhostapp.com/templates/usedCarContact.php?id='. $id .'"><button class="myButton mb-2">Envoyer un message</button></a>
                </div>
            </div>
        </div>';
        }
    } else {
        $output = '<h3>Aucunes voitures n\' a été trouvé';
    }
    echo $output;
}

?>