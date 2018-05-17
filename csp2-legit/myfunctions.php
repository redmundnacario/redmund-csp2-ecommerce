<?php
///////
// JSON
///////

// read JSON file
function read_json($json_file){
	$file = file_get_contents($json_file);
	$json_out = json_decode($file, true);
	return $json_out;
}

function convert_json_to_array($json_input, $key_name){
	$json_array = array ();
	foreach ($json_input as $key => $value) {
		$json_array[] = $value[$key_name];
	}
	return $json_array;
}

function load_categories_given_array($json_array, $skip = NULL){
	foreach ($json_array as $key => $value) {
		if (!is_null($skip)) {
			if ($value == $skip) {
				continue;
			} else {
				echo '<option>'. $value .'</option>';
			}
		} else {
			echo '<option>'. $value .'</option>';
		}
	}
}


///////
// SQL
///////

// Database part

function load_db_single_table($table_name, $connection){
	// must check first if the table is empty
	$sql = "SELECT * FROM $table_name";
	$output = mysqli_query($connection, $sql);
	return $output;
}



function convert_sql_out_to_array($result_items, $specific_column_name = null){
	$array_out = array();
	while ($item = mysqli_fetch_assoc($result_items)){
		//var_dump($item);
		extract($item);

		if ($specific_column_name != null) {
			$array_out[$id] = $item[$specific_column_name];
		} else {
			$array_out[$id] = $item;
		}
	}
	return $array_out;
}

function convert_sql_out_to_array_b($result_items, $specific_column_name = null){
	$array_out = array();
	while ($item = mysqli_fetch_assoc($result_items)){

		if ($specific_column_name != null) {
			$array_out[] = $item[$specific_column_name];
		} else {
			$array_out[] = $item;
		}
	}
	return $array_out;
}

function load_all_column_names_from_table($table_name, $connection, $specific_column_name = null){

	$sql = "SHOW COLUMNS FROM $table_name";
	//$result = mysqli_query($conn,$sql);
	$output = mysqli_query($connection, $sql);
	$array_out = convert_sql_out_to_array_b($output, $specific_column_name);
	// while($row = mysqli_fetch_array($output)){
	// 	//echo $row['Field']."<br>";
	// 	$array_out[] = $row['Field'];
	// }
	
	return $array_out;
}

function load_row_given_unique_value($connection, $table_name, $column_name, $unique_value, $row_col_target = "*"){
	$sql = "SELECT $row_col_target FROM $table_name WHERE $column_name = '$unique_value'";
	//var_dump($sql);
	$output = mysqli_query($connection, $sql);
	return $output;
}

// NAVBAR


function load_categories_as_list($category_table, $category_colname, $variable){
	while ($data_in = mysqli_fetch_assoc($category_table)) {
		// extract($data_in);

		if ($data_in[$category_colname] == "NONE") {
			continue;
		};
			// echo '<a href="catalog.php?'. $variable .'='. $data_in[$category_colname] .'">' . $data_in[$category_colname] .  '</a>';
		echo '<form action="catalog.php" method="GET" ><input type="submit" name="'. $variable .'" value="' . $data_in[$category_colname].'" ></form>';
	}
}


// Catalog part

function load_categories($category_table, $category_colname){
	while ($data_in = mysqli_fetch_assoc($category_table)) {
		// extract($data_in);

		if ($data_in[$category_colname] == "NONE") {
			continue;
		};

			echo '<option>' . $data_in[$category_colname] .  '</option>';
	}
}

function load_categories_complete($category_table, $category_colname, $skip = NULL){
	while ($data_in = mysqli_fetch_assoc($category_table)) {
		if (!is_null($skip)) {
			//echo '<option>' . "NULL" .  '</option>';
			if ($data_in[$category_colname] == $skip) {
				continue;
			} else {
				echo '<option>' . $data_in[$category_colname] .  '</option>';
			}
		} else{
			echo '<option>' . $data_in[$category_colname] .  '</option>';
		}
	}
}

