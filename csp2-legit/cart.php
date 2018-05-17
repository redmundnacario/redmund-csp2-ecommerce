<?php

session_start();


function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

// load database
require 'connect.php';

// load functions php
require_once 'myfunctions.php';

// load needed tables
$items = load_db_single_table("items", $conn);
// convert table to array
$items_array = convert_sql_out_to_array($items);
//var_export($items_array[0]);


include 'partials/head.php';

mysqli_close($conn);
?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	<main class="wrapper container-fluid">
		<!-- col-lg-8 col-md-10 col-sm-10 col-xs-12 -->
		<div class="panel-cart div-shrink-60 div-center">
			
		
			<div class="panel panel-info ">
				<div class="panel-heading">
					<h1 class="text-center">My Shopping Cart</h1>
				</div>
				<div class="panel-body">
					
				
				<?php
				if ((!isset( $_SESSION['cart'] )) or (empty( $_SESSION['cart']) )) {
					echo '<h1 class="text-center">Your Cart is Empty. <a href="catalog.php"><strong style="color:#58dffc;">Shop now!</strong></a></h1>';
				} else {

					echo '

					<table class="table cart-table">
						<thead class="cart-items-head">
							<tr>
								<th>Item</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
								<th>Options</th>
							<!-- for x button -->
							</tr>
						</thead>
						
						<tbody class="cart-items-body">';
							if ((isset($_SESSION['cart'])) && (!empty($_SESSION['cart']))) {
								$cart_items = $_SESSION['cart'];
								$_SESSION['total_1'] = editCartItems($cart_items, $items_array);
							} else {
								echo '<tr><td class="empty"><h3>Your Cart is Empty. <a href="catalog.php"><strong style="color:#58dffc;">Shop now!</strong></a>
								</h3></td></tr>';
							};
					echo '
						</tbody>
					</table>';

					echo '<h3 class="text-center">Your Total Price : <strong><span>&#8369</span> <span class="totalValue1">';
						 displayTotalCart1(); 
					echo '</span></h3>';


					
					echo'
					<div class="container-fluid cart-button-check">
						<a href="catalog.php" class="btn btn-warning cart-button"><i class="glyphicon glyphicon-chevron-left"></i> Continue Shopping</a>
						<a href="checkout.php" class="btn btn-success cart-button">Proceed to Checkout <i class="glyphicon glyphicon-chevron-right"></i></a>
					</div>';
					};
				?>
				</div>
			</div>

		</div>

	</main>


	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

<script type="text/javascript">
	
	function delItem(itemId){

		var id = itemId;

		// var quantity = $('#'+id).val();
		//console.log(quantity);

		$.post("assets/del_item_cart.php",
			{
				item_id : id,
				// item_quantity : quantity	
			}, 
			function(data, status){
				$('a[href="cart.php"]').html(data);

				$.post("assets/edit_cart_items.php",
					{}, 
					function(data, status){
						// $('.cart-items').html('');
						$('.cart-items-body').html(data);

						$.post('assets/total_cart.php',
							{},
							function(data,status){
								$('.totalValue1').html(data);
							});
					});
			});
		};

	$(document).ready(function(){

		$(".cartQuantity").on('input', function(e){

			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	             // Allow: Ctrl+A, Command+A
	            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
	             // Allow: home, end, left, right, down, up
	            (e.keyCode >= 35 && e.keyCode <= 40)) {
	                 // let it happen, don't do anything
	                 return;
	        }
	        // Ensure that it is a number and stop the keypress
	        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	            e.preventDefault();
	        }
			
			var id = $(this).attr('id');
			var quantity = Number.parseInt($('#'+id).val());
			
			//console.log(quantity);
			//console.log(id);
			// alert(quantity);
			// indicator = Number.isInteger(quantity);
			// alert(indicator);

			if (Number.isInteger(quantity)){

				$.post("assets/edit_quantity_cart_items.php",
					{
						item_id : id,
						item_quantity : quantity
					}, 
					function(data, status){
						// alert(data);

						$('.cartQuantity'+id).html(data);

						$.post("assets/edit_cart_items.php",
							{}, 
							function(data, status){
								// $('.cart-items').html('');
								$('.cart-items').html(data);

								$.post('assets/total_cart.php',
									{},
									function(data,status){
									
										$('.totalValue1').html(data);
									
									});
							});
					});
			}
		});
	});

</script>

</body>
</html>