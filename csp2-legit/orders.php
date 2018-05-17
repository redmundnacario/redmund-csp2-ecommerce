<?php

session_start();

if (!isset($_SESSION['current_user'])){
	header('location: index.php');
}

function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

include 'partials/head.php';

// load database
require 'connect.php';

// load functions php
require_once 'myfunctions.php';

// load needed tables

// Load columns in a 'orders' table
$orders_col = load_all_column_names_from_table("orders", $conn, "Field");
$orders_array = convert_sql_out_to_array(load_db_single_table("orders", $conn));

// LOAD user id
$row_users_info = load_row_given_unique_value($conn, "users", "username", $_SESSION["current_user"], 'id');
$row_users_info = convert_sql_out_to_array_b($row_users_info);
$user_id = $row_users_info[0]["id"];

// LOAD ORDERS entries
$row_orders_info = load_row_given_unique_value($conn, "orders", "user_id", $user_id, '*');
$row_orders_info = convert_sql_out_to_array_b($row_orders_info);


//var_dump($row_orders_info);


// Load Payment status and delivery status table
function load_row_given_unique_value_array($connection, $table_name, $column_name, $unique_value, $row_col_target = "*"){
	$row_info = load_row_given_unique_value($connection, $table_name, $column_name, $unique_value, $row_col_target );
	$row_info = convert_sql_out_to_array_b($row_info);
	return $row_info;
}



// SELECTED ORDER info
// $sel_orders_col_1 = array ("reference_number", "transaction_date", "total" , "payment_status_id", "delivery_status_id");

// $sel_orders_col_2 = array ("Reference Number", "Transaction Date & time", "Total Amount" , "Payment Status", "Order Status");
mysqli_close($conn);
?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	<main class="wrapper">

	<div class="panel-orders div-shrink-60 div-center">

		<div class="panel panel-info ">
			<div class="panel-heading">
				<h1 class="text-center">Orders History</h1>
			</div>
			<div class="panel-body">
			
		

				<table>
					<thead>
						<tr>
							<th>Reference Number</th>
							<th>Transaction Date & time</th>
							<th>Total Amount</th>
							<th>Payment Status</th>
							<th>Order Status</th>
						</tr>

					</thead>
					<tbody>
						<?php
						// load database
						require 'connect.php';

						// load functions php
						require_once 'myfunctions.php';

						if (empty($row_orders_info)) {
							echo '<tr><td><h3>Your Order History is Empty. <a href="catalog.php"><strong style="color:#58dffc;">Shop now!</strong></a>
							</h3></td></tr>';
						} else{
							foreach ($row_orders_info as $key1 => $value1) {
								$ps_id = load_row_given_unique_value_array($conn, "payment_statuses", "id", $value1["payment_status_id"], "payment_status_name");
								$ds_id = load_row_given_unique_value_array($conn, "delivery_statuses", "id", $value1["delivery_status_id"], "delivery_status_name");
								// var_dump($ps_id);
								// var_dump($ds_id);
								// exit;
								echo ' 
								<tr>
									<td>'. $value1["reference_number"] .'</td>
									<td>'. $value1[ "transaction_date"].'</td>
									<td>'. $value1["total"].'</td>
									<td>'. $ps_id[0]["payment_status_name"] .'</td>
									<td>'. $ds_id[0]["delivery_status_name"] .'</td>
								</tr>';
							}
							
						}

						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

</body>
</html>