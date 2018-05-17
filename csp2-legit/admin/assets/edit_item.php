<?php

// Get edited details
$id = $_POST['id'];

// connect to database 
require '../../connect.php';
// open functions
require_once '../../myfunctions.php';

//load items
$items = load_db_single_table("items", $conn);

$discounts = load_db_single_table("product_discounts", $conn);
$categories = load_db_single_table("product_categories", $conn);
$collections = load_db_single_table("product_collections", $conn);
$brands = load_db_single_table("brands", $conn);
$sizes = load_db_single_table("product_sizes", $conn);
//$brands_option = load_categories($brands, "brand_name");

$items_array = convert_sql_out_to_array($items);

$discounts_array = convert_sql_out_to_array(load_db_single_table("product_discounts", $conn));
$brands_array = convert_sql_out_to_array(load_db_single_table("brands", $conn)); 
$collections_array = convert_sql_out_to_array(load_db_single_table("product_collections", $conn)); 
$categories_array = convert_sql_out_to_array(load_db_single_table("product_categories", $conn));
$sizes_array = convert_sql_out_to_array(load_db_single_table("product_sizes", $conn));

extract($items_array[$id]);

mysqli_close($conn);


echo '
	<label>Name</label>

	<input hidden type="number" name="id" value="'.$id.'">

	<input name="product_name" class="form-control" type="text" value="'.$product_name.'" required>

	<label for="image" class="custom-file">Image</label>
	<input type="file" class="form-control custom-file-input" name="image" placeholder="'.$image.'">

	<labe>Price</label>
	<input name="price" class="form-control" type="number" value="'. $price.'" required>

	<label>Description</label>
	<textarea name="description" class="form-control">'.$description.'</textarea>


	<label for="stock">Stock</label>
	<input type="number" name="stock" value="'.$stock.'" class="form-control" required>

	<label for="weight">Weight (Grams)</label>
	<input type="number" name="weight" value="'.$weight.'" class="form-control" required>

	<label for="discount_id">Discount</label>
	<select name="discount_id" class="form-control">';
		echo '<option selected>'.$discounts_array[$discount_id]['discount_value_percent'].'</option>';
		load_categories($discounts, "discount_value_percent");
		echo '
	</select>

	<label>Brands</label>
	<select class="form-control" name="brand_id">';
		echo '<option selected>'.$brands_array[$brand_id]['brand_name'].'</option>';
		load_categories_complete($brands, "brand_name", $brands_array[$brand_id]['brand_name']);
		echo' 
	</select> 

	<label>Collections</label>
	<select class="form-control" name="product_collection_id">';
		echo '<option selected>'.$collections_array[$product_collection_id]['product_collection_name'].'</option>';
		load_categories_complete($collections, "product_collection_name", $collections_array[$product_collection_id]['product_collection_name']);
		echo'
	</select> 

	<label>Categories</label>
	<select class="form-control" name="product_category_id">';
		echo '<option selected>'.$categories_array[$product_category_id]['product_category_name'].'</option>';
		//echo '<option selected>'.$brands_array[$brand_id]['brand_name'].'</option>';
		load_categories_complete($categories, "product_category_name", $categories_array[$product_category_id]['product_category_name'] );
		
		echo' 
	</select> 

	<label for="size">Size</label>
	<select name="size_id" class="form-control">';
		echo '<option selected>'.$sizes_array[$size_id]['product_size_name'].'</option>';
		load_categories_complete($sizes, "product_size_name", $sizes_array[$size_id]['product_size_name']);
		echo'
	</select>';

?>





