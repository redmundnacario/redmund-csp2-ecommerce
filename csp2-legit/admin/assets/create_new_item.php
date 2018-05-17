<?php

session_start();

// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';

// load needed tables
$items = load_db_single_table("items", $conn);
$product_discounts =  load_db_single_table("product_discounts", $conn);
$categories = load_db_single_table("product_categories", $conn);
$collections = load_db_single_table("product_collections", $conn);
$brands = load_db_single_table("brands", $conn);
$sizes = load_db_single_table("product_sizes", $conn);


$items_array = convert_sql_out_to_array($items);

// $items_col_names = load_all_column_names_from_table("items", $conn, "Field");


mysqli_close($conn);

$last_item = end($items_array);
$new_id = $last_item['id'] + 1;



echo '		
<input hidden type="number" name="id" value="'. $new_id .'">

<label for="product_name">Product Name</label>
<input type="text" name="product_name" id="productName" placeholder="Enter product name" class="form-control" required>

<label for="image" class="custom-file">Image</label>
<input type="file" class="form-control custom-file-input" name="image" required>

<label for="price">Price</label>
<input type="text" name="price" id="price" placeholder="PHP 0.00" class="form-control" required>

<label for="description">Description</label>
<textarea name="description" id="description" placeholder="Type product description here..." class="form-control"></textarea>

<label for="stock">Stock</label>
<input type="number" name="stock" id="stock" placeholder="1" class="form-control" required>

<label for="weight">Weight (Grams)</label>
<input type="number" name="weight" id="weight" placeholder="1" class="form-control" required>

<label for="discount_id">Discount</label>
<select name="discount_id" class="form-control">';
	load_categories_complete($product_discounts, "discount_value_percent");
	echo'
</select>

<label for="category">Category</label>
<select name="product_category_id" class="form-control">';
	load_categories_complete($categories, "product_category_name");
	echo '
</select>

<label for="collection">Collection</label>
<select name="product_collection_id" class="form-control">';
	load_categories_complete($collections, "product_collection_name");
	echo '
</select>

<label for="brand">Brand</label>
<select name="brand_id" class="form-control">';
	load_categories_complete($brands, "brand_name");
	echo '
</select>

<label for="size">Size</label>
<select name="size_id" class="form-control">';
	load_categories($sizes, "product_size_name");
	echo'
</select>';


