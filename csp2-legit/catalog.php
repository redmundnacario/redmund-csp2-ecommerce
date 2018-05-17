<?php

session_start();


function getTitle(){
	echo 'Catalog';
}

include 'partials/head.php';

// load database 
require 'connect.php';
// load functions php
require_once 'myfunctions.php';
// load tables
$items = load_db_single_table("items", $conn);
$categories = load_db_single_table("product_categories", $conn);
$collections = load_db_single_table("product_collections", $conn);
$brands = load_db_single_table("brands", $conn);

// $sample = array();
// //Check the if the  mysql query was accessed:
// while ($item = mysqli_fetch_assoc($resu2)) {
// 	array_push($sample, $item);
// }


// empty array
$result = array();
// $filters = array
// 	(
// 	array("category", "All Categories", "product_categories", "product_category_name" ),
// 	array("collection", "All Collections", "product_collections", "product_collection_name" ),
// 	array("brand", "All Brands", "brands", "brand_name" )
// 	);
#SELECT * FROM `items` WHERE product_category_id = 1
// check if filter exist
if ((isset($_GET['search'])) || (isset($_GET['category'])) || (isset($_GET['collection'])) || (isset($_GET['brand'])) ) {
	if (isset($_GET['category']) && ($_GET['category'] !==  'All Categories')){
		$sql = 'SELECT id FROM product_categories WHERE product_category_name = "' . $_GET['category'] . '"';
		$resu = mysqli_query($conn, $sql);
		$resu1 = mysqli_fetch_array($resu);

	}

	if (isset($_GET['collection']) && ($_GET['collection'] !==  'All Collections')){
		$sql = 'SELECT id FROM product_collections WHERE product_collection_name = "' . $_GET['collection'] . '"';
		$resu = mysqli_query($conn, $sql);
		$resu2 = mysqli_fetch_array($resu);

	}
	
	if (isset($_GET['brand']) && ($_GET['brand'] !==  'All Brands')){
		$sql = 'SELECT id FROM brands WHERE brand_name = "' . $_GET['brand'] . '"';
		$resu = mysqli_query($conn, $sql);
		$resu3 = mysqli_fetch_array($resu);

	}

	// var_dump($resu1[0]);

	$sql = "SELECT * FROM items WHERE id > 0";
	// product_category_id = $resu1[0]";
	if (isset($resu1)) {
		$sql .= " and product_category_id = $resu1[0]";
	}
	if (isset($resu2)) {
		$sql .= " and product_collection_id = $resu2[0]";
	}
	if (isset($resu3)) {
		$sql .= " and brand_id = $resu3[0]";
	}

	$result = mysqli_query($conn, $sql);

} else {
	// echo '<p>No filter</p>';
	$result = $items;
}
// // Arrays ( lesson )
// $filters = array ( 	
// 	array ("category", "All Categories", "product_categories", "product_category_name"),
// 	array ("collection", "All Collections", "product_collections", "product_collection_name"),
// 	array ("brand", "All Brands", "brands", "brand_name"));

// var_dump(count($filters));
// for ($i=0; $i <count($filters) ; $i++) { 
// 	echo "<br>";
// 	echo $filters[$i][0] . " " . $filters[$i][1] . " " . $filters[$i][2] ." " . $filters[$i][3];
//}
mysqli_close($conn);

?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>
	<!-- <div class="row">
		<h1 class="catalog-header">Catalog</h1>
	</div> -->
	
		<!-- go to add new item page -->
		<div class="container-fluid filter-catalog col-lg-3 col-md-3 col-sm-3 hidden-xs">
			<form method="GET" class ="form-filter-catalog" hidden>
				<div class="form-group">

					<select name="category" class="form-control">
						<option>All Categories</option>
						<?php
						load_categories($categories, "product_category_name");
						?>
					</select>

				</div>

				<div class="form-group">

					<select name="collection" class="form-control">
						<option>All Collections</option>
						<?php
						load_categories($collections, "product_collection_name");
						?>
					</select>

				</div>

				<div class="form-group">

					<select name="brand" class="form-control">
						<option>All Brands</option>
						<?php
						load_categories($brands, "brand_name");
						?>
					</select>

				</div>

				<button type="submit" name="search" class="btn btn-primary" >Search</button>
				
			</form>
			
		</div>


	<main class="wrapper2 container-fluid wrapper-catalog div-shrink-70">
		<?php 

		if (isset($_GET["category"])) {
			echo '<h1 class="text-center">'.$_GET["category"].'</h1>';
			echo '<hr>';
		} elseif (isset($_GET["brand"])) {
			echo '<h1 class="text-center">'.$_GET["brand"].'</h1>';
			echo '<hr>';
		} elseif (isset($_GET["collection"])){
			echo '<h1 class="text-center">'.$_GET["collection"].'</h1>';
			echo '<hr>';
		} else {

		};

		?>
		

		<div class="container-fluid wrapper-catalog-col">
			
			<?php
			create_div_catalog($result)
			?>
			
		</div>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

<script type="text/javascript">

	// $('.item-parent-container')
	// 	.mouseover(function () {
	// 		var id = $(this).attr('id');

	// 		$('#btnAddCart' + id).show();
	// 	})
	// 	.mouseout(function(){
	// 		var id = $(this).attr('id');
	// 		$('#btnAddCart' + id).hide();
	// 	});



</script>

</body>
</html>