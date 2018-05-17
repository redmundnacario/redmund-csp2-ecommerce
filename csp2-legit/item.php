<?php

session_start();


function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

include 'partials/head.php';

require 'connect.php';

// load functions php
require_once 'myfunctions.php';

// load needed tables
//$items = load_db_single_table("items", $conn);

// convert table to array
$items_array = convert_sql_out_to_array(load_db_single_table("items", $conn));

//$fk_values = array_fill_keys( array("discount_id" , "product_collection_id", "product_category_id", "brand_id" , "size_id"), '');
$discount_value_percent = convert_sql_out_to_array(load_db_single_table("product_discounts", $conn), "discount_value_percent");
$product_category_name = convert_sql_out_to_array(load_db_single_table("product_categories", $conn), "product_category_name");
$product_collection_name = convert_sql_out_to_array(load_db_single_table("product_collections", $conn), "product_collection_name");
$brand_name = convert_sql_out_to_array(load_db_single_table("brands", $conn), "brand_name" );
$product_size_name = convert_sql_out_to_array(load_db_single_table("product_sizes", $conn), "product_size_name");


// $items = load_db_single_table("items", $conn);
// $specific_column_name = null;

// while ($item = mysqli_fetch_assoc($items)){
// 	//var_dump($item);
// 	//var_dump($item["id"]);

// 	extract($item);

// 	if ($specific_column_name != null) {
// 		$array_out[] = $item[$specific_column_name];
// 	} else {
// 		$array_out[$id] = $item;
// 		var_dump($array_out);
// 		exit;
// 	}
// 	}


mysqli_close($conn);


?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	
	<!-- <h1>Item Page</h1> -->

	<?php
		$item_id = $_GET['id'];
		extract($items_array[$item_id]);
	?>

	<main class="wrapper row">
		<div class="item-individual-image container-fluid col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="item-individual-image-image container-fluid" style= "<?php echo "background-image : url('". $image ."')"; ?>">
			</div>
		</div>

		<table class="item-table container-fluid col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<tbody class="item-table-item">
				<tr>
					<!-- <td>Product Name</td> -->
					<td><h1><?php echo $product_name; ?></h1></td>
				</tr>
				<tr>
					<!-- <td>Category</td> -->
					<td><?php 

					//echo $id;
					//echo "<br>";
					echo "Brand: ". $brand_name[$brand_id]; //. " " . $id;

					if ($product_collection_name[$product_collection_id] != "NONE") {
						echo "<br>";
						echo "Collection: " . $product_collection_name[$product_collection_id];
					}
					if ($product_collection_name[$product_collection_id]!= "NONE") {
						echo "<br>";
						echo "Category: " . $product_category_name[$product_category_id];
					}

					?></td>
				</tr>
				<tr>
					<!-- <td>Price</td> -->
					<td><strong><span>&#8369</span> <?php echo $price; ?></strong></td>
				</tr>
	
					<?php
					if ($description != "NONE"){
						echo '
						<tr>
							<td>Description</td>
							<td>'. $description .'</td>
						</tr>';
					}

					?>
			</tbody>
		</table>

		<div class="item-table container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- <div class="row col-lg-12"> -->
				<?php 

				if ((isset($_SESSION['current_user'])) && ($_SESSION['current_user'] == 'admin')) {
					
					echo '
					<div class="container-fluid cart-button-check">

						<a href="catalog.php" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Go Back </a>

						<a href="" id="editItem" class="btn btn-info" data-toggle="modal" data-target="#editItemModal" data-index="' . $id . '">Edit<i class="glyphicon glyphicon-chevron-edit"></i></a>

						<a href="" id="deleteItem" class="btn btn-danger" data-toggle="modal" data-target="#deleteItemModal" data-index="' . $id . '">Delete<i class="glyphicon glyphicon-chevron-edit"></i></a>
					</div>';
				} else {
					echo '
					<div class="container-fluid cart-button-check">
						<a href="catalog.php" class="btn btn-warning cart-button"><i class="glyphicon glyphicon-chevron-left"></i> Continue Shopping</a>
					
						<a class="btn btn-primary cart-button" id="btnAddCart'. $id .'" onclick="addToCart('. $id .')">Add to Cart<i class="glyphicon glyphicon-chevron-right"></i></a>

					</div>';
				}

				 ?>
			<!-- </div> -->
		</div>

	</main>

		<!-- Edit Modal item-->
	<div id="editItemModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/update_item.php" enctype="multipart/form-data">

			      		<input hidden type="" name="itemId" value="<?php echo $id ?>" >

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Item Details</h4>
						</div>

				      	<div class="modal-body" id='editItemModalBody'>
				        <!-- <p id="out">Some text in the modal.</p> -->
				      	</div>


				      	<div class="modal-footer">

				      		<button type="submit" class="btn btn-default">Save</button>

				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      
				      	</div>
			     </form>
			    </div>
		</div>
	</div>

	<!-- Delete modal -->
	<div id="deleteItemModal" class="modal fade" role="dialog">
	 	<div class="modal-dialog">

		    <!-- Modal content-->
		    <form method="POST" action="assets/del_item_catalog.php">
		    	
			    <div class="modal-content">
			      <input hidden type="" name="itemId" value="<?php echo $id ?>" >
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Delete Item</h4>
			      </div>

			      <div class="modal-body" id='deleteItemModalBody'>
			        <!-- <p id="out">Some text in the modal.</p> -->
			        <p>Are you sure to delete item?</p>
			      </div>

			      <div class="modal-footer">

			      	<button type="submit" class="btn btn-default">Yes</button>

			        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			      
			      </div>
			    </div>

			</form>
		</div>
	</div>
	

	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#editItem").click(function(){
			var itemId = $(this).data('index');

			$.get("assets/edit_item.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editItemModalBody').html(data);
			});
		});
	});
</script>

</body>
</html>