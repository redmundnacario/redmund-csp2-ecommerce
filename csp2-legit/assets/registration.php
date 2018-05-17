<?php
ob_start();

require '../connect.php';
require_once '../myfunctions.php';

// load users column names
$users_col_names = load_all_column_names_from_table("users", $conn, "Field");

// SET DEFAULT VALUES
$_POST['image'] = 'None';
$_POST['delivery_address'] = "None";
$_POST['present_address'] = "None";
// SET int
$_POST['cellphone_number'] = "999";
$_POST['telephone_number'] = "999";
// SET foreign keys
$_POST['location_id'] = 1;
$_POST['role_id'] = 3;

// convert pw
$_POST['password'] = sha1($_POST['password']);

// required inputs
$required_inputs = array ('first_name', 'last_name', 'email', 'username');

//delete "id" in
array_splice($users_col_names, 0, 1);
//var_export($users_col_names);

// insert
$query_insert_output = insert_query_generator("users", $users_col_names);
//var_dump($query_insert_output);

$output = mysqli_query($conn, $query_insert_output) or die(mysqli_error($conn));


mysqli_close($conn);

header('location: ../login.php');

ob_flush();
?>
