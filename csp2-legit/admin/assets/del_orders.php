<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';


$given_id = $_POST["id"];
$orders_array = convert_sql_out_to_array(load_db_single_table("orders", $conn));
$interest = $orders_array[$given_id];
extract($interest);

echo '<p>Are you sure you want to delete an order with reference no. <strong>'.$reference_number.'</strong>?</p>
	<input hidden name="id" value="'.$id.'" style="display: none;">';

mysqli_close($conn);
