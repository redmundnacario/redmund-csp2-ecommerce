<?php
ob_start();
session_start();
// var_dump($_SESSION);
// exit();

require '../connect.php';
require_once '../myfunctions.php';
require 'class/class.php';

// If user is a guest, register first,
if (!isset($_SESSION["current_user"])){
	header('location: ../register.php');
}

/*
	INSERT entry in ORDERS
*/

//var_dump($_SESSION["current_user"]);
date_default_timezone_set("Asia/Manila");

// Fill defaul values        
$_POST['transaction_date'] = date("Y-m-d h:i:sa");
$ref_num = reference_generator(date("ymd"));
$_POST['reference_number'] = $ref_num;
$_POST['total'] = $_POST['final_price'];
$_POST['payment_proof'] = "None";

// Load columns in a 'orders' table
$orders_col = load_all_column_names_from_table("orders", $conn, "Field");
// remove id in list
array_splice($orders_col, 0, 1);

$query_insert_output = insert_query_generator("orders", $orders_col);

//echo $query_insert_output."<hr>";


$output = mysqli_query($conn, $query_insert_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);
// mysqli_close($conn);


/*
		INSERT entry in ORDER_ITEMS
*/


// ITEMS
$items_array = convert_sql_out_to_array(load_db_single_table("items", $conn));
// ORDERS
$order_items_col = load_all_column_names_from_table("order_items", $conn, "Field");
// remove id in list
array_splice($order_items_col, 0, 1);

// GET order_id form Reference Number
$row_orders_info = load_row_given_unique_value($conn, "orders", "reference_number", $_POST['reference_number'], 'id');
$row_orders_info = convert_sql_out_to_array_b($row_orders_info);
$order_id = $row_orders_info[0]["id"];

$cart = $_SESSION['cart'];

foreach ($cart as $key => $value) {
	$_POST['quantity'] = $value;
	$_POST['item_id'] = $key;
	$_POST['subtotal'] = $items_array[$key]["price"] * $value;
	$_POST['order_id'] = $order_id;
	$query_insert_output = insert_query_generator("order_items", $order_items_col);
	//echo $query_insert_output."<hr>";

	$output = mysqli_query($conn, $query_insert_output) or die(mysqli_error($conn));
}

/*
		UNSET ALL SESSION VARIABLES
*/

// $_SESSION["cart"] = "None";
unset($_SESSION["total_1"]);
unset($_SESSION["item_count"]);
unset($_SESSION["final_price"]);
unset($_SESSION["cart"]);




/*
		LOAD USER INFO
*/

$row_user_info = load_row_given_unique_value($conn, "users", "username", $_SESSION['current_user'], "*");
$row_user_info = convert_sql_out_to_array_b($row_user_info);
$first_name = $row_user_info[0]["first_name"];
$email = $row_user_info[0]["email"];

/*
		SEND REFERENCE CODE
*/

require_once("post_checkout_send.php");
echo $emailBody;
echo $email;

if(!$mail->Send()) {
	$message = '<label class="text-danger">Problem in sending reference code to your email.</label>';
	FlashMessage::add("Transaction not valid. Please check again your Delivery Address", "danger");
} else {
	$message = 'The copy of your reference code has successfully been sent to <label class="text-success">'.$email.'</label>';
	FlashMessage::add("Success! Transaction is valid. Here is your transaction no. : " . $_POST['reference_number'], "success");
}

mysqli_close($conn);

// Set Flash message


header('location: ../home.php');
ob_flush();

