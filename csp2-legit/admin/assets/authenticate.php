<?php

session_start();

require '../../connect.php';
require '../../myfunctions.php';
require '../../assets/class/class.php';

$user =$_POST["username"];
$pw = sha1($_POST["password"]);

// var_dump($user);
// exit();

/*
		LOAD USER INFO
*/

$row_user_info = load_row_given_unique_value($conn, "users", "username", $user, "*");
$row_user_info = convert_sql_out_to_array_b($row_user_info);

$username = $row_user_info[0]["username"];
$firstname = $row_user_info[0]["first_name"];
$lastname = $row_user_info[0]["last_name"];
$password = $row_user_info[0]["password"];
$role_id = $row_user_info[0]["role_id"];

// var_dump($role_id);
// exit();

/*
		LOAD ROLES TABLE
*/
$row_user_info = load_row_given_unique_value($conn, "roles", "id", $role_id, "*");
$row_user_info = convert_sql_out_to_array_b($row_user_info);
$role_name = $row_user_info[0]["role_name"];
// var_dump($role_name);
// exit();

if ($user == $username && $pw == $password){
	if ($role_name == "admin"){
		$_SESSION['role'] = $role_name;
		$_SESSION['admin_name'] = $firstname. " " . $lastname; 
		// echo $_SESSION['admin_name'];
		// exit();
		header('location: ../admin.php'); 
	} else {
		//$_SESSION['warning'] = "Account not valid";
		FlashMessage::add( "Username <strong>".$username . "</strong> not valid", "danger");
		header('location: ../index.php');
		
	}
} else {
	// $_SESSION['warning'] = "Account not valid";
	FlashMessage::add("Account not valid", "danger");
	header('location: ../index.php');

}


mysqli_close($conn);