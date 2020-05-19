<?php
	$dbObj = new DatabaseClass();
	$con = $dbObj->connect();
?>

<div id="footer"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->

        <div class="row" ><!-- row Starts -->

            <div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Starts -->

                <h4>Pages</h4>

                <ul><!-- ul Starts -->

                    <li><a href="cart.php">Shopping Cart</a></li>

                    <li><a href="shop.php">Shop</a></li>
					
					<li><a href="about.php">About Us</a></li>

                </ul><!-- ul Ends -->

                <hr>

                <hr class="hidden-md hidden-lg hidden-sm" >

            </div><!-- col-md-3 col-sm-6 Ends -->

            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                <h4> Top Products Categories </h4>

                <ul><!-- ul Starts -->

                    <?php

						$get_p_cats = "select * from product_categories";

						$run_p_cats = mysqli_query($con,$get_p_cats);

						while($row_p_cats = mysqli_fetch_array($run_p_cats)){

							$p_cat_id = $row_p_cats['p_cat_id'];

							$p_cat_title = $row_p_cats['p_cat_title'];

							echo "<li> <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";

						}//end while

                    ?>

                </ul><!-- ul Ends -->

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->


            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                <h4>Where to find us</h4>

                <p class="text-muted"><!-- p Starts -->
                    <strong>Bend The Trend Ltd.</strong>
                    <br>Warrensburg
                    <br>Missouri - 64093.
                    <br>203-456-1125
                    <br>btt.customerService@gmail.com
                 </p><!-- p Ends -->

                <a href="about.php">Go to About us page</a>

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->

            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                <h4>Get the news</h4>

                <p class="text-muted">Want to get updated with the latest fashions and trends??.</p>
					
					<form action="subscribe.php" method="post">
						<input type="email" name="email" id="email" required placeholder="Enter your email address ">
						<input value="Subscribe" type="submit">
					</form>
				
				</p>
				

                <hr>

                <h4> Stay in touch </h4>

                <p class="social"><!-- social Starts --->

                    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                    <a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a>
                    
				</p><!-- social Ends --->

            </div><!-- col-md-3 col-sm-6 Ends -->

        </div><!-- row Ends -->

    </div><!-- container Ends -->
</div><!-- footer Ends -->

<div id="copyright"><!-- copyright Starts -->

    <div class="container" ><!-- container Starts -->

        <div class="col-md-6" ><!-- col-md-6 Starts -->

            <p class="pull-left"> &copy; 2018 Bend The Trend Ltd. All Rights Reserved.</p>

        </div><!-- col-md-6 Ends -->
    </div><!-- container Ends -->

</div><!-- copyright Ends -->