function create_div_catalog($result_items){
	while ($item = mysqli_fetch_assoc($result_items)){
		extract($item);
		//<a href="item.php?id='.$id.'">
		echo '
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12" >
				<div class="item-parent-container" id="'.$id.'"">
					<a href="item.php?id='.$id.'">
						<img src="' . $image . '" alt="products" class="image-prod img-responsive div-center">
					</a>
					
					<div class="item-container">
						<p class="itemName" id="itemName'.$id.'">'. $product_name .'</p>
						<div>
							<span>&#8369</span>'. $price .'
						</div>
						<div>
							<input id="itemQuantity'.$id.'" type="number" value="1" min="1" hidden>
						</div>
						<div>
							<button class="btn btn-info catalog-button" id="btnAddCart'.$id.'" onclick="addToCart('.$id.')" >Add to Cart</button>
						</div>
					</div>
				</div>
				
			</div>';
	}
}

// INSERT QUERY GENERATOR

function insert_query_generator($table_name, $col_names, $target_dir=NULL){
	/*
		INPUT:
		$table_name : STRING
		$col_names : array of strings
	*/
	$fl_length = count($col_names);

	$query_insert = "INSERT INTO " . "$table_name" . " (";
	$query_insert2 = " VALUES (";

	for ( $i=0; $i < $fl_length; $i++) {
		if ($i < $fl_length) {
			if ($i != 0 ) {
				$query_insert .= ", ";
				$query_insert2 .= ", ";
			}
		}

		$query_insert .= $col_names[$i];
		if ($col_names[$i] == "image"){
			// This is for image
			if (isset($_FILES["image"])){
				$query_insert2 .= "'" . $target_dir . $_FILES['image']['name'] . "'";
			} else{
				$query_insert2 .= "'" . 'None' . "'";
			}

		}else{
			$query_insert2 .= "'" . $_POST[$col_names[$i]] . "'";
		}

		if ($i == ( $fl_length - 1)) {
			$query_insert .= ")";
			$query_insert2  .= ")";
		}
	}

	$query_insert3 = $query_insert . " " . $query_insert2;
	return $query_insert3;
}

function update_query_generator($table_name, $col_names, $given_id, $target_dir=NULL){
	/*
		INPUT:
		$table_name : STRING
		$col_names : STRING
	*/
	$fl_length = count($col_names);

	$query_insert = "UPDATE " . "$table_name" . " SET ";
 	var_dump($fl_length);

	for ( $i=0; $i < $fl_length; $i++) {

		if ($i < $fl_length) {
			if ($i != 0 ) {
				$query_insert .= ", ";
				
			}
		}

		
		if ($col_names[$i] == "image"){
			// This is for image
			if (isset($_FILES["image"])){
				$query_insert .=  $col_names[$i] . " = '" . $target_dir . $_FILES["image"]["name"] . "'";
			} else{
				$query_insert .= $col_names[$i] . " = '"  . 'None' . "'";
			}

		}else{
			$query_insert .= $col_names[$i] . " = '"  . $_POST[$col_names[$i]] . "'";
		}

		if ($i == ( $fl_length - 1)) {
			$query_insert .= " ";
		}
	}

	$query_insert3 = $query_insert . " WHERE id = " . $given_id;

	return $query_insert3;
}

function delete_row_entry_table($table_name, $col_name, $given_id){
	$query = "DELETE FROM " . $table_name . " WHERE " . $col_name . " = " . $given_id;
	return $query;
}

// validation
	

function validation_register($table_name, $column_name, $connection, $pos_message = 'Valid', $neg_message  = 'Not Valid') {

	$inputs = convert_sql_out_to_array(load_db_single_table($table_name, $connection), $column_name);

	if (isset($_POST[$column_name])) {

		if (!empty($_POST[$column_name])) {
		
			if (in_array($_POST[$column_name], $inputs)) {
				echo ' <span class="red-message">'. $neg_message .' </span>';
			} else {
				echo ' <span class="green-message">'.$pos_message .'</span>';
			}
		} else {
		 // None
		}
	}

}

