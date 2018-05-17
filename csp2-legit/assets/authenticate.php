<?php
ob_start();
require '../connect.php';
require_once '../myfunctions.php';
require 'class/class.php';
session_start();



$userName = $_POST['username'];
$passWord = sha1($_POST['password']);

$sql = "SELECT u.username, u.password, r.role_name FROM users u JOIN roles r ON (u.role_id = r.id) WHERE username = '$userName'";

$result = mysqli_query($conn, $sql);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
    
    $user = mysqli_fetch_assoc($result);
    
    if ($userName == $user['username'] && $passWord == $user['password']) {
        $isLogInSuccessful = true;
        $_SESSION['current_user'] = $user['username'];
        $_SESSION['role'] = $user['role_name'];
        date_default_timezone_set("Asia/Manila");
        $_SESSION['date_log'] = date("Y-m-d h:i:sa");
    }
}else{
    echo 'User not found.';
}

mysqli_close($conn);

if ($isLogInSuccessful) {
    // if successful login
    FlashMessage::add("Welcome " . $_SESSION['current_user']."!", "success");
    header('location: ../index.php');
} else {
    // if failed login
    FlashMessage::add("Account not valid.", "danger");
    header('location: ../login.php');
}
ob_flush();
?>