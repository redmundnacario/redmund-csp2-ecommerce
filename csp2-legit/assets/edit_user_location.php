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
	<div>
		<p>Note:</p>
		<p class="text-center">Transactions with not valid Delivery Address will be voided.</p>
		<p class="text-center"></p>
	</div>

	<p>Building or House No.</p>
	<input name="bh_no" class="form-control" value="'.$bh_no.'" placeholder="NONE" type="text">
	
	<p>Street</p>
	<input name="street" class="form-control" value="'.$street.'" type="text" placeholder="NONE" >
	
	<p>Barangay</p>
	<input name="barangay" class="form-control" value="'.$barangay.'" type="text" placeholder="NONE" >
	
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
	</select>';
