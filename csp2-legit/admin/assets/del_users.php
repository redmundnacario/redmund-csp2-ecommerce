<?php


// load database
require '../../connect.php';

// load functions php
require_once '../../myfunctions.php';


$given_id = $_POST["id"];
$users_array = convert_sql_out_to_array(load_db_single_table("users", $conn));
$interest = $users_array[$given_id];
extract($interest);

echo '<p>Are you sure you want to delete a user account with username <strong>'.$username.'</strong>?</p>
	<input hidden name="id" value="'.$id.'" style="display: none;">';

mysqli_close($conn);
