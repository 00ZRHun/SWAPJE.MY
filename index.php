<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <title>SWAP.ME</title>


  <!-- SWAPJE CSS + Google Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/swapje/index.css">
  <link rel="stylesheet" href="css/nav/nav.css">
  <link rel="stylesheet" href="css/swapje/home.css">

  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

  <!-- Start Switcher -->
  <?php include('includes/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <section class="home-section">
    <div class="container">
      <h5>Items Browser</h5>      

      <!-- Body -->

      <div id="latestItem" class="item-grid">

        <?php
        if (isset($_REQUEST['category'])) {
          $sql = "SELECT * from items WHERE delmode=0 AND category=:category ORDER BY updationDate DESC";
          $category = $_POST['category'];
          $query = $dbh->prepare($sql);
          $query->bindParam(':category', $category, PDO::PARAM_STR);
        } else if (isset($_REQUEST['search'])) {
          // $sql = "SELECT * from items WHERE delmode=0 AND productName LIKE '%:search%' ORDER BY updationDate DESC";
          $sql = "SELECT * from items WHERE delmode=0 AND productName LIKE :search ORDER BY updationDate DESC";
          $search = '%' . $_POST['search'] . '%';
          $query = $dbh->prepare($sql);
          $query->bindParam(':search', $search, PDO::PARAM_STR);
        } else {
          // $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
          // $sql = "SELECT * from items WHERE delmode=0 ORDER BY updationDate DESC";
          $sql = "SELECT items.*, SUM(rating.star) as starRating
            from items 
            LEFT JOIN rating
            ON items.id = rating.itemId
            WHERE delmode=0
            GROUP BY items.id
            ORDER BY starRating DESC";
          $query = $dbh->prepare($sql);
        }


        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;

        if ($query->rowCount() == 0) {
        ?>

          <section class="about_us section-padding">
            <div class="container">
              <div class="section-header text-center">
                <h3>No matching records found</h3>
              </div>
            </div>
          </section>

          <?php
        } else {
          foreach ($results as $result) {
          ?>

            <div class="card" onclick="window.location.href = 'item-details.php?vhid=<?php echo htmlentities($result->id); ?>'">
              <div class="card-image-padding">
                <!-- <img src="img/itemImages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"> -->
                <?php $images = explode(', ', $result->images); ?>
								<!-- <img src="img/adsImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image"> -->

                <img src="img/itemImages/<?php echo htmlentities($images[1]); ?>" class="img-responsive" alt="image">
              </div>              
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlentities($result->productName); ?></h5>
                <div class="card-item-description">
                  <div style="display: flex; flex-flow: column">
                    <h6 class="card-description-label">Used Year:</h6>
                    <p class="card-description-text"><?php echo htmlentities($result->usedYear); ?> Year Used</p>
                  </div>                  
                  <div style="display: flex; flex-flow: column">
                    <h6 class="card-description-label">Overview:</h6>
                    <p class="card-description-text"><?php echo substr($result->overview, 0, 70); ?></p>
                  </div>
                </div>                                          
                </div>
                <div class="card-footer">
                <div>
                    <strong>Sell:</strong>
                    <strong>
                      <?php
                      if ($result->sell == 1) {
                      ?>
                        RM
                      <?php
                        echo htmlentities($result->totalPrice);
                      } else {
                      ?>
                        N/A
                      <?php
                      } ?>
                    </strong>
                  </div>
                  <div>
                    <strong>Rent:</strong>
                    <strong>
                      <?php
                      if ($result->rent == 1) {
                      ?>
                        RM
                      <?php
                        echo htmlentities($result->pricePerDay);
                      } else {
                      ?>
                        N/A
                      <?php
                      } ?>
                    </strong>
                  </div>
                  <div>
                    <strong>Swap:</strong>
                    <strong>
                      <?php
                      if ($result->swap == 1) {
                      ?>
                        RM
                      <?php
                        echo htmlentities($result->value);
                      } else {
                      ?>
                        N/A
                      <?php
                      } ?>
                    </strong>
                  </div>
              </div>                            
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
    <!-- /Recent Cat -->
    <!-- /Body -->
  </section>
  <!-- Home-section -->

  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <?php include 'componentFunction/backToTop.php'; ?>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>
  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>
  <!--/Forgot-password-Form -->

  <!--Scripts-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <!--/Scripts-->

</body>

</html>