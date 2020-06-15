<?php
  session_start();
  error_reporting(0);
  include 'includes/config.php';

  if (strlen($_SESSION['login'])==0)
  {
      header('location:index.php');
  }
  else {
    if (isset($_POST['updateprofile'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contactNo = $_POST['contactNo'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $id = $_POST['id'];

        $profile=$_FILES["profile"]["name"];
        if(!$profile == ""){
          echo "123";
			    move_uploaded_file($_FILES["profile"]["tmp_name"],"img/profile/".$_FILES["profile"]["name"]);
        }else{
          echo "321";
          // $profile = $tempProfile;
          $profile = $_POST['tempProfile'];
        }

        /* $sql="INSERT INTO users(firstName,firstName,email,contactNo,dob,address,city,country) 
              VALUES(:firstName,:lastName,:email,:contactNo,:dob,:address,:city,:country)"; */
        $sql="UPDATE users SET
              profile=:profile,
              firstName=:firstName,
              lastName=:lastName,
              email=:email,
              contactNo=:contactNo,
              dob=:dob,
              address=:address,
              city=:city,
              country=:country
              WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':profile', $profile, PDO::PARAM_STR);
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactNo', $contactNo, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':country', $country, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        
        /* echo $_POST['profile'];
        echo "$sql <br> 
         <br> . profile = $profile /
         <br> . firstName = $firstName
         <br> . lastName = $lastName
         <br> . email = $email
         <br> . contactNo = $contactNo
         <br> . dob = $dob
         <br> . address = $address
         <br> . city = $city
         <br> . country = $country
         <br> . id = $id"; */

        $count = $query->execute();
        if($count !== 0){
          $msg = "Ads Updated Successfully". $images. $abc;
        }
        else{
          $error="Something went wrong. Please try again";
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

  <!-- SWAPJE CSS + Google Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/swapje/index.css">
  <link rel="stylesheet" href="css/nav/nav.css">
  <link rel="stylesheet" href="css/swapje/home.css">
  <link rel="stylesheet" href="css/swapje/profile.css">
  
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
</head>
<body>

<!--Switcher-->
<?php include('includes/colorswitcher.php');?>
<!--/Switcher -->

<!--Header-->
<?php include('includes/header.php');?>
<!--/Header-->

<?php 
  $userId = $id;
  // $useremail=$_SESSION['login'];
  $sql = "SELECT * from users where id=:id";
  $query = $dbh -> prepare($sql);
  $query->bindParam(':id', $id, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
    foreach($results as $result)
    {
      $tempProfile = htmlentities($result->profile);
      $name = $result->firstName . $result->lastName;
?>

  <!--Profile-setting-->
  <form  method="post" class="profile-form" enctype="multipart/form-data">
  <section class="user_profile inner_pages">
    <div class="container">
      <div class="user_profile_info gray-bg padding_4x4_40">
        <div class="upload_user_logo">
          
          <!-- <img src="assets/images/dealer-logo.jpg" alt="image"> -->
          <!-- <img src="img/profile/1.png" alt="profile image"> -->
          <img src="img/profile/<?=$tempProfile?>" alt="profile image">
          <input type="file" name="profile">
        </div>

        <div class="dealer_info">
          <h5><?php echo htmlentities($name);?></h5>

          <p>
            <?php echo htmlentities($result->address);?><br>
            <?php echo htmlentities($result->city);?>&nbsp;
            <?php echo htmlentities($result->country);?>
          </p>
        </div>
      </div>

      <div class="profile-column">
        
          <!--sidebar-->
          <?php # include 'includes/sidebar.php';?>
          <!--/sidebar-->

          <div class="col-md-12 col-sm-12">
            <div class="profile_wrap">
              <h5 class="uppercase underline">General Settings</h5>

              <!--Status-->
              <?php include 'componentFunction/status.php'; ?>
              <!--/Status-->
              
              <div class="form-group">
                  <label class="control-label">Reg Date -</label>
                  <?php echo htmlentities($result->regDate); ?>
                </div>
                <?php if ($result->updationDate != "") {?>
                  <div class="form-group">
                    <label class="control-label">Last Update at  -</label>
                    <?php echo htmlentities($result->updationDate); ?>
                  </div>
                <?php }?>
                  <input class="form-control white_bg" id="id" name="id" value="<?php echo htmlentities($result->id); ?>" type="hidden">
                  <input class="form-control white_bg" id="tempProfile" name="tempProfile" value="<?php echo htmlentities($tempProfile); ?>" type="hidden">
                  <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input class="form-control white_bg" id="firstName" name="firstName" value="<?php echo htmlentities($result->firstName); ?>" type="text"  required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input class="form-control white_bg" id="lastName" name="lastName" value="<?php echo htmlentities($result->lastName); ?>" type="text"  required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email Address</label>
                    <input class="form-control white_bg" id="email" name="email" value="<?php echo htmlentities($result->email); ?>" type="email" required readonly>
                    <!-- <input class="form-control white_bg" id="email" name="email" value="<?php echo htmlentities($result->email); ?>" type="email" required> -->
                  </div>
                  <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input class="form-control white_bg" id="contactNo" name="contactNo" value="<?php echo htmlentities($result->contactNo); ?>" type="number" placeholder="601112345678" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
                    <!-- <input class="form-control white_bg" id="dob" name="dob" value="<?php echo htmlentities($result->dob); ?>" placeholder="dd/mm/yyyy" type="text" > -->
                    <input class="form-control white_bg" id="dob" name="dob" value="<?php echo htmlentities($result->dob); ?>" placeholder="dd/mm/yyyy" type="date" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Your Address</label>
                    <textarea class="form-control white_bg" id="address" name="address" rows="4" ><?php echo htmlentities($result->address); ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Country</label>
                    <input class="form-control white_bg"  id="country" name="country" value="<?php echo htmlentities($result->country); ?>" type="text">
                  </div>
                  <div class="form-group">
                    <label class="control-label">City</label>
                    <input class="form-control white_bg" id="city" name="city" value="<?php echo htmlentities($result->city); ?>" type="text">
                  </div>
                <?php }}?>

                <div class="form-group">
                  <button type="submit" name="updateprofile" class="primary-btn">
                    Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/Profile-setting-->

<!--Footer-->
<?php include('includes/footer.php');?>
<!--/Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
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

</body>
</html>
<?php }?>