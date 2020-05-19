<?php

	include("includes/DatabaseClass.php");
	
	$dbObj = new DatabaseClass(); 
	
	$con = $dbObj -> connect();
?>


<!DOCTYPE html>
<html>

<head>
	<title>Bend The Trend </title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

	<link href="styles/bootstrap.min.css" rel="stylesheet">

	<link href="styles/style.css" rel="stylesheet">

	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

	<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="navbar-header"><!-- navbar-header Starts -->

				<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Starts -->

					<img src="images/logo2.jpeg" alt="btt logo" class="hidden-xs" >
					<img src="images/logo-small.png" alt="btt logo" class="visible-xs" >

				</a><!--- navbar navbar-brand home Ends -->

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

					<span class="sr-only" >Toggle Navigation </span>

					<i class="fa fa-align-justify"></i>

				</button>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

					<span class="sr-only" >Toggle Search</span>

					<i class="fa fa-search" ></i>

				</button>


			</div><!-- navbar-header Ends -->

			<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Starts -->

				<div class="padding-nav" ><!-- padding-nav Starts -->

					<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Starts -->

						<li><a href="index.php"> Home </a></li>

						<li class="active"><a href="shop.php"> Shop </a></li>

						<li><a href="cart.php"> Shopping Cart </a></li>

						<li><a href="about.php"> About Us </a></li>

					</ul><!-- nav navbar-nav navbar-left Ends -->

				</div><!-- padding-nav Ends -->

				<a class="btn btn-primary navbar-btn right" href="cart.php"><!-- btn btn-primary navbar-btn right Starts -->

					<i class="fa fa-shopping-cart"></i>

					<span><?php $dbObj -> totalItems(); ?>  item(s) in cart </span>

				</a><!-- btn btn-primary navbar-btn right Ends -->

				<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->

					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">

						<span class="sr-only">Toggle Search</span>

						<i class="fa fa-search"></i>

					</button>

				</div><!-- navbar-collapse collapse right Ends -->

				<div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->

					<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->

						<div class="input-group"><!-- input-group Starts -->

							<input class="form-control" type="text" placeholder="Search" name="user_query" required>

							<span class="input-group-btn"><!-- input-group-btn Starts -->

								<button type="submit" value="Search" name="search" class="btn btn-primary">

									<i class="fa fa-search"></i>

								</button>

							</span><!-- input-group-btn Ends -->

						</div><!-- input-group Ends -->

					</form><!-- navbar-form Ends -->

				</div><!-- collapse clearfix Ends -->

			</div><!-- navbar-collapse collapse Ends -->

		</div><!-- container Ends -->
	</div><!-- navbar navbar-default Ends -->

	<div id="content" ><!-- content Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="col-md-12" ><!--- col-md-12 Starts -->

				<ul class="breadcrumb" ><!-- breadcrumb Starts -->

					<li>
					<a href="index.php">Home</a>
					</li>

					<li>Shop</li>

				</ul><!-- breadcrumb Ends -->

			</div><!--- col-md-12 Ends -->

			<div class="col-md-3"><!-- col-md-3 Starts -->

				<?php include("includes/sidebar.php"); ?>

			</div><!-- col-md-3 Ends -->

			<div class="col-md-9" ><!-- col-md-9 Starts --->

				<!-- If selection is not made by the user explicitly -->
				<?php
					
					if(!isset($_GET['p_cat'])){ // These variables comes from DatabaseClass.php (shop.php?p_cat, shop.php?cat)

						if(!isset($_GET['cat'])){

							echo "

							<div class='box'>

								<h1>Shop</h1>

								<p>Shop according to your style</p>

							</div>

							";

						}//end if-inner

					}//end if-outer

				?>

				<div class="row" ><!-- row Starts -->
					<?php
						if(!isset($_GET['p_cat'])){ 

							if(!isset($_GET['cat'])){
								
								//$per_page=3; // display 3 items per page
								
								// For the initial display - to select from pagination numbering
								/* if(isset($_GET['page'])){

									$page = $_GET['page'];

								}else {

									$page=1;
								}//end if-else */
								
								//$start_from = ($page-1) * $per_page ; // 0,3,6,..
								
								$get_products = "select * from products order by rand() LIMIT 0,3";
								
								$run_products = mysqli_query($con,$get_products);
								
								while($row_products=mysqli_fetch_array($run_products)){
									
									$pro_id = $row_products['product_id'];

									$pro_title = $row_products['product_title'];

									$pro_price = $row_products['product_price'];

									$pro_img1 = $row_products['product_img1'];
									
									echo "

									<div class='col-md-4 col-sm-6 center-responsive' >

										<div class='product' >
											<a href='details.php?pro_id=$pro_id' >

												<img src='images/product_images/$pro_img1' class='img-responsive' >

											</a>
											<div class='text'>
												<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

												<p class='price' >$$pro_price</p>

													<p class='buttons' >

													<a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>

													<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>

														<i class='fa fa-shopping-cart'></i> Add To Cart

													</a>

												</p>
											</div>
										</div>
									</div>
									";
									
								}//end while
							}
						}
								
					?>
					
				</div><!-- row Ends -->
				
				
				
				<?php
				
					// If selection is made from the sidebar, get specific displays on the right side.
					
					$dbObj ->get_Product_Category_Specific_Displays();
					$dbObj ->get_Category_Specific_Displays();

				?>

			</div><!-- col-md-9 Ends --->


		</div><!-- container Ends -->
	</div><!-- content Ends -->



	<?php

		include("includes/footer.php");

	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>

</body>
</html>