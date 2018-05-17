<?php

// load database
require '../connect.php';

// load functions php
require_once '../myfunctions.php';
//var_export($_FILES);

// check

$id = $_POST['id'];
$users_col_names = array("username", "first_name", "last_name");

if (isset($_FILES['image'])) {
	//$target_dir = "img/user/";
	$target_dir = "img/user/";
	$target_file = $target_dir . basename($_FILES['image']['name']);
	$result = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
	// var_dump($target_file);
	// var_dump($_FILES['image']['tmp_name']);
	// var_dump($result);
	// exit;
}


$query_update_output = update_query_generator("users", $users_col_names, $id);

//var_dump($query_update_output);


$output = mysqli_query($conn, $query_update_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);

mysqli_close($conn);

header('location: ../profile.php');

?>