// CART

function editCartItems($cart_items, $items_array){
	/*
	$connection : connection to db
	$cart_items : session
	$items_array: array of items
	*/

	if (empty($cart_items)) {
		// echo "<h3>Your Cart is Empty</h3>";
		$total_1 = 0;
	} else {

		$array_subtotal = array();

		foreach ($cart_items as $item_id => $item_quantity) {												
			extract($items_array[$item_id]);

			echo'
			<tr>
				<td>
					<a href="item.php?id='.$id.'">
						<img class="cart-image img-responsive" src="'. $image .'">
					</a>
				</td>
				<td class="td-cart-description"><a href="item.php?id='.$id.'">'.$product_name.'</a></td>
				<td><span>&#8369</span> '.$price.'</td>
				<td>
					<!--<div class=container-fluid>-->
					<!--<button class="btn btn-default btn-sm btnOps" onclick="minusQuantity('. $id . ')" value="-"><i class="fa glyphicon glyphicon-minus"></i></button>-->

					<input type="number" class="text-center cartQuantity" id="'. $id .'" value="'.$item_quantity.'" min="1">

					<!--<button class="btn btn-default btn-sm btnOps" onclick="addQuantity('. $id . ')" value="+"><i class="fa glyphicon glyphicon-plus"></i></button>-->
					<!--</div>-->

				</td>
				<td><span>&#8369</span> <span class="cartQuantity'.$id.'">'. number_format($item_quantity * $price, 2) .'</span></td>
				<td>
					<!--<button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>-->
					<button class="btn btn-danger btn-sm" onclick="delItem('. $id . ')"><i class="fa glyphicon glyphicon-remove"></i></button>
				</td>
			</tr>';

			$subtotal = $price * $item_quantity;
			$array_subtotal[] = $subtotal;
			$total_1 = array_sum($array_subtotal);
		}
	}

	
	return $total_1;
}

function displayTotalCart1(){
	// if (isset($_SESSION['total_1'])){
	// 	echo '<strong><span>&#8369</span> '. $_SESSION['total_1'];
	// } 
	if (isset($_SESSION['total_1'])) {
		echo number_format($_SESSION['total_1'], 2);

	} else {
		echo '0.00';
	}
	
	//return $_SESSION['total_1']
}

// Checkout

function summaryCartItems($cart_items, $items_array){
	/*
	$connection : connection to db
	$cart_items : session
	$items_array: array of items
	*/

	if (empty($cart_items)) {
		echo "<h3>Your Cart is Empty</h3>";
		$total_1 = 0;
	} else {

		$array_subtotal = array();

		foreach ($cart_items as $item_id => $item_quantity) {												
			extract($items_array[$item_id]);
			echo '
			<tr>
				<td>'. $product_name .'</td>
				<td><span>&#8369</span> '. number_format($price, 2) .'</td>
				<td>'. $item_quantity .'</td>
				<td><span>&#8369</span> '. number_format($item_quantity * $price, 2) .'</td>
			</td>';
		}
	}
}


// MISC

function reference_generator($date){
	$ref_number = '';

	$source = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n' ,'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
	for ($i=1; $i < 7; $i++) {
		$index = rand(0, 25);

		$ref_number = $ref_number . $source[$index];
	}
	$out = $date . $ref_number;
	$out = str_shuffle($out);
	return $out;
}

function check_user(){
	if (isset($_SESSION['current_user'])) {
		echo '<h1> Welcome '. $_SESSION['current_user'] .'</h1>';
		echo '<hr>';
		echo '<h3>' . $_SESSION['role']. '!</h3>';
		echo '<hr>';
		echo '<span>'. $_SESSION['date_log'] . '</span>';
		if (isset($_SESSION["cart"])){
			echo '<hr>';
			// echo '<span>'. $_SESSION['cart'] . '</span>';
		}
	}
}
?>