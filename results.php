<?php

	include("includes/DatabaseClass.php");
	
	$dbObj = new DatabaseClass();
	
	$con = $dbObj->connect();
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

						<li><a href="shop.php"> Shop </a></li>

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

					<li><a href="index.php">Home</a></li>

					<li>Search Results</li>

				</ul><!-- breadcrumb Ends -->
				
			</div><!--- col-md-12 Ends -->
			
			<!-- Searching based on product keywords -  and not based on categories -->
			
			<div class="col-md-12" ><!-- col-md-12 Starts --->

				<div class="row" id="Products" ><!-- row Starts -->

					<?php

						if(isset($_GET['search'])){

							$user_keyword = $_GET['user_query'];

							$get_products = "select * from products where product_keywords like '%$user_keyword%'";

							$run_products = mysqli_query($con,$get_products);

							$count = mysqli_num_rows($run_products);

							if($count==0){

								echo "

								<div class='box'>

									<h2>No Search Results Found</h2>

								</div>

								";

							}else{

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

							}//end if-else

						}//end if
					?>

				</div><!-- row Ends -->

			</div><!-- col-md-12 Ends --->

		</div><!-- container Ends -->

	</div><!-- content Ends -->
	
	<?php

		include("includes/footer.php");

	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>