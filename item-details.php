<?php
  session_start();
  include 'includes/config.php';
  error_reporting(0);

  if(strlen($_SESSION['login'])==0)
    {	
      header('location:index.php');
    }
    else
    {
      if(isset($_REQUEST['addfavorite'])){
        $sql = "INSERT INTO favorite(userId,itemId) VALUE(:userId,:itemId)";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':userId',$_POST['addfavorite'], PDO::PARAM_STR);
        $query -> bindParam(':itemId',$_GET['vhid'], PDO::PARAM_STR);
        $query -> execute();
        $msg="Favorite added";
      }
      if(isset($_REQUEST['cancelfavorite'])){
        $sql = "DELETE FROM favorite WHERE userId=:userId AND itemId=:itemId";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':userId',$_POST['cancelfavorite'], PDO::PARAM_STR);
        $query -> bindParam(':itemId',$_GET['vhid'], PDO::PARAM_STR);
        $query -> execute();
        $error="Favourite canceled";
      }
    }

  if (isset($_POST['submit'])) {
      $fromdate = $_POST['fromdate'];
      $todate = $_POST['todate'];
      $message = $_POST['message'];
      $useremail = $_SESSION['login'];
      $status = 0;
      $vhid = $_GET['vhid'];
      $sql = "INSERT INTO tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status)
      VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
      $query = $dbh->prepare($sql);

      $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
      $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
      $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
      $query->bindParam(':todate', $todate, PDO::PARAM_STR);
      $query->bindParam(':message', $message, PDO::PARAM_STR);
      $query->bindParam(':status', $status, PDO::PARAM_STR);
      $query->execute();

      $lastInsertId = $dbh->lastInsertId();

      if ($lastInsertId) {
          echo "<script>alert('Booking successfull.');</script>";
      } else {
          echo "<script>alert('Something went wrong. Please try again');</script>";
      }

  }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>SWAP.MY</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
  <!-- icon -->

  <!-- SWITCHER -->
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

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

<!--Switcher-->
<?php include 'includes/colorswitcher.php';?>
<!--/Switcher-->

<!--Header-->
<?php include 'includes/header.php';?>
<!--/Header-->

<!-- get data from items -->
<?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT * 
  from items 
  LEFT JOIN favorite
  ON items.id = favorite.itemId
  where items.id=:vhid AND delmode=0
  LIMIT 1";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  // $query->bindParam(':userId', $id, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
      foreach ($results as $result) {
          /* $_SESSION['brndid'] = $result->bid;
          $providerID = $result->user_id; */
?>

  <!--notification( htmlentities )-->
  <?php include 'componentFunction/notification.php';?>
  <!--/notification( htmlentities )-->

  <!--favorite-->
  <?php include 'componentFunction/favorite.php';?>
  <!--/favorite-->

  <!-- <i class='fas fa-comments' style='font-size:36px'></i> -->

  <!--Listing-Image-Slider-->
  <?php include 'componentFunction/listingImageSlider.php';?>
  <!--/Listing-Image-Slider-->

  <!--shareOnFacebookAndTwitter-->
  <?php include 'componentFunction/shareOnFacebookAndTwitter.php';?>
  <!--/shareOnFacebookAndTwitter-->

  <!-- php global variable -->
  <?php
    $name = $result->productName;
  ?>
  <!--Listing-detail-->
  <section class="listing-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <!--main_features-->
          <?php include 'componentFunction/mainFeatures.php';?>
          <!--/main_features-->

          <!-- tabs( overview, accessories) -->
          <div class="listing_more_info">
            <div class="listing_detail_wrap">
              <!-- 1) -->
              <!--nav-tabs-->
              <?php include 'componentFunction/navTabs.php';?>
              <!--/nav-tabs-->

              <!-- 2) -->
                <!-- Tab panes -->
              <div class="tab-content">
                  <!--Sell-->
                  <?php include 'componentFunction/sell.php';?>
                  <!--/Sell-->

                  <!--Rent-->
                  <?php include 'componentFunction/rent.php';?>
                  <!--/Rent-->

                  <!--Swap-->
                  <?php include 'componentFunction/swap.php';?>
                  <!--/Swap-->
              </div>

            </div>
          </div>
          
<?php }}?>

        </div>
      </div>

      <div class="space-20"></div>
      <div class="divider"></div>

      <!--Similar-Items-->
      <?php include 'componentFunction/similarItems.php';?>
      <!--/Similar-Items-->

    </div>
  </section>
  <!--/Listing-detail-->
<!-- /body -->

<!--Star Rating-->
<?php include 'componentFunction/starRating.php';?>
<!--/Star Rating-->

<!--Footer -->
<?php include 'includes/footer.php';?>
<!--/Footer-->

<!--Back to top-->
<?php include 'componentFunction/backToTop.php';?>
<!--/Back to top-->

<!--Login-Form-->
<?php include 'includes/login.php';?>
<!--/Login-Form-->

<!--Register-Form-->
<?php include 'includes/registration.php';?>
<!--/Register-Form-->

<!--Forgot-password-Form-->
<?php include 'includes/forgotpassword.php';?>
<!--/Forgot-password-Form-->

<!--Logics-->
<script src="js/swap/swap.js"></script>
<!--/Logics-->

<!--script-->
<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<!--/script-->
</body>
</html>