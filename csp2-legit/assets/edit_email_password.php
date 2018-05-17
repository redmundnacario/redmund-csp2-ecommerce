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

	<label>Email</label>
	<input name="email" class="form-control" type="email" value="'.$email.'" required>
	<label>Password</label>
	<input name="password" class="form-control" type="password" value="'. $password .'" required>
	<label>Confirm Password</label>
	<input name="confirm" class="form-control" type="password" required>';

mysqli_close($conn);