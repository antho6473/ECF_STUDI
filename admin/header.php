<header>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="http://localhost/demo/LuxuryGarage">
                <img src="http://localhost/demo/LuxuryGarage/ressources/images/logoW.png" height="50px" alt="">
            </a>

            <!-- Bouton mobile -->
            <button class="navbar-toggler navbar-dark shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="menuMobile offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://localhost/demo/LuxuryGarage/admin/testimonials/testimonials.php">Gérer les avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/demo/LuxuryGarage/admin/usedCars/usedCars.php">Gérer les voitures</a>
                        </li>
                        <?php if ($_SESSION['role'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/demo/LuxuryGarage/admin/employees/employee.php">Gérer les employés</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/demo/LuxuryGarage/admin/content/content.php">Gérer le contenu</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <a href="http://localhost/demo/LuxuryGarage/admin/logout.php"><button class="myButton">Se deconnecter</button></a>
                </div>
            </div>
        </div>
    </nav>
</header>