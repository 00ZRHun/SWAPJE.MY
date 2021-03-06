<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	// insert data into items
	if (isset($_POST['submit'])) {
		// $folderPath = "upload/";
		// $targetDir = "img/itemImages/";
		$targetDir = "img/itemImages/";
		$imagesArr = array();

		$images = array_filter($_POST['image']);

		for ($i = 0; $i < count($images); $i++) {
			// if($image[$i] !== null){
			if (is_null($images[$i])) {
				echo "NOT null";
			} else {
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
		// 
		// 
		// 
		// File upload configuration
		// $targetDir = "uploads/";
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

		// $images = array();
		$images_arr = array();
		foreach ($_FILES['images']['name'] as $key => $val) {
			$image_name = $_FILES['images']['name'][$key];
			$tmp_name   = $_FILES['images']['tmp_name'][$key];
			$size       = $_FILES['images']['size'][$key];
			$type       = $_FILES['images']['type'][$key];
			$error      = $_FILES['images']['error'][$key];

			// File upload path
			$fileName = basename($_FILES['images']['name'][$key]);
			$targetFilePath = $targetDir . $fileName;

			// Check whether file type is valid
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if (in_array($fileType, $allowTypes)) {
				// Store images on the server
				if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
					$imagesArr[] = $fileName;
					$images_arr[] = $targetFilePath;
				}
			}
		}

		$userId = $_POST['userId'];
		$productName = $_POST['productName'];
		$usedYear = $_POST['usedYear'];
		$overview = $_POST['overview'];
		$totalPrice = $_POST['totalPrice'];
		$pricePerDay = $_POST['pricePerDay'];
		$value = $_POST['value'];
		$payPalBusinessAccount = $_POST['payPalBusinessAccount'];
		$contactNo = $_POST['contactNo'];
		$itemCondition = $_POST['itemCondition'];
		$category = $_POST['category'];
		$sell = $_POST['sell'];
		$rent = $_POST['rent'];
		$swap = $_POST['swap'];

		$images = implode(", ", $imagesArr);


		$sql = "INSERT INTO items(user_id, productName,usedYear,overview,totalPrice,pricePerDay,value,payPalBusinessAccount,contactNo,images,itemCondition,category,sell,rent,swap)
			 VALUES(:userId,:productName,:usedYear,:overview,:totalPrice,:pricePerDay,:value,:payPalBusinessAccount,:contactNo,:images,:itemCondition,:category,:sell,:rent,:swap)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':userId', $userId, PDO::PARAM_STR);
		$query->bindParam(':productName', $productName, PDO::PARAM_STR);
		$query->bindParam(':usedYear', $usedYear, PDO::PARAM_STR);
		$query->bindParam(':overview', $overview, PDO::PARAM_STR);
		$query->bindParam(':totalPrice', $totalPrice, PDO::PARAM_STR);
		$query->bindParam(':pricePerDay', $pricePerDay, PDO::PARAM_STR);
		$query->bindParam(':value', $value, PDO::PARAM_STR);
		$query->bindParam(':payPalBusinessAccount', $payPalBusinessAccount, PDO::PARAM_STR);
		$query->bindParam(':contactNo', $contactNo, PDO::PARAM_STR);

		$query->bindParam(':images', $images, PDO::PARAM_STR);

		$query->bindParam(':itemCondition', $itemCondition, PDO::PARAM_STR);
		$query->bindParam(':category', $category, PDO::PARAM_STR);
		$query->bindParam(':sell', $sell, PDO::PARAM_STR);
		$query->bindParam(':rent', $rent, PDO::PARAM_STR);
		$query->bindParam(':swap', $swap, PDO::PARAM_STR);

		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Item posted successfully" . $images;
		} else {
			$error = "Something went wrong. Please try again" . $userId . $images;
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
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<!-- <h1><?= $id ?></h1> -->
		<!-- Start Switcher -->
		<?php include('includes/colorswitcher.php'); ?>
		<!-- /Switcher -->

		<!--Header-->
		<?php include('includes/header.php'); ?>
		<!-- /Header -->

		<!-- Body -->
		<div class="ts-main-content post-item" style="padding-top: 90px; padding-bottom: 90px">
			<div class="container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="page-title text-center">
								<h2 class="">Post Item</h2>
							</div>

							<!-- form 1( basic info ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>

										<!-- notification( htmlentities ) -->
										<?php
										if ($error) {
										?>
											<div class="errorWrap">
												<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
											</div>
										<?php
										}
										if ($msg) {
										?>
											<div class="succWrap">
												<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
											</div>
										<?php
										}
										?>

										<div class="panel-body">

											<strong class="text-danger">Select at least 1 category: sell, rent or swap below to enable filling</strong>

											<!-- form start -->
											<form method="post" class="form-horizontal" style="margin-top: 2em" enctype="multipart/form-data">
												<!-- Post A Vehicle -->
												<!-- row 1 -->												
												<div class="form-group">
													<label class="col-sm-2 control-label">Product Name<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="hidden" name="userId" id="userId" class="form-control" required value="<?= $id ?>">
														<input type="text" name="productName" id="productName" disabled class="form-control-default form-control" required>
													</div>

													<label class="col-sm-2 control-label">Used Year<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="number" name="usedYear" disabled id="usedYear" class="form-control form-control-default" required>
													</div>

													<!-- <label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select name="brandname" required>
																<option value=""> Select </option>
																<?php
																$ret = "select id,BrandName from tblbrands";
																$query = $dbh->prepare($ret);
																//$query->bindParam(':id',$id, PDO::PARAM_STR);
																$query->execute();
																$results = $query->fetchAll(PDO::FETCH_OBJ);
																if ($query->rowCount() > 0) {
																	foreach ($results as $result) {
																?>
																	<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
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
														<textarea disabled class="form-control form-control-default" name="overview" id="overview" rows="3" required></textarea>
													</div>
												</div>
												<!-- row 3 -->
												<div class="form-group">
													<label class="col-sm-2 control-label">Total Price( RM )<span style="color:red">*</span></label>
													<div class="col-sm-2">
														<input type="number" name="totalPrice" id="totalPrice" disabled class="form-control-default form-control" required>
													</div>

													<label class="col-sm-2 control-label">Price Per Day( RM )<span style="color:red">*</span></label>
													<div class="col-sm-2">
														<input disabled type="number" name="pricePerDay" id="pricePerDay" class="form-control-default form-control" required>
													</div>

													<label class="col-sm-2 control-label">Value( RM )<span style="color:red">*</span></label>
													<div class="col-sm-2">
														<input disabled type="number" name="value" id="value" class="form-control form-control-default" required>
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
														<input type="email" name="payPalBusinessAccount" id="payPalBusinessAccount" disabled class="form-control-default form-control" required>
													</div>

													<label class="col-sm-2 control-label">Contact Nombor<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="number" name="contactNo" id="contactNo" disabled class="form-control-default form-control" required>
													</div>
												</div>

												<div class="hr-dashed"></div>

												<!-- image -->
													<!-- gallery -->
												<div class="form-group image">
													<div class="col-sm-12">
														<h5>
															<b>
																<a href="#">
																	<i class="fa fa-image webcam-icon" aria-hidden="true"></i>
																</a>Upload Images
															</b>
														</h5>
													</div>
												</div>
												<div class="form-group image-content">
													<div class="col-sm-12">
														<!--galleryPic-->
														<label>Choose Images</label>
														<input type="file" name="images[]" id="images" accept="image/*" multiple>
														<!-- <input type="submit" name="submit" value="UPLOAD"/> -->

														<div class="snapshot-grid" id="preview-images"></div>
														<!--/galleryPic-->
													</div>
												</div>

													<!-- webcam -->
												<div class="form-group snapshot">
													<div class="col-sm-12">
														<h5>
															<b>
																<a href="webcamImage">
																	<i class="fa fa-camera webcam-icon" aria-hidden="true"></i>
																</a>Upload Snapshot
															</b>
														</h5>
													</div>
												</div>
												<?php include 'webcamImage/index.php' ?>

												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Item condition 1-10<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select disabled name="itemCondition" id="itemCondition" class="form-control form-control-default" required>
															<option value="10">10</option>
															<option value="9">9</option>
															<option value="8">8</option>
															<option value="7">7</option>
															<option value="6">6</option>
															<option value="5">5</option>
															<option value="4">4</option>
															<option value="3">3</option>
															<option value="2">2</option>
															<option value="1">1</option>
														</select>
													</div>
													<!--  -->
													<!--  -->
													<!--  -->
													<label class="col-sm-2 control-label">Category<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select disabled  name="category" id="category" class="form-control-default form-control" required>
															<?php
															$sql = "SELECT * FROM category WHERE delmode=0 ORDER BY name ASC";

															// echo $id;

															$query = $dbh->prepare($sql);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {
															?>
																	<option value="<?= $result->id; ?>"><?= $result->name; ?></option>
															<?php }
															} ?>
														</select>
													</div>
													<!--  -->
													<!--  -->
													<!--  -->

												</div>

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
														<input type="checkbox" id="sell" name="sell" value="1">
														<label for="sell">sell</label>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="rent" name="rent" value="1">
														<label for="rent">rent</label>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="swap" name="swap" value="1">
														<label for="swap">swap</label>
													</div>
												</div>

												<!-- <div class="hr-dashed"></div> -->
												<br><br><br>

												<!-- Cancel & Save btn -->
												<div class="form-group text-center">
													<div class="col-sm-8 col-sm-offset-2">
													<button class="primary-btn" name="submit" type="submit">Save changes</button>
														<button class="grey-btn" style="margin: 5px 0" type="reset">Cancel</button>														
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
		
		<script src="js/main.js"></script>
		<script>
			function previewImages() {

				var preview = document.querySelector('#preview-images');

				if (this.files) {
					[].forEach.call(this.files, readAndPreview);
				}

				function readAndPreview(file) {

					// Make sure `file.name` matches our extensions criteria
					if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
						return alert(file.name + " is not an image");
					} // else...

					var reader = new FileReader();

					reader.addEventListener("load", function() {
						const imageElem = `
							<img src=${this.result} alt=${file.name} />
						`;
						preview.innerHTML += imageElem;
					});

					reader.readAsDataURL(file);

				}

			}

			document.querySelector('#images').addEventListener("change", previewImages);

			const uploadImageContent = document.querySelector(".image-content");
			const uploadSnapshotContent = document.querySelector(".upload-image-container");
			
			const uploadImageClicker = document.querySelector(".image");
			const uploadSnapshotClicker = document.querySelector(".snapshot");

			uploadImageClicker.addEventListener('click', () => uploadImageContent.classList.toggle("show"));
			uploadSnapshotClicker.addEventListener('click', () => uploadSnapshotContent.classList.toggle("show"));

			// Handle checkbox and input field
			const sellCheckbox = document.getElementById('sell'),
				  rentCheckbox = document.getElementById('rent'),
				  swapCheckbox = document.getElementById('swap');

			const formControls = document.querySelectorAll(".form-control-default");

			// Handlers
			function checkboxOnChecked(e) {
				if(sellCheckbox.checked || rentCheckbox.checked || swapCheckbox.checked) {
					formControls.forEach((control) => {
						control.disabled = false;
					})
				}			

				else {
					formControls.forEach((control) => {
						control.disabled = true;
					})
				}
						
			}

			sellCheckbox.addEventListener('change', checkboxOnChecked);
			rentCheckbox.addEventListener('change', checkboxOnChecked);
			swapCheckbox.addEventListener('change', checkboxOnChecked);
			
		</script>


		<!--Footer -->
		<?php include('includes/footer.php'); ?>
		<!-- /Footer-->

		<!--Back to top-->
		<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
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

<?php } ?>