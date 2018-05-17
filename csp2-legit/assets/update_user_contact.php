<?php

// load database
require '../connect.php';

// load functions php
require_once '../myfunctions.php';
//var_export($_FILES);

// check

$id = $_POST['id'];
// encrypt

$users_col_names = array("cellphone_number", "telephone_number");

$query_update_output = update_query_generator("users", $users_col_names, $id);

//var_dump($query_update_output);


$output = mysqli_query($conn, $query_update_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);

mysqli_close($conn);

header('location: ../profile.php');

?>