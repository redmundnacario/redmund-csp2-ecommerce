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

	<label>Firts Name</label>
	<input name="first_name" class="form-control" type="text" value="'.$first_name.'" required>
	<label>Last Name</label>
	<input name="last_name" class="form-control" type="text" value="'.$last_name.'" required>
	<label>User Name</label>
	<input name="username" class="form-control" type="text" value="'.$username.'" required>';

mysqli_close($conn);