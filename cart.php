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

						<li><a href="shop.php"> Shop </a></li>

						<li class="active"><a href="cart.php"> Shopping Cart </a></li>

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

					<li>Cart</li>

				</ul><!-- breadcrumb Ends -->

			</div><!--- col-md-12 Ends -->

			<div class="col-md-9" id="cart" ><!-- col-md-9 Starts -->

				<div class="box" ><!-- box Starts -->

					<form action="cart.php" method="post" enctype="multipart-form-data" ><!-- form Starts -->

						<h1> Shopping Cart </h1>

						<?php

							$select_cart = "select * from cart";
							
							$run_cart = mysqli_query($con,$select_cart);

							$count = mysqli_num_rows($run_cart);

						?>

						<p class="text-muted" > You currently have <?php echo $count; ?> item(s) in your cart. </p>

						<div class="table-responsive" ><!-- table-responsive Starts -->

							<table class="table" ><!-- table Starts -->

								<thead><!-- thead Starts -->

									<tr>

										<th colspan="2" >Product</th>

										<th>Quantity</th>

										<th>Unit Price</th>

										<th>Size</th>

										<th colspan="2"> Sub Total </th>

									</tr>

								</thead><!-- thead Ends -->

								<tbody><!-- tbody Starts -->

									<?php

										$overall_total = 0;

										while($row_cart = mysqli_fetch_array($run_cart)){

											$pro_id = $row_cart['p_id'];

											$pro_size = $row_cart['size'];

											$pro_qty = $row_cart['qty'];

											$get_products = "select * from products where product_id='$pro_id';";

											$run_products = mysqli_query($con,$get_products);
											
											$total = 0;
											
											while($row_products = mysqli_fetch_array($run_products)){

												$product_title = $row_products['product_title'];

												$product_img1 = $row_products['product_img1'];

												$only_price = $row_products['product_price'];

												$sub_total = $row_products['product_price']*$pro_qty;

												$total += $sub_total;

									?>

									<tr><!-- tr Starts -->

										<td>

											<img src="images/product_images/<?php echo $product_img1; ?>" >

										</td>

										<td>

											<a href="#" > <?php echo $product_title; ?> </a>

										</td>

										<td>
											<?php echo $pro_qty; ?>
										</td>

										<td>

											$<?php echo $only_price; ?>.00

										</td>

										<td>

											<?php echo $pro_size; ?>

										</td>

										<td>
											$<?php echo $total; ?>.00
										</td>

									</tr><!-- tr Ends -->

									<?php 	
											$overall_total+=$total;
											}//end while-inner
											
										}//end while-outer 
									?>

								</tbody><!-- tbody Ends -->

							</table><!-- table Ends -->


						</div><!-- table-responsive Ends -->


						<div class="box-footer"><!-- box-footer Starts -->

							<div class="pull-left"><!-- pull-left Starts -->

								<a href="shop.php" class="btn btn-default">

									<i class="fa fa-chevron-left"></i> Continue Shopping

								</a>

							</div><!-- pull-left Ends -->

							<div class="pull-right"><!-- pull-right Starts -->

								
								<button class="btn btn-primary" type="submit"  name="checkout">

										<i class="fa fa-shopping-cart" ></i> Proceed to checkout

								</button>
								
								<?php
								
									//Emptying the cart, after order has been submitted
									
									function checkout_cart(){
										global $con;
										
										$select_cart = "select * from cart ";
							
										$run_cart = mysqli_query($con,$select_cart);

										$count = mysqli_num_rows($run_cart);
										
										if($count > 0){
											global $con;
											
											if(isset($_POST['checkout'])){
												$delete_product = "delete from cart";

												$run_delete = mysqli_query($con,$delete_product);

												if($run_delete){
													echo "<script>window.alert('Your order has been submitted. Thankyou !!!')</script>";
													echo "<script>window.open('cart.php','_self')</script>";

												}//end if
											}//end if- checkout
										}//end if-count

									}//end function update_cart.
									
									checkout_cart();
								?>

							</div><!-- pull-right Ends -->

						</div><!-- box-footer Ends -->

					</form><!-- form Ends -->

				</div><!-- box Ends -->

			</div><!-- col-md-9 Ends -->

			<div class="col-md-3"><!-- col-md-3 Starts -->

				<div class="box" id="order-summary"><!-- box Starts -->

					<div class="box-header"><!-- box-header Starts -->

						<h3>Order Summary</h3>

					</div><!-- box-header Ends -->

					<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

					<div class="table-responsive"><!-- table-responsive Starts -->

						<table class="table"><!-- table Starts -->

							<tbody><!-- tbody Starts -->

								<tr>

									<td> Order Subtotal </td>

									<th> $<?php echo $overall_total; ?>.00 </th>

								</tr>

								<tr>

									<td> Shipping and handling </td>

									<th>$0.00</th>

								</tr>

								<tr>

									<td>Tax</td>

									<th>$0.00</th>

								</tr>

								<tr class="total">

									<td>Total</td>

									<th>$<?php echo $overall_total; ?>.00</th>

								</tr>

							</tbody><!-- tbody Ends -->

						</table><!-- table Ends -->

					</div><!-- table-responsive Ends -->

				</div><!-- box Ends -->

			</div><!-- col-md-3 Ends -->

		</div><!-- container Ends -->
	</div><!-- content Ends -->

	
	
	<?php

		include("includes/footer.php");

	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>

</body>
</html>