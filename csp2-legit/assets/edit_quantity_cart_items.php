<?php

session_start();

// load database
require '../connect.php';

// load functions php
require_once '../myfunctions.php';

// load needed tables
$items = load_db_single_table("items", $conn);
// convert table to array
$items_array = convert_sql_out_to_array($items);



// update quantity;
$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];

if (is_null($quantity)) {
	exit();
}

$_SESSION['cart'][$id] = $quantity;



echo number_format($quantity * $items_array[$id]["price"], 2);
?>