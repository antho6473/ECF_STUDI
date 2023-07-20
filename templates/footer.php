<div id="footer" class="container-fluid p-0 mt-5">

  <footer class="text-white text-lg-start">

    <div class="container p-4">

      <div class="row mt-4">

        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <h4 class="text-uppercase mb-4 text-center">Nous-contacter</h5>

            <ul class="fa-ul">
              <li class="mb-3 text-center">
                <span class="ms-2">2 rue du château, 93000 PARIS</span>
              </li>
              <li class="mb-3 text-center">
                <span class="ms-2">garageparrot@gmail.com</span>
              </li>
              <li class="mb-3 text-center">
                <span class="ms-2">05 60 33 81 66</span>
              </li>
            </ul>

        </div>


        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase mb-4 pb-1 text-center">Satisfait de nos services ?</h5>

            <div class="mb-4">
              <a href="testimonial.php"><button class="myButton">Laisser un avis</button></a>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase mb-4 text-center">Horaires</h5>
            <table class="table text-center">
              <tbody class="font-weight-normal">
                <?php
                require dirname(__DIR__).'/database/connDb.php';

                $sql = "SELECT id, jours, heure FROM schedule";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $jours = $row["jours"];
                    $heure = $row["heure"];
                ?>

                <tr>
                  <td><?= $jours ?>:</td>
                  <td><?= $heure ?></td>
                </tr>

                <?php
                  }
                }
                $conn->close();
                ?>
                
              </tbody>
            </table>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright: Garage Parrot
    </div>
    <!-- Copyright -->
  </footer>

</div>
<!-- End of .container -->