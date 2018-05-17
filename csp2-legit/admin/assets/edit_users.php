<?php

// Get edited details
$id = $_POST['id'];

// connect to database 
require '../../connect.php';
// open functions
require_once '../../myfunctions.php';

//load users
$users = load_db_single_table("users", $conn);

$roles= load_db_single_table("roles", $conn);
$locations = load_db_single_table("locations", $conn);

$users_array = convert_sql_out_to_array($users);

$roles_array = convert_sql_out_to_array(load_db_single_table("roles", $conn));
$locations_array = convert_sql_out_to_array(load_db_single_table("locations", $conn)); 


extract($users_array[$id]);
// var_export($items_array[$id]);

// exit();

mysqli_close($conn);


echo '
	<input hidden name="id" value="'.$id.'" style="display: none;">
	
	<label for="discount_id">Role</label>
	<select name="role_id" class="form-control">';
		echo '<option selected>'.$roles_array[$role_id]['role_name'].'</option>';
		load_categories_complete($roles, "role_name", $roles_array[$role_id]['role_name']);
		echo '
	</select>

	<label>Location</label>
	<select class="form-control" name="location_id">';
		echo '<option selected>'.$locations_array[$location_id]['location_name'].'</option>';
		load_categories_complete($locations, "location_name", $locations_array[$location_id]['location_name']);
		echo' 
	</select>';

?>





