<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';

//$table_name = $_POST["table"];
//$col_name = $_POST["column"];
$given_id = $_POST["id"];

$query_delete_output = delete_row_entry_table("items", "id", $given_id);

var_dump($query_delete_output);

//exit;

$output = mysqli_query($conn, $query_delete_output) or die(mysqli_error($conn));

mysqli_close($conn);


header('location: ../admin.php');