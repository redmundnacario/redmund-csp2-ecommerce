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
//var_export($items_array[0]);

$cart_items = $_SESSION['cart'];

$total_1 = editCartItems($cart_items, $items_array);

$_SESSION['total_1'] = $total_1;

mysqli_close($conn);

// header ('location: cart.php');
?>