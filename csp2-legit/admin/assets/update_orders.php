
<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';

$id = $_POST['id'];

$fk_values = array_fill_keys( array("payment_status_id" , "delivery_status_id"), '');

$fk_values["payment_status_id"] = convert_sql_out_to_array(load_db_single_table("payment_statuses", $conn), "payment_status_name");
$fk_values["delivery_status_id"]= convert_sql_out_to_array(load_db_single_table("delivery_statuses", $conn), "delivery_status_name");

// Column from users tabel
// $users_col_names = load_all_column_names_from_table("users", $conn, "Field");
// var_dump($users_col_names);
// exit();
$users_col_names = array("payment_status_id" , "delivery_status_id");

// delete id in  array
//array_splice($users_col_names, 0, 1);


// FOR EACH FOREIGN KEY, FIND ITS ID IN ITS TABLE
$foreign_keys =  array ("payment_status_id" , "delivery_status_id");
$foreign_keys_col = array ("payment_status_name", "delivery_status_name");
$foreign_keys_table = array ("payment_statuses", "delivery_statuses");

foreach ($foreign_keys as $key => $value) {
	$row_info = load_row_given_unique_value($conn, $foreign_keys_table[$key], $foreign_keys_col[$key], $_POST[$value], 'id');
	$row_info = convert_sql_out_to_array_b($row_info);
	$row_info = $row_info[0]["id"];
	// echo $row_info;
	// exit();
    //$_POST[$value] = array_search($_POST[$value], $fk_values[$value]);
    $_POST[$value] = $row_info;
}


$query_update_output = update_query_generator("orders", $users_col_names, $id);

// var_dump($query_update_output);

$output = mysqli_query($conn, $query_update_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);


mysqli_close($conn);

header('location: ../admin.php');