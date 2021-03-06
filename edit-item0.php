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

			// gallery
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
				// $targetFilePath = $targetDir . $fileName;
				$newfilename = uniqid(rand(0,100), true) . '.' . end($temp);
				$targetFilePath = $targetDir . $newfilename;
				
				// Check whether file type is valid
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				if(in_array($fileType, $allowTypes)){    
					// Store images on the server
					if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)){
						$imagesArr[] = $newfilename;
						$images_arr[] = $targetFilePath;
					}
				}
			}

			// webcam
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
	<style>
        ul, ol, li {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .container{padding: 20px;}
        .upload-div{margin-bottom: 25px;}
        .gallery{width:100%; float:left; margin-top:30px;}
        .gallery ul{margin:0; padding:0; list-style-type:none;}
        .gallery ul li{padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
        .gallery img{width:250px;}
	</style>
</head>

<body>
	<!-- <h1><?= $id ?></h1> -->
	<!-- Start Switcher -->
	<?php include('includes/colorswitcher.php');?>
	<!-- /Switcher -->  

	<!--Header-->
	<?php include('includes/header.php');?>
	<!-- /Header --> 

	<!-- Body -->
	<br>
	<!-- <div class="ts-main-content" style="margin-top:10"> -->
	<div class="ts-main-content post-item" style="padding-top: 90px; padding-bottom: 90px">
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
							<div class="text-center">
								<h2 class="">Edit Item</h2>
							</div>
							
							<!-- form 1( basic info ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>

											<!-- notification( htmlentities ) -->
												<!--status-->
												<?php include 'componentFunction/status.php'; ?>
												<!--/status-->

											<div class="panel-body">
											
											<?php
												$item_sql = "SELECT * FROM items WHERE id=:id";        
												$item_query = $dbh->prepare($item_sql);
												$item_query->bindParam(':id', $editId, PDO::PARAM_STR);
												$item_query->execute();
												$item_results = $item_query->fetch();

												// security
												// $id = $item_results["user_id"];
												$productName = $item_results["productName"];
												$usedYear = $item_results["usedYear"];
												$overview = $item_results["overview"];
												$sell = $item_results["sell"];
												$rent = $item_results["rent"];
												$swap = $item_results["swap"];
												$totalPrice = $item_results["totalPrice"];
												$pricePerDay = $item_results["pricePerDay"];
												$value = $item_results["value"];
												$payPalBusinessAccount = $item_results["payPalBusinessAccount"];
												$contactNo = $item_results["contactNo"];
												$images = $item_results["images"];
											?>

											<!-- <?= $item_sql ?>
											<?= $editId ?>
											<?= $item_results["productName"]; ?>
											<?= $productName ?> -->

												<!-- form start -->
												<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<!-- Post A Vehicle -->
													<!-- row 1 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Product Name<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="hidden" name="userId" id="userId" class="form-control" value="<?= $id ?>" required>
															<input type="text" name="productName" id="productName" class="form-control" value="<?= $productName ?>" required>
														</div>

														<label class="col-sm-2 control-label">Used Year<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="number" name="usedYear" id="usedYear" class="form-control" value="<?= $usedYear ?>" required>
														</div>

														<!-- <label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select name="brandname" required>
																<option value=""> Select </option>
																<?php 
																	$ret="select id,BrandName from tblbrands";
																	$query= $dbh -> prepare($ret);
																	//$query->bindParam(':id',$id, PDO::PARAM_STR);
																	$query-> execute();
																	$results = $query -> fetchAll(PDO::FETCH_OBJ);
																	if($query -> rowCount() > 0)
																	{
																		foreach($results as $result)
																		{
																	?>
																	<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
																<?php
																		}
																	} 
																?>
															</select>
														</div> -->
													</div>
													<!-- row 2 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Overview<span style="color:red">*</span></label>
														<div class="col-sm-10">
															<!-- <textarea class="form-control" name="overview" id="overview" rows="3" value="<?= $overview ?>" required></textarea> -->
															<textarea class="form-control" name="overview" id="overview" rows="3" required><?= $overview ?></textarea>
														</div>
													</div>
													<!-- row 3 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Total Price( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="totalPrice" id="totalPrice" class="form-control" value="<?= $totalPrice ?>" required>
														</div>

														<label class="col-sm-2 control-label">Price Per Day( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="pricePerDay" id="pricePerDay" class="form-control" value="<?= $pricePerDay ?>" required>
														</div>

														<label class="col-sm-2 control-label">Value( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="value" id="value" class="form-control" value="<?= $value ?>" required>
														</div>

														<!-- <label class="col-sm-2 control-label">pricePerDay<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select name="fueltype" required>
																<option value=""> Select </option>
																<option value="Petrol">Petrol</option>
																<option value="Diesel">Diesel</option>
																<option value="CNG">CNG</option>
															</select>
														</div> -->
													</div>
													<!-- row 4 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Pay Pal Business Account<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="email" name="payPalBusinessAccount" id="payPalBusinessAccount" class="form-control" value="<?= $payPalBusinessAccount ?>" required>
														</div>

														<label class="col-sm-2 control-label">Contact Nombor<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="number" name="contactNo" id="contactNo" class="form-control" value="<?= $contactNo ?>" required>
														</div>
													</div>

													<div class="hr-dashed"></div>

												<!-- image -->
													<!-- row 1( subtitle ) -->

													<div class="form-group">
														<div class="col-sm-12">
															<h4><b>Upload Images</b></h4>
														</div>
													</div>
													<i class="fa fa-file" aria-hidden="true" style="font-size:42px"></i>
													<div class="form-group">
														<!--galleryPic-->
														<label>Choose Images from Gallery</label>
														<input type="file" name="images[]" id="images" accept="image/*" multiple >
														<!-- <input type="submit" name="submit" value="UPLOAD"/> -->

														<!--/galleryPic-->
													</div>

													<div class="hr-dashed"></div>

													<a href="webcamImage">
														<i class="fa fa-camera" aria-hidden="true" style="font-size:42px"></i>
													</a>
													<div class="form-group">
														<?php include 'webcamImage/index.php' ?>
													</div>


													<!-- row 2( upload image ) -->
													<div class="gallery">
														<!-- gallery view of uploaded images --> 
														<div class="gallery" id="imagesPreview">
															<?php
															$tempImages = $images;
															$images = explode(', ', $tempImages);
															?>
																<input type="text" name="tempImages" id="tempImages" class="form-control" value="<?= $tempImages ?>">
															<?php
															if(!empty($images)){ 
																	/* echo $images_arr;
																	var_dump($images_arr); */
															?>
																<ul>
																	<?php foreach($images as $image_src){ ?>
																		<li>
																			<img src="img/itemImages/<?php echo $image_src; ?>" alt="<?= $image_src ?>">
																		</li>
																	<?php } ?>
																</ul>
															<?php 
															}
															?>
														</div>
													</div>
													<!-- ( upload image ) -->

													<div class="hr-dashed"></div>

										</div>
									</div>
								</div>
							</div>
								
							<!-- form 2( accessories ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Category</div>
											<div class="panel-body">

												<!-- Accessories -->
													<!-- row 1 -->
												<div class="form-group">
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="sell" name="sell" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="sell" name="sell" value="1">
															<?php } ?>

															<label for="sell">sell</label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="rent" name="rent" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="rent" name="rent" value="1">
															<?php } ?>
															
															<label for="rent">rent</label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="swap" name="swap" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="swap" name="swap" value="1">
															<?php } ?>
															
															<label for="swap">swap</label>
														</div>
													</div>


												<!-- <div class="hr-dashed"></div> -->
												<br><br><br>

												<!-- Cancel & Save btn -->
												<div class="form-group text-center">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset">Cancel</button>
														<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
													</div>
												</div>
												
												<!-- form end -->
												</form>

										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Body -->

	<!-- Cancel & Save btn -->
	<!-- <div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-default" type="reset">Cancel</button>
			<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
		</div>
	</div> -->

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