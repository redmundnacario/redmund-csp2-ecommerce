<?php
require 'connect.php';
// load functions php
require_once 'myfunctions.php';

$brands1 = load_db_single_table("brands", $conn);
$collections1 = load_db_single_table("product_collections", $conn);
$categories1 = load_db_single_table("product_categories", $conn);

mysqli_close($conn);
?>


<div class="brand-head">
	<a href="home.php"><h1 class="brand-head-text">Honeyken</h1></a>
</div>

<div class="topnavb">
	<div class="top">
		<!-- <a href="home.php">Home</a> -->
		<a href="catalog.php">Catalog</a>	

		<a href="cart.php">Cart<?php

		    if (isset($_SESSION['item_count']) && ($_SESSION['item_count'] > 0) ) {
		      echo '
		        <span class="badge"> '.$_SESSION['item_count'].' </span>
		      ';
		    }

		?></a>

		<div class="dropdown_opt">
			<button class="dropbtn"><span><?php 
				if (isset($_SESSION["current_user"])) {
					echo $_SESSION["current_user"];
				} else {
					echo "Account ";
				}
			?></span> <span class="caret"></span>
			</button>
			<div class="dropdown-content">
				<?php
					if (isset($_SESSION["current_user"])) {
						echo '<a class="Account" href="profile.php">Profile</a>';
						echo '<a class="Account" href="orders.php">Orders History</a>';
						echo '<a class="Account" href="logout.php" class="logout">Sign out</a>';
					} else {
						echo '<a class="Account" href="register.php">Register</a>';
						echo '<a class="Account" href="login.php">Sign in</a>';
					}
				?>
			</div>
		</div> 
		

		<!-- <a href="javascript:void(0);" class="icon" >&#9776;</a> -->
		

	</div>
	<a href="javascript:void(0);" class="icon" onclick="toggle_nav()">&#9776;</a>

</div>

<div class="main-topnav">
	
	<div class="topnav" id="myTopnav">

		<div class="dropdown_opt">
			<button class="dropbtn"><span>Categories</span> <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<?php
				load_categories_as_list($categories1, "product_category_name","category");
				?>
			</div>
		</div> 

		<div class="dropdown_opt">
			<button class="dropbtn"><span>Brands</span> <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				
				<?php
				load_categories_as_list($brands1, "brand_name", "brand");
				?>
			</div>
		</div> 

		<div class="dropdown_opt">
			<button class="dropbtn"><span>Collections</span> <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<?php
				load_categories_as_list($collections1, "product_collection_name", "collection");
				?>		
			</div>
		</div> 

		
		<!-- <a href="about.php">About</a> -->
		<!-- <a href="contact.php">Contact</a> -->


	</div>
</div>




