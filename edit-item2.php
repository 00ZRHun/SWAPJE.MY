<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');

	if(strlen($_SESSION['login'])==0)
	{	
		header('location:index.php');
	}
	else
	{
		// insert data into items
		$editId = intval($_GET['id']);

		if(isset($_POST['submit']))
		{
			// $folderPath = "upload/";
			$targetDir = "img/itemImages/";
			$imagesArr = array();

			$images = array_filter($_POST['image']);

			for($i=0; $i<count($images); $i++){
				// if($image[$i] !== null){
				if(is_null($images[$i])){
					echo "NOT null";
				}else {
					echo "null";
				}
				// if(!is_null($image[$i])){
					echo $images[$i] . "<br>";
					$image_parts = explode(";base64,", $images[$i]);
				// if($image_parts !== ""){
			
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
				
					$image_base64 = base64_decode($image_parts[1]);
					$fileName = uniqid() . '.png';
				
					$imagesArr[] = $fileName;

					$file = $targetDir . $fileName;
					file_put_contents($file, $image_base64);
				// }
			}
			/* if(empty($_POST['images'])){
				$abc = "abc";
			} */
			// if(isset($_FILES['images']) ){  
				// File upload configuration
				// $targetDir = "uploads/";
				$allowTypes = array('jpg','png','jpeg','gif');
				
				// $images = array();
				$images_arr = array();
				foreach($_FILES['images']['name'] as $key=>$val){
					$image_name = $_FILES['images']['name'][$key];
					$tmp_name   = $_FILES['images']['tmp_name'][$key];
					$size       = $_FILES['images']['size'][$key];
					$type       = $_FILES['images']['type'][$key];
					$error      = $_FILES['images']['error'][$key];
					
					// version 1
					// File upload path
					$fileName = basename($_FILES['images']['name'][$key]);
					$targetFilePath = $targetDir . $fileName;
					
					// Check whether file type is valid
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
					if(in_array($fileType, $allowTypes)){    
						// Store images on the server
						if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
							$imagesArr[] = $fileName;
							$images_arr[] = $targetFilePath;
						}
					}
				}

				$images=implode(", ", $imagesArr);

				if($images == ""){
					$images = $_POST['tempImages'];
				}

			$userId=$_POST['userId'];
			// $productName=$_POST['productName'];
			$productName=$_POST['productName'];
			$usedYear=$_POST['usedYear'];
			$overview=$_POST['overview'];
			$totalPrice=$_POST['totalPrice'];
			$pricePerDay=$_POST['pricePerDay'];
			$value=$_POST['value'];
			$payPalBusinessAccount=$_POST['payPalBusinessAccount'];
			$contactNo=$_POST['contactNo'];
			
			$sell=$_POST['sell'];
			$rent=$_POST['rent'];
			$swap=$_POST['swap'];

			$sql=
				"UPDATE items
				SET
				productName = :productName,
				usedYear = :usedYear,
				overview = :overview,
				totalPrice = :totalPrice,
				pricePerDay = :pricePerDay,
				value = :value,
				payPalBusinessAccount = :payPalBusinessAccount,
				contactNo = :contactNo,
				images = :images,
				sell = :sell,
				rent = :rent,
				swap = :swap
				WHERE id=:id";
			$query = $dbh->prepare($sql);
			
			$query->bindParam(':productName',$productName,PDO::PARAM_STR);
			$query->bindParam(':usedYear',$usedYear,PDO::PARAM_STR);
			$query->bindParam(':overview',$overview,PDO::PARAM_STR);
			$query->bindParam(':totalPrice',$totalPrice,PDO::PARAM_STR);
			$query->bindParam(':pricePerDay',$pricePerDay,PDO::PARAM_STR);
			$query->bindParam(':value',$value,PDO::PARAM_STR);
			$query->bindParam(':payPalBusinessAccount',$payPalBusinessAccount,PDO::PARAM_STR);
			$query->bindParam(':contactNo',$contactNo,PDO::PARAM_STR);
			$query->bindParam(':images',$images,PDO::PARAM_STR);
			$query->bindParam(':sell',$sell,PDO::PARAM_STR);
			$query->bindParam(':rent',$rent,PDO::PARAM_STR);
			$query->bindParam(':swap',$swap,PDO::PARAM_STR);
			
			/* $query->bindParam(':userId',$userId,PDO::PARAM_STR);
			$query->bindParam(':productName',$productName,PDO::PARAM_STR);
			$query->bindParam(':usedYear',$usedYear,PDO::PARAM_STR);
			*/
			// $query->bindParam(':editId',$editId,PDO::PARAM_STR);
			$query->bindParam(':id',$editId,PDO::PARAM_STR);
			
			$query->execute();

			// $msg="Item record updated successfully".$sql.$userId.$productName.$editId.$query->execute();
			// $msg="Item record updated successfully".$sql.$productName.$editId;
			$count = $query->execute();
			if($count !== 0){
				$msg="Item record updated successfully";
			}
			else{
				$error="Something went wrong. Please try again";
			}

		}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>SWAP.MY</title>

	<!-- SWAPJE CSS + Google Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/swapje/index.css">
	<link rel="stylesheet" href="css/nav/nav.css">
	<link rel="stylesheet" href="css/swapje/post.css">
	
	<!--  -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<!--  -->
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
			
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>
	<!-- <h1><?= $id ?></h1> -->
	<!-- Start Switcher -->
	<?php include('includes/colorswitcher.php');?>
	<!-- /Switcher -->  

	<!--Header-->
	<?php include('includes/header.php');?>
	<!-- /Header --> 



	<!-- Loading Scripts -->
	<script src="js/jquery.min.js">
		</script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js">
	</script>


	<!--Footer -->
	<?php include('includes/footer.php');?>
	<!-- /Footer--> 

	<!--Back to top-->
	<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
	<!--/Back to top--> 

	<!--Login-Form -->
	<?php include('includes/login.php');?>
	<!--/Login-Form --> 

	<!--Register-Form -->
	<?php include('includes/registration.php');?>

	<!--/Register-Form --> 

	<!--Forgot-password-Form -->
	<?php include('includes/forgotpassword.php');?>
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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->
</html>

<?php } ?>