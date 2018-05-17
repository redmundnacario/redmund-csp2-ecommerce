<?php

// Get edited details
$id = $_GET['id'];

// connect to database 
require '../connect.php';
// open functions
require_once '../myfunctions.php';

//load items
$users = load_db_single_table("users", $conn);
$users_array = convert_sql_out_to_array($users);
extract($users_array[$id]);

echo '
	<input hidden type="number" name="id" value="'.$id.'">

	<label>Cellphone Number</label>
	<input name="cellphone_number" class="form-control" type="text" value="'.$cellphone_number.'" required>
	<label>Telephone Number</label>
	<input name="telephone_number" class="form-control" type="text" value="'. $telephone_number .'" placeholder="NONE" >';


mysqli_close($conn);