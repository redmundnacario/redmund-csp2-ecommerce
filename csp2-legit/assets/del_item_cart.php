<?php

session_start();

$id = $_POST['item_id'];

// echo $id . ' ' . $quantity;

// update the items for session cart variable by delete entry
unset($_SESSION['cart'][$id]);


// update the total quantities of item to be purchased

$_SESSION['item_count'] = array_sum($_SESSION['cart']);

echo 'My Cart <span class="badge"> '.$_SESSION['item_count'].'  </span>';