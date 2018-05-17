<?php

// Get edited details
$id = $_GET['id'];

// connect to database 
require '../connect.php';
// open functions
require_once '../myfunctions.php';

//load items
$users = load_db_single_table("users", $conn);

$locations = load_db_single_table("locations", $conn);
$roles= load_db_single_table("roles", $conn);

//$brands_option = load_categories($brands, "brand_name");

$users_array = convert_sql_out_to_array($users);


$locations_array = convert_sql_out_to_array(load_db_single_table("locations", $conn));

$roles_array = convert_sql_out_to_array(load_db_single_table("roles", $conn)); 


extract($users_array[$id]);

// echo $id ;
// exit;

mysqli_close($conn);

$regions = read_json('refregion.json');
$region_names = convert_json_to_array($regions['RECORDS'],"regDesc");
$provinces = read_json('refprovince.json');
$province_names = convert_json_to_array($provinces['RECORDS'],"provDesc");
$city_muns = read_json('refcitymun.json');
$city_mun_names = convert_json_to_array($city_muns['RECORDS'],"citymunDesc");

echo '
		<input hidden type="number" name="id" value="'.$id.'">

		<label>Firts Name</label>
		<input name="first_name" class="form-control" type="text" value="'.$first_name.'" required>
		<label>Last Name</label>
		<input name="last_name" class="form-control" type="text" value="'.$last_name.'" required>
		<label>User Name</label>
		<input name="username" class="form-control" type="text" value="'.$username.'" required>
		<label>Password</label>
		<input name="password" class="form-control" type="password" value="'.$password.'" required>
		<label>Email</label>
		<input name="email" class="form-control" type="email" value="'.$email.'" required>
		
		<label for="image" class="custom-file">Image</label>
		<input type="file" class="form-control custom-file-input" name="image">

		<label>Delivery Address</label>
		<p>Building or House No.</p>
		<input name="bh_no" class="form-control" type="text" value="None" required>
		
		<p>Street</p>
		<input name="street" class="form-control" type="text" value="None" required>
		
		<p>Zone</p>
		<input name="zone" class="form-control" type="text" value="None" required>
		
		<p>Barangay</p>
		<input name="barangay" class="form-control" type="text" value="None" required>
		
		<p>City / Municipality</p>
		<select class="form-control" name="city_mun">';
			echo '<option selected>'.$city_mun.'</option>';
			load_categories_given_array($city_mun_names , $city_mun);
			echo' 
		</select>
		
		<p>Province</p>
		<select class="form-control" name="province">';
			echo '<option selected>'.$province.'</option>';
			load_categories_given_array($province_names , $province);
			echo' 
		</select>

		<!-- <label>Region</label> -->
		<p>Region</p>
		<select class="form-control" name="region_name">';
			echo '<option selected>'.$region_name.'</option>';
			load_categories_given_array($region_names , $region_name);
			echo' 
		</select>

		<label>Contact Details</label>
		<p>Cellphone number</p>
		<input name="cellphone_number" class="form-control" type="text" value="'.$cellphone_number.'" required>
		<p>Telephone number</p>
		<input name="telepone_number" class="form-control" type="text" value="'.$telephone_number.'" required>

		<label>Role</label>
		<select class="form-control" name="role_id">';
			echo '<option selected>'.$roles_array[$role_id - 1]['role_name'].'</option>';
			load_categories_complete($roles, "role_name", $roles_array[$role_id - 1]['role_name']);
			echo' 
		</select>';

?>

<!-- 	<label for="location_id">Location</label>
	<select name="location_id" class="form-control">';
		echo '<option selected>'.$locations_array[$location_id - 1]['discount_value_percent'].'</option>';
		load_categories($locations, "location_name");
		echo '
	</select>
 -->




