<?php
	
	class DatabaseClass{
		
		protected static $connection;
	
		// Basic Functions 
		
		public function connect(){
			
			if(!isset(self::$connection)){ //if connection is not set
				include("includes/dbConfig.php");
				self::$connection = new mysqli($host,$username,$password,$dbname);
			}//end if - try and connect to the db
			
			if(self::$connection === false){
				return false;
			}//end if - connection fails
			
			return self::$connection;
			
		}//end connect function
	
		
		// Query functions
		
		public function totalItems(){
			$connection = $this -> connect();

			$get_items = "select * from cart";

			$run_items = mysqli_query($connection,$get_items);

			$count_items = mysqli_num_rows($run_items); //returns the number of records (based on IP address)

			echo $count_items;
		}//end function
	
		public function getProducts(){
			
			$connection = $this -> connect();

			$get_products = "select * from products ORDER BY RAND() LIMIT 0,6"; //randomly displaying 6 items

			$run_products = mysqli_query($connection,$get_products);

			while($row_products=mysqli_fetch_array($run_products)){

				$pro_id = $row_products['product_id'];

				$pro_title = $row_products['product_title'];

				$pro_price = $row_products['product_price'];

				$pro_img1 = $row_products['product_img1'];

				echo "

				<div class='col-md-4 col-sm-6 single' >

					<div class='product' >

						<a href='details.php?pro_id=$pro_id' >

							<img src='images/product_images/$pro_img1' class='img-responsive' >

						</a>

						<div class='text' >

							<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

							<p class='price' >$$pro_price</p>

							<p class='buttons' >

								<a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>

								<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>

									<i class='fa fa-shopping-cart'></i> Add to cart

								</a>
							</p>

						</div>


					</div>

				</div>

				";

			}//end while

		}//end function

		// For details.php
		public function addToCart(){
			
			$connection = $this -> connect();

			if(isset($_GET['add_cart'])){

				$p_id = $_GET['add_cart'];
				
				// get the quantity and size from the user input
				$product_qty = $_POST['product_qty'];

				$product_size = $_POST['product_size'];


				$check_product = "select * from cart where p_id='$p_id' AND qty='$product_qty'";

				$run_check = mysqli_query($connection,$check_product);

				// check if that particular product - is already added before or not
				if(mysqli_num_rows($run_check)>0){

					echo "<script>alert('This Product is already added in cart')</script>";

					echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

				}
				//if the product is not present, add it(insert) to the cart
				else {

					$query = "insert into cart (p_id,qty,size) values ('$p_id','$product_qty','$product_size')";

					$run_query = mysqli_query($connection,$query);

					echo "<script>alert('The Product that you have selected is added to the cart')</script>";
					echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

				}//end if-else

			}//end if

			
		}//end function

		
		// For shop.php
		
		public function get_Product_Category_Specific_Displays(){ //when selected from sidebar

			$connection = $this -> connect();

			if(isset($_GET['p_cat'])){

				$p_cat_id = $_GET['p_cat'];

				$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

				$run_p_cat = mysqli_query($connection,$get_p_cat);

				$row_p_cat = mysqli_fetch_array($run_p_cat);

				$p_cat_title = $row_p_cat['p_cat_title'];

				$p_cat_desc = $row_p_cat['p_cat_desc'];

				$get_products = "select * from products where p_cat_id='$p_cat_id' order by rand() LIMIT 0,3";

				$run_products = mysqli_query($connection,$get_products);

				$count = mysqli_num_rows($run_products);

				if($count==0){

					echo "

					<div class='box'>

						<h1> No Product Found In This Product Category. We will consider your request and order them soon. Thank you for your patience. </h1>

					</div>

					";

				}else{

					echo "

					<div class='box'>

						<h1>$p_cat_title</h1>

						<p>$p_cat_desc</p>

					</div>

					";

				}//end if-else
		

				while($row_products = mysqli_fetch_array($run_products)){

					$pro_id = $row_products['product_id'];

					$pro_title = $row_products['product_title'];

					$pro_price = $row_products['product_price'];

					$pro_img1 = $row_products['product_img1'];

					echo "

					<div class='col-md-4 col-sm-6 center-responsive'>

						<div class='product'>

							<a href='details.php?pro_id=$pro_id'>

								<img src='images/product_images/$pro_img1' class='img-responsive'>

							</a>

							<div class='text'>

								<h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>

								<p class='price'>$$pro_price</p>
								
								<p class='buttons'>

									<a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>

									<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>

										<i class='fa fa-shopping-cart'></i> Add to cart

									</a>
								</p>

							</div>
						</div>
					</div>

					";
				}//end while

			}//end if-outer

		}//end function
	
	
		public function get_Category_Specific_Displays(){

			$connection = $this -> connect();

			if(isset($_GET['cat'])){

				$cat_id = $_GET['cat'];

				$get_cat = "select * from categories where cat_id='$cat_id'";

				$run_cat = mysqli_query($connection,$get_cat);

				$row_cat = mysqli_fetch_array($run_cat);

				$cat_title = $row_cat['cat_title'];

				$cat_desc = $row_cat['cat_desc'];

				$get_products = "select * from products where cat_id='$cat_id' order by rand() LIMIT 0,3 ";

				$run_products = mysqli_query($connection,$get_products);

				$count = mysqli_num_rows($run_products);

				if($count==0){

					echo "

					<div class='box' >

						<h1> No Product Found In This Category </h1>

					</div>


					";


				}
				else{

					echo "

						<div class='box' >

							<h1> $cat_title </h1>

							<p>$cat_desc</p>

						</div>


					";


				}//end if-else

				while($row_products=mysqli_fetch_array($run_products)){

					$pro_id = $row_products['product_id'];

					$pro_title = $row_products['product_title'];

					$pro_price = $row_products['product_price'];

					$pro_desc = $row_products['product_desc'];

					$pro_img1 = $row_products['product_img1'];

					echo "

					<div class='col-md-4 col-sm-6 center-responsive' >

						<div class='product' >

							<a href='details.php?pro_id=$pro_id' >

								<img src='images/product_images/$pro_img1' class='img-responsive' >

							</a>

							<div class='text' >

								<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

								<p class='price' >$$pro_price</p>

								<p class='buttons' >

									<a href='details.php?pro_id=$pro_id' class='btn btn-default' >View Details</a>

									<a href='details.php?pro_id=$pro_id' class='btn btn-primary' >

										<i class='fa fa-shopping-cart' ></i> Add To Cart

									</a>


								</p>


							</div>

						</div>

					</div>

					";


				}//end while


			}//end if-outer


		}//end function

		// For the sidebar.php
	
		public function getProductCategories(){
		
			$connection = $this -> connect();

			$get_p_cats = "select * from product_categories";

			$run_p_cats = mysqli_query($connection,$get_p_cats);

			while($row_p_cats = mysqli_fetch_array($run_p_cats)){

				$p_cat_id = $row_p_cats['p_cat_id'];

				$p_cat_title = $row_p_cats['p_cat_title'];

				echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";

			}//end while
		}//end function

		public function getCategories(){
		
			$connection = $this -> connect();

			$get_cats = "select * from categories";

			$run_cats = mysqli_query($connection,$get_cats);

			while($row_cats = mysqli_fetch_array($run_cats)){

				$cat_id = $row_cats['cat_id'];

				$cat_title = $row_cats['cat_title'];

				echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";

			}//end while
		}//end function
	
	
	}//end class
	
	
?>