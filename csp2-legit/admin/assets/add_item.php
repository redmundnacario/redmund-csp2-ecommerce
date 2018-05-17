<?php

// load database and php functions
require '../../connect.php';
require_once '../../myfunctions.php';

// check
if (isset($_FILES)) {
	$target_dir = "./assets/img/product/" . $_POST["brand_id"] . "/";
	$target_file = $target_dir . basename($_FILES['image']['name']);
	move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
	// var_dump($target_file);
	// var_dump($_FILES['image']['tmp_name']);
	// var_dump($_FILES);
	// exit;
}


$fk_values = array_fill_keys( array("discount_id" , "product_collection_id", "product_category_id", "brand_id" , "size_id"), '');

$fk_values["discount_id"] = convert_sql_out_to_array(load_db_single_table("product_discounts", $conn), "discount_value_percent");
$fk_values["product_category_id"]= convert_sql_out_to_array(load_db_single_table("product_categories", $conn), "product_category_name");
$fk_values["product_collection_id"] = convert_sql_out_to_array(load_db_single_table("product_collections", $conn), "product_collection_name");
$fk_values["brand_id"] = convert_sql_out_to_array(load_db_single_table("brands", $conn), "brand_name" );
$fk_values["size_id"] = convert_sql_out_to_array(load_db_single_table("product_sizes", $conn), "product_size_name");

// $items = load_db_single_table("items", $conn);
// $sample = convert_sql_out_to_array($items);
$items_col_names = load_all_column_names_from_table("items", $conn, "Field");
// var_dump($items_col_names);
// echo "<br?";
// var_dump($items[0]);



// FOR EACH FOREIGN KEY, FIND ITS ID IN ITS TABLE
$foreign_keys = array ("discount_id" , "product_collection_id", "product_category_id", "brand_id" , "size_id");

foreach ($foreign_keys as $value) {

    $_POST[$value] = array_search($_POST[$value], $fk_values[$value]);
    // var_dump($value, $_POST[$value]);
}

// IF discount value is not0
if ($_POST["discount_id"] == 0) {
	$_POST["discount_binary"] = 0;
} else{
	$_POST["discount_binary"] = 1;
}

$query_insert_output = insert_query_generator("items", $items_col_names, $target_dir);

// echo $query_insert_output."<hr>";

$output = mysqli_query($conn, $query_insert_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);

mysqli_close($conn);

header('location: ../admin.php');

// load posted form create_new_item.php
// $id = $_POST['id'];
// $product_name = $_POST['product_name'];
// $image = $_POST['image'];
// $price = $_POST['price'];
// $description = $_POST['description'];
// $stock = $_POST['stock'];
// $weight = $_POST['weight'];

// $discount_binary = $_POST['discount_binary'];
// $discount_value = $_POST['discount_value'];

// $category = $_POST['category'];
// $collection = $_POST['collection'];
// $brand = $_POST['brand'];
// $size = $_POST['size'];

// Append to existing items table in database
// sql = "INSERT INTO items (id, product_name, price, description, image, stock, weight, discount_binary, discount_id, product_collection_id, product_category_id, brand_id, size_id) VALUES ($id, $product_name, $price,  $description, $image, $stock, $weight, $discount_binary, $discount_id, $product_collection_id, $product_category_id, $brand_id, $size_id)";
// $output = mysqli_query($connection, $sql);

// list all the column name in table
# select column_name from information_schema.columns where table_schema = 'honeyken_coffee' and table_name = 'items'

?>

