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
		if(isset($_REQUEST['del'])){
			$delid=intval($_GET['del']);
			$sql = "UPDATE items SET delmode=1 WHERE id=:delid";
			$query = $dbh->prepare($sql);
			$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
			$query -> execute();
			$msg="Item record deleted successfully";
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
	
	<title>SWAP.ME</title>

	
	<!-- SWAPJE CSS + Google Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/swapje/index.css">
	<link rel="stylesheet" href="css/nav/nav.css">
	
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

	<!-- Body -->
	<div class="ts-main-content section-padding">
		<!-- <div class="content-wrapper"> -->
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Manage Items</h2>

						<!-- Zero Configuration Table -->
						<!-- <div class="panel panel-default"> -->
						<div class="row">
							<div class="panel-heading">Item Details</div>
							
							<div class="panel-body">
								<!-- notification( htmlentities )/notify( success/fail ) -->
									<!--status-->
									<?php include 'componentFunction/status.php'; ?>
									<!--/status-->

								<!-- table -->
								<table id="zctb" class="text-center display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<!-- table header -->
									<thead>
										<tr>
											<th>#</th>
											<th>Product</th>
											<!-- <th>Image</th> -->
											<th>Used Years</th>
											<th>Overview</th>
											<!-- <th>SELL - Total Price(RM)</th>
											<th>RENT - Price/Day(RM)</th>
											<th>SWAP - Value</th> -->
											<th>Total Price(RM)</th>
											<th>Price/Day(RM)</th>
											<th>Value</th>
											<th>PayPal Business Account</th>
											<th>Contact Nombor</th>
											<!-- <td>Updation Date</td> -->
											<th>Action</th>
										</tr>
									</thead>

									<!-- table footer -->
									<tfoot>
										<tr>
											<th>#</th>
											<th>Product</th>
											<!-- <th>Image</th> -->
											<th>Used Years</th>
											<th>Overview</th>
											<th>Total Price(RM)</th>
											<th>Price/Day(RM)</th>
											<th>Value</th>
											<th>PayPal Business Account</th>
											<th>Contact Nombor</th>
											<!-- <td>Updation Date</td> -->
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<!-- table body -->
										<!-- get data from( tblvehiclestbl, brands ) -->
									<?php 
										/* $sql = 
											"SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id 
											from tblvehicles 
											join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand"; */
										$sql = "SELECT * FROM items WHERE delmode=0 ORDER BY updationDate DESC";
										
										// echo $id;

										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										
										if($query->rowCount() > 0){
											foreach($results as $result){
									?>
										<!-- html -->
									<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<!-- <td><?php echo htmlentities($result->productName);?></td> -->
										<!-- <td><?php echo htmlentities($result->Vimage1);?></td> -->
										<td>
											<?php echo htmlentities($result->productName);?>

											<?php $images = explode(', ', $result->images); ?>
											<img src="img/itemImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image">
										</td>
										<td><?php echo htmlentities($result->usedYear);?></td>
										<td><?php echo htmlentities(substr($result->overview, 0,70));?></td>
										<td><?php echo htmlentities($result->totalPrice);?></td>
										<td><?php echo htmlentities($result->pricePerDay);?></td>
										<td><?php echo htmlentities($result->value);?></td>
										<td><?php echo htmlentities($result->payPalBusinessAccount);?></td>
										<td><?php echo htmlentities($result->contactNo);?></td>
										<!-- <td><?php echo htmlentities($result->updationDate);?></td> -->
										<td>
											<a href="edit-item.php?id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
											<a href="manage-item.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
										</td>
									</tr>

										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>						
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<!--  -->
	<!--  -->
	
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
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

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