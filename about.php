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

					<img src="images/logo2.jpeg" alt="computerfever logo" class="hidden-xs" >
					<img src="images/logo-small.png" alt="computerfever logo" class="visible-xs" >

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

						<li class="active"><a href="about.php"> About Us </a></li>

					</ul><!-- nav navbar-nav navbar-left Ends -->

				</div><!-- padding-nav Ends -->

				<a class="btn btn-primary navbar-btn right" href="cart.php"><!-- btn btn-primary navbar-btn right Starts -->

					<i class="fa fa-shopping-cart"></i>

					<span>
						<?php 
							include("includes/DatabaseClass.php");
							$dbObj = new DatabaseClass(); 
							$dbObj -> totalItems(); 
						?>  
						item(s) in cart </span>

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

	<div class="container">
	
		<h1 style="color:#11ad8d" class="my-4">Our Motto 
			<small>- Let Your Fashion be in light!!!</small>
		</h1>
		
		<p>The Online Clothing Store, designed exclusively for women to shop the items of latest trends and fashion. You don't have to spend much time shopping in person, it’s more like just a one-click away or one-swipe away for the item needed. We value customer service and customer satisfaction utmost.</p>	
		
		<div class="row">
		
			<div class="col-lg-12">
			  <h2 style="color:#11ad8d" class="my-4">Our Team</h2>
			</div>
			
			<div class="col-lg-4 col-sm-6 text-center mb-4">
			  <img src="images/about_images/pravu.png" width="304" height="236" class="img-circle"alt="Pravalika Nomula">
			  <h3 style="color:#11ad8d">Pravalika Nomula</h3>
			  <p>Worked collectively on Home Page<br>Worked with Nandini on details page for displaying product specific details.<br>Worked with Nandini on sidebar page for displaying categories.<br>Implemented the Cart functionality</p>
			</div>
			
			<div class="col-lg-4 col-sm-6 text-center mb-4" id="about">
			  <img src="images/about_images/nandu.png" width="304" height="236" class="img-circle"alt="Nandini Bodapati">
			  <h3 style="color:#11ad8d">Nandini Bodapati</h3>
			  <p>
				Worked collectively on Home Page<br>Worked with Pravalika on details page for displaying product specific details.<br>Worked with Pravalika on sidebar page for displaying categories.<br>Implemented the Shop functionality.
			 </p>
			</div>
			
			<div class="col-lg-4 col-sm-6 text-center mb-4">
			  <img src="images/about_images/shailu.png" width="304" height="236" class="img-circle"alt="Shailaja Varri">
			  <h3 style="color:#11ad8d">Shailaja Varri</h3>
			  <p>
				Worked collectively on Home Page.<br>Worked on search functionality to display user query results.<br>Worked on designing about page and footer for the website.
			  </p>
			</div>
			
		</div><!-- end row -->

	</div> <!-- end  container -->
	
	
	<?php
		include('includes/footer.php');
	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>

</body>
</html>