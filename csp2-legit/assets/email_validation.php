<?php

require '../connect.php';
require_once '../myfunctions.php';

validation_register("users", "email", $conn, $pos_message = "valid", $neg_message = "already used");

mysqli_close($conn);
?>