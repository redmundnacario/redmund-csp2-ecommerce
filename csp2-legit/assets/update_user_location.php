<?php

// load database
require '../connect.php';

// load functions php
require_once '../myfunctions.php';
//var_export($_FILES);

// check

$id = $_POST['id'];
//$users_col_names = load_all_column_names_from_table("users", $conn, "Field");
$users_col_names = array("location_id", "delivery_address","bh_no", "street", "barangay", "city_mun","province", "region_name");
$delivery_address_col = array( "bh_no", "street", "barangay", "city_mun","province", "region_name" );

// var_dump($users_col_names);
//exit();



//$users_col_names = $arrayName = array('' => , );


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


$fk_values = array_fill_keys( array("location_id" , "role_id"), '');

$fk_values["location_id"] = convert_sql_out_to_array(load_db_single_table("locations", $conn), "location_name");

// SET other POST variables
//($var > 2 ? true : false);
$bh_no = ($_POST["bh_no"] == "None"? "" : $_POST["bh_no"]);
$street = ($_POST["street"] == "None"? "" : $_POST["street"]);
// $zone = ($_POST["zone"] == "None"? "" : $_POST["zone"]);
$barangay = ($_POST["barangay"] == "None"? "" : $_POST["barangay"]);
$city_mun = ($_POST["city_mun"] == "None" ? "": $_POST["city_mun"]);
$province = ($_POST["province"] == "None" ? "" : $_POST["province"]);

//$region = $_POST["region"];
$_POST['delivery_address'] = "";
foreach ($delivery_address_col as $key => $value) {
	if ($_POST[$value] == "" or $_POST[$value] == "None") {
		continue;
	} else {
		if ($_POST['delivery_address'] == "") {
			$_POST['delivery_address'] = $_POST['delivery_address']." ". $_POST[$value];
		}else{
			$_POST['delivery_address'] = $_POST['delivery_address'].", ". $_POST[$value];
		}
	}
}


//var_dump($_POST['delivery_address']);

// LOAD JSON of Regions
$regions = read_json('refregion.json');
$region_names = convert_json_to_array($regions['RECORDS'],"regDesc");
$location_nos = convert_json_to_array($regions['RECORDS'],"location_no");

$_POST["location_id"] = $location_nos[array_search($_POST['region_name'], $region_names)];
// echo $_POST["location_id"];
// exit();

#remove id in list
#array_splice($users_col_names, 0, 1);

$query_update_output = update_query_generator("users", $users_col_names, $id);

//var_dump($query_update_output);


$output = mysqli_query($conn, $query_update_output) or die(mysqli_error($conn));

// var_dump($query_insert_output);

mysqli_close($conn);

header('location: ../profile.php');

?>