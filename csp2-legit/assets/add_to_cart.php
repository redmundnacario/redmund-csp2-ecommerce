<?php

session_start();

$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];

// echo $id . ' ' . $quantity;

// update the items for session cart variable
// set default to 1
// $_SESSION['cart'][$id] = $quantity;

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'][$id] = $quantity;
} else {
	if (array_key_exists($id, $_SESSION['cart'])) {
		$_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $quantity;
		//var_export($id, $_SESSION['cart'][$id]);
	} else{
		$_SESSION['cart'][$id] = $quantity;
	}
}




// update the total quantities of item to be purchased
// $_SESSION['item_count'] += $quantity;
$_SESSION['item_count'] = array_sum($_SESSION['cart']);

echo 'Cart <span class="badge"> '.$_SESSION['item_count'].' </span>';