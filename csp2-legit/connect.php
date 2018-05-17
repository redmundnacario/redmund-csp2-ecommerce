<?php

// Define required connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'honeyken_coffee';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

//// Test if connection is successfule
// if ($conn)
// 	echo 'Database connection was successful.';
// else
// 	die('connection failed: ' . mysqli_error($conn));

if (!$conn)
	die('Connection failed: ' . mysqli_error($conn));
?>