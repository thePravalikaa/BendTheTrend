<?php
	 $dbObj = new DatabaseClass(); 
?>

<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

	<div class="panel-heading"><!-- panel-heading Starts -->

		<h3 class="panel-title"> Product Categories </h3>

	</div><!-- panel-heading Ends -->

	<div class="panel-body"><!-- panel-body Starts -->

		<ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Starts -->

			<?php $dbObj ->getProductCategories(); ?>

		</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

	</div><!-- panel-body Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->



<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

	<div class="panel-heading"><!-- panel-heading Starts -->

		<h3 class="panel-title">Categories </h3>

	</div><!-- panel-heading Ends -->

	<div class="panel-body"><!-- panel-body Starts -->

		<ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Starts -->

			<?php $dbObj ->getCategories(); ?>

		</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

	</div><!-- panel-body Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->