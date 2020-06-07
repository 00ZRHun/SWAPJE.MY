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
		// insert data into ads
		if(isset($_POST['submit']))
		{
			// $userId=$_POST['userId'];
			$title=$_POST['title'];
			$category=$_POST['category'];
			$companyName=$_POST['companyName'];
			$payPalBusinessAccount=$_POST['payPalBusinessAccount'];
			$contactNo=$_POST['contactNo'];
			$description=$_POST['description'];
			$id=$_GET['id'];
			/* $vimage1=$_FILES["img1"]["name"];
			$vimage2=$_FILES["img2"]["name"];
			$vimage3=$_FILES["img3"]["name"];
			$vimage4=$_FILES["img4"]["name"];
			$vimage5=$_FILES["img5"]["name"];
			move_uploaded_file($_FILES["img1"]["tmp_name"],"img/adsImages/".$_FILES["img1"]["name"]);
			move_uploaded_file($_FILES["img2"]["tmp_name"],"img/adsImages/".$_FILES["img2"]["name"]);
			move_uploaded_file($_FILES["img3"]["tmp_name"],"img/adsImages/".$_FILES["img3"]["name"]);
			move_uploaded_file($_FILES["img4"]["tmp_name"],"img/adsImages/".$_FILES["img4"]["name"]);
			move_uploaded_file($_FILES["img5"]["tmp_name"],"img/adsImages/".$_FILES["img5"]["name"]); */

			/* $sql="INSERT INTO ads(userId,title,category,companyName,payPalBusinessAccount,contactNo,description,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5)
			 VALUES(:userId,:title,:category,:companyName,:payPalBusinessAccount,:contactNo,:description,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5)"; */
			/*  $sql =
              "update tblusers
              set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country
              where EmailId=:email"; */
			/* $sql =
			"update ads
			 set
			 title=:title
			 where id=:id"; */
			$sql =
			"update ads
			 set
			 title=:title,
			 category=:category,
			 companyName=:companyName,
			 payPalBusinessAccount=:payPalBusinessAccount,
			 contactNo=:contactNo,
			 description=:description
			 where id=:id";
			 /* Vimage1=:Vimage1,
			 Vimage2=:Vimage2,
			 Vimage3=:Vimage3,
			 Vimage4=:Vimage4,
			 Vimage5=:Vimage5 */
			$query = $dbh->prepare($sql);
			// $query->bindParam(':userId',$userId,PDO::PARAM_STR);
			$query->bindParam(':title',$title,PDO::PARAM_STR);
			$query->bindParam(':category',$category,PDO::PARAM_STR);
			$query->bindParam(':companyName',$companyName,PDO::PARAM_STR);
			$query->bindParam(':payPalBusinessAccount',$payPalBusinessAccount,PDO::PARAM_STR);
			$query->bindParam(':contactNo',$contactNo,PDO::PARAM_STR);
			$query->bindParam(':description',$description,PDO::PARAM_STR);
			$query->bindParam(':id',$id,PDO::PARAM_STR);
			/* $query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
			$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
			$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
			$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
			$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR); */
			$query->execute();
			
			// $msg="Profile Updated Successfully".$sql.$name.$mobileno.$dob;
			$count = $query->execute();
			if($count !== 0){
// $msg = "Ads Updated Successfully".$sql.$title.$id.$category;
				$msg = "Ads Updated Successfully";
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
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		.succWrap{
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
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
	<div class="ts-main-content" style="padding-top: 90px; padding-bottom: 90px"> 
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
							<div class="page-title text-center">
								<h2 class="">Post Ads</h2>
							</div>
<?php $userId = $id; ?>
							<!-- form 1( basic info ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>

											<!-- notification( htmlentities ) -->
											<?php 
												if($error){
													?>
													<div class="errorWrap">
														<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
													</div>
													<?php 
												} 
												if($msg){
													?>
													<div class="succWrap">
														<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
													</div>
													<?php
												}	
											?>

<div class="panel-body">
												<?php
													$id = intval($_GET['id']);
													$sql = "SELECT * 
														from ads 
														where id=:id AND delmode=0
														LIMIT 1";
													$query = $dbh->prepare($sql);
													$query->bindParam(':id', $id, PDO::PARAM_STR);
													// $query->bindParam(':userId', $id, PDO::PARAM_STR);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {
															/* $_SESSION['brndid'] = $result->bid;
															$providerID = $result->user_id; */
												?>
													<!-- form start -->
													<form method="post" class="form-horizontal" enctype="multipart/form-data">
														<!-- row 1 -->
														<div class="form-group">
															<label class="col-sm-2 control-label">Title<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="userId" id="userId" class="form-control" required value="<?= $userId ?>">
																<input type="text" name="title" id="title" class="form-control" value="<?php echo htmlentities($result->title);?>" required>
															</div>

															<label class="col-sm-2 control-label">Category<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select name="category" id="category" class="form-control" required>
																	<?php 
																		$sql = "SELECT * FROM category WHERE delmode=0 ORDER BY name ASC";
																		$query = $dbh -> prepare($sql);
																		$query->execute();
																		$results=$query->fetchAll(PDO::FETCH_OBJ);
																		if($query->rowCount() > 0){
																			foreach($results as $result){
																	?>									
																		<option value="<?=$result->id;?>"><?=$result->name;?></option>
																	<?php }} ?>
																</select>
															</div>
														</div>

												<?php
														}}
													$id = intval($_GET['id']);
													$sql = "SELECT * 
														from ads 
														where id=:id AND delmode=0
														LIMIT 1";
													$query = $dbh->prepare($sql);
													$query->bindParam(':id', $id, PDO::PARAM_STR);
													// $query->bindParam(':userId', $id, PDO::PARAM_STR);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {
															/* $_SESSION['brndid'] = $result->bid;
															$providerID = $result->user_id; */
												?>

														<!-- row 2 -->
														<div class="form-group">
															<label class="col-sm-2 control-label">Company Name<span style="color:red">*</span></label>
															<div class="col-sm-2">
																<input name="companyName" id="companyName" class="form-control" value="<?php echo htmlentities($result->companyName);?>" required>
															</div>

															<label class="col-sm-2 control-label">Pay Pal Business Account<span style="color:red">*</span></label>
															<div class="col-sm-2">
																<input type="email" name="payPalBusinessAccount" id="payPalBusinessAccount" class="form-control" value="<?php echo htmlentities($result->payPalBusinessAccount);?>" required>
															</div>

															<label class="col-sm-2 control-label">Contact Nombor<span style="color:red">*</span></label>
															<div class="col-sm-2">
																<input type="number" name="contactNo" id="contactNo" class="form-control" value="<?php echo htmlentities($result->contactNo);?>" required>
															</div>
														</div>

														<!-- row 3 -->
														<div class="form-group">
															<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
															<div class="col-sm-10">
																<textarea class="form-control" name="description" id="description" rows="3" required><?php echo htmlentities($result->description);?></textarea>
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
														<!-- row 2( upload image ) -->
														<div class="form-group">
															<div class="col-sm-4">
																Image 1
																<span style="color:red">*</span>
																<input type="file" name="img1">
															</div>
															<div class="col-sm-4">
																Image 2
																<input type="file" name="img2">
															</div>
															<div class="col-sm-4">
																Image 3
																<input type="file" name="img3">
															</div>
														</div>
														<!-- row 3( upload image ) -->
														<div class="form-group">
															<div class="col-sm-4">
																Image 4
																<input type="file" name="img4">
															</div>
															<div class="col-sm-4">
																Image 5
																<input type="file" name="img5">
															</div>
														</div>

														<div class="hr-dashed"></div>

														<!-- Cancel & Save btn -->
														<div class="form-group text-center">
															<div class="col-sm-8 col-sm-offset-2">
																<button class="btn btn-default" type="reset">Cancel</button>
																<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
															</div>
														</div>
													
													</form>
													<!-- form end -->
												<?php }} ?>
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
</html>

<?php } ?>