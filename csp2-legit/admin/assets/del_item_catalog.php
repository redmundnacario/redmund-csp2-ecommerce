<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';


$given_id = $_POST["id"];
$items_array = convert_sql_out_to_array(load_db_single_table("items", $conn));
$interest = $items_array[$given_id];
extract($interest);

echo '<p>Are you sure you want to delete <strong>'.$product_name.'</strong>?</p>
	<input hidden name="id" value="'.$id.'" style="display: none;">';

mysqli_close($conn);
