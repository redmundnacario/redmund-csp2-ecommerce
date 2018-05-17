<?php

// Get edited details
$id = $_POST['id'];

// connect to database 
require '../../connect.php';
// open functions
require_once '../../myfunctions.php';

//load users
$orders = load_db_single_table("orders", $conn);

$payment_statuses= load_db_single_table("payment_statuses", $conn);
$delivery_statuses = load_db_single_table("delivery_statuses", $conn);

$orders_array = convert_sql_out_to_array($orders);

$payment_statuses_array = convert_sql_out_to_array(load_db_single_table("payment_statuses", $conn));
$delivery_statuses_array = convert_sql_out_to_array(load_db_single_table("delivery_statuses", $conn)); 


extract($orders_array[$id]);
// var_export($items_array[$id]);

// exit();

mysqli_close($conn);


echo '
	<input hidden name="id" value="'.$id.'" style="display: none;">
	
	<label for="discount_id">Payment Status</label>
	<select name="payment_status_id" class="form-control">';
		echo '<option selected>'.$payment_statuses_array[$payment_status_id]['payment_status_name'].'</option>';
		load_categories_complete($payment_statuses, "payment_status_name", $payment_statuses_array[$payment_status_id]['payment_status_name']);
		echo '
	</select>

	<label>Delivery Status</label>
	<select class="form-control" name="delivery_status_id">';
		echo '<option selected>'.$delivery_statuses_array[$delivery_status_id]['delivery_status_name'].'</option>';
		load_categories_complete($delivery_statuses, "delivery_status_name", $delivery_statuses_array[$delivery_status_id]['delivery_status_name']);
		echo' 
	</select>';

?>





