<?php

require 'assets/class/class.php';
session_start();

if (!isset($_SESSION['current_user'])){
	
	FlashMessage::add("Please register first and set your account details for your transaction with us to be valid.", "danger");
	
	header('location: register.php');

}

function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

include 'partials/head.php';

// load database
require 'connect.php';

// load functions php
require_once 'myfunctions.php';

// load needed tables
// convert table to array
$items_array = convert_sql_out_to_array(load_db_single_table("items", $conn));
$p_types_array = convert_sql_out_to_array(load_db_single_table("packaging_types", $conn));

// $users = convert_sql_out_to_array(load_db_single_table("users", $conn));


// LOAD USER INFO
$row_user_info = load_row_given_unique_value($conn, "users", "username", $_SESSION['current_user'], "*");
$row_user_info = convert_sql_out_to_array_b($row_user_info);

$user_id = $row_user_info[0]["id"];
$user_location_id = $row_user_info[0]["location_id"];
//var_dump($row_user_info[0]["location_id"]);

$p_types_info = load_row_given_unique_value($conn, "packaging_types", "location_id", $user_location_id , "*");

$p_types_info = convert_sql_out_to_array_b($p_types_info);
//var_dump($p_types_info);


$cart_items = $_SESSION['cart'];

mysqli_close($conn);

?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>


	<main class="wrapper container-fluid">

		<form class="container" method="POST" action="assets/postcheckout.php">

			<div class="container col-lg-6">
				<div class="container-fluid panel panel-info">
					<div class="panel-heading">
						<h2> Shipping Details </h2>
					</div>
						<table>
						<tr>
							<td><strong>Delivery Address</strong></td>
							<td><?php echo $row_user_info[0]["delivery_address"] ?></td>
						</tr>
						<tr>
							<td><strong>Shipping Fee</strong></td>
							<td><?php echo $p_types_info[0]["shipping_price"] ?></td>
						</tr>

					</table>
				</div>
			</div>

			<div class="container col-lg-6">
				<div class="container-fluid panel panel-info">
					<div class="panel-heading">
						<h2> Order Summary </h2>
					</div>
					 <table>

					 	<thead>

					 		<th>Product</th>
					 		<th>Price</th>
					 		<th>Quantity</th>
					 		<th>Subtotal</th>

					 	</thead>
					 		<?php
					 		summaryCartItems($cart_items, $items_array)
					 		?>
					 		<!-- Shipping details -->
					 		<tr>
					 			<td><strong>Shipping Fee</strong></td>
						 		<td></td>
						 		<td></td>
						 		<td><?php echo '<span>&#8369</span> '.number_format($p_types_info[0]["shipping_price"],2); ?></td>
					 		</tr>

					 	<tfoot>
					 		<td><strong>Grand Total</strong></td>
					 		<td></td>
					 		<td></td>
					 		<td><?php 
					 			$final_price = $_SESSION["total_1"] + $p_types_info[0]["shipping_price"];
					 			echo '<span>&#8369</span> '.number_format($final_price, 2);
					 			?></td>
					 	</tfoot>

					 </table>
				</div>

			</div>

			
			
			<input hidden type="number" name="final_price" value="<?php echo $final_price; ?>">
			<input hidden type="number" name="delivery_status_id" value="1">
			<input hidden type="number" name="payment_status_id" value="1">
			<input hidden type="number" name="payment_method_id" value="<?php echo $user_location_id; ?>">
			<input hidden type="number" name="user_id" value="<?php echo $user_id ; ?>">
			<input hidden type="number" name="staff_verifier_id" value="1">
			<input hidden type="text" name="payment_proof_id" value="None">

			<div class="container-fluid cart-button-check">

				<a href="cart.php" class="btn btn-warning cart-button"><i class="glyphicon glyphicon-chevron-left"></i>Revisit My Cart</a>
				<!-- <a class="btn btn-success cart-button">Checkout!<i class="glyphicon glyphicon-chevron-right" onclick="postCheckOut()"></i></a> -->

				<button class="btn btn-success cart-button" type="submit" class="btn btn-primary" >Checkout!<i class="glyphicon glyphicon-chevron-right"></i></button>

			</div>

		</form>

	</main>


	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

</body>
</html>