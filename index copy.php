<?php
session_start();
include 'includes/config.php';
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

  <title>SWAPJE.MY</title>    
  
  <!-- SWAPJE CSS + Google Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/swapje/index.css">
  <link rel="stylesheet" href="css/nav/nav.css">
  <link rel="stylesheet" href="css/swapje/index.css">  

  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  <!-- fa4 icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/custom.css">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>

  <!--Header-->
  <?php include 'includes/header.php'; ?>
  <!-- /Header -->

  <!--ContinueWithGoogle-->
  <!-- <div class="panel panel-default">
  <?php
  if ($login_button == '') {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
    echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
  } else {
    echo '<div align="center">' . $login_button . '</div>';
  }
  ?>
</div> -->
  <!--/ContinueWithGoogle-->

  <!-- Banners -->
  <section id="banner" class="banner-section">
    <div class="container">
      <div class="div_zindex">
        <div class="row">
          <div class="col-md-5 col-md-push-7">
            <div class="banner_content">
              <h1>Find the right item for you.</h1>
              <p>We have more than a thousand items for you to choose. </p>
              <!-- <a href="page.php" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> -->
              <a href="page.php?type=aboutus" class="btn">
                Read More
                <span class="angle_arrow">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Banners -->


  <!-- Body -->
  <!-- Resent Cat-->
  <section class="section-padding gray-bg">
    <div class="container">
      <!-- row 1( descritption ) -->
      <div class="section-header text-center">
        <h2>Find the Best <span>ItemForYou</span></h2>
        <p>
          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
        </p>
      </div>

      <div class="row">
        <!-- row 2( new car btn ) -->
        <!-- Nav tabs -->
        <!-- <a href="#resentnewcar"> -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <!-- data-toggle="tab"/"modal" -->
              <!-- <a href="#resentnewcar" role="tab" data-toggle="tab" data-dismiss="tab"> -->
              <!-- <a href="#resentnewcar" role="tab" data-toggle="tab"> -->
              <a href="#latestItem" role="tab" style="cursor:pointer;">
                Latest Item
              </a>
            </li>
          </ul>
        </div>
        <!-- </a> -->

        <!-- row 3( car list ) -->
        <!-- Recently Listed New Cars -->
        <div class="tab-content" id="zctb">
          <!-- <div role="tabpanel" class="tab-pane active" id="resentnewcar"> -->
          <div id="latestItem">

            <?php
            // $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
            $sql = "SELECT * from items WHERE delmode=0 ORDER BY updationDate DESC";

            // $sql = "SELECT * from tblpostitem ORDER BY updationDate DESC";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {
            ?>

                <div class="col-list-3">
                  <div class="recent-car-list">
                    <div class="car-info-box">
                      <a href="item-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                        <img src="img/itemImages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image">
                      </a>

                      <!-- <ul>
                  <li>
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <?php echo htmlentities($result->productName); ?>
                  </li>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo htmlentities($result->usedYear); ?>
                    Model
                  </li>
                  <li>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo htmlentities($result->SeatingCapacity); ?>
                    seats
                  </li>
                </ul> -->
                      <ul>
                        <li>
                          <!-- <i class="fa fa-car" aria-hidden="true"></i> -->
                          Sell :
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
                          }
                          ?>
                        </li>

                        <li>
                          <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                          Rent :
                          <!--  -->
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
                          }
                          ?>
                          <!--  -->
                        </li>

                        <li>
                          <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                          Swap :
                          <!--  -->
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
                          }
                          ?>
                          <!--  -->
                        </li>
                      </ul>
                    </div>

                    <div class="car-title-m">
                      <h6>
                        <a href="item-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                          <!-- , <?php echo htmlentities($result->VehiclesTitle); ?> -->
                          <?php echo htmlentities($result->productName); ?>
                        </a>
                      </h6>

                      <span class="price">
                        <?php echo htmlentities($result->usedYear); ?> Year Used
                      </span>
                    </div>

                    <div class="inventory_info_m">
                      <p>
                        <?php
                        echo substr($result->overview, 0, 70);
                        ?>
                      </p>
                    </div>
                  </div>
                </div>

            <?php
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Resent Cat -->
  <!-- /Body -->

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>  
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>

  <!--Footer -->
  <?php include 'includes/footer.php'; ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include 'includes/login.php'; ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include 'includes/registration.php'; ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include 'includes/forgotpassword.php'; ?>
  <!--/Forgot-password-Form -->

  <!-- Scripts -->
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

</body>

</html>