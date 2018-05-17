<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';
//var_export($_FILES);
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

$id = $_POST['id'];

$fk_values = array_fill_keys( array("discount_id" , "product_collection_id", "product_category_id", "brand_id" , "size_id"), '');

$fk_values["discount_id"] = convert_sql_out_to_array(load_db_single_table("product_discounts", $conn), "discount_value_percent");
$fk_values["product_category_id"]= convert_sql_out_to_array(load_db_single_table("product_categories", $conn), "product_category_name");
$fk_values["product_collection_id"] = convert_sql_out_to_array(load_db_single_table("product_collections", $conn), "product_collection_name");
$fk_values["brand_id"] = convert_sql_out_to_array(load_db_single_table("brands", $conn), "brand_name" );
$fk_values["size_id"] = convert_sql_out_to_array(load_db_single_table("product_sizes", $conn), "product_size_name");

// $items = load_db_single_table("items", $conn);
// $sample = convert_sql_out_to_array($items);
$items_col_names = load_all_column_names_from_table("items", $conn, "Field");


// delete id in  array

array_splice($items_col_names, 0, 1);
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

$query_update_output = update_query_generator("items", $items_col_names, $id, $target_dir);

// var_dump($query_update_output);

$output = mysqli_query($conn, $query_update_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);


mysqli_close($conn);

header('location: ../admin.php');