<?php

session_start();



if($_SESSION["role"] != 'admin'){
	header ('location: index.php');
}


function getTitle(){
	echo 'Admin';
}

require '../connect.php';
require '../myfunctions.php';

// 		Load Users, Orders, Items,
$users_array = convert_sql_out_to_array(load_db_single_table("users", $conn));

$orders_array = convert_sql_out_to_array(load_db_single_table("orders", $conn));

$items_array = convert_sql_out_to_array(load_db_single_table("items", $conn));

mysqli_close($conn);

include 'partials/head.php';
?>
</head>
<body>

	<div id="mySidenav" class="sidenav">
		<nav>
			<ul id="list">
				<li class="option active" id="home_">
					<a href="#">
						<span><i class="fa fa-home"></i></span><span>Home</span>
					</a>
				</li>
				<li class="option" id="users_">
					<a href="#">
						<span><i class="fa fa-user"></i></span><span>Users</span>
					</a>
				</li>
				<li class="option" id="orders_">
					<a href="#">
						<span><i class="fa fa-power-off"></i></span><span>Orders</span>
					</a>
				</li>
				<li class="option" id="items_">
					<a href="#">
						<span><i class="fa fa-dropbox"></i></span><span>Items</span>
					</a>
				</li>
				<li class="option" id="logout">
					<a href="logout.php">
						<span><i class="fa fa-power-off"></i></span><span>Logout</span>
					</a>
				</li>
			</ul>
			
		</nav>
	</div><!-- sidenav -->

	
	<div class="main-content">
		
		<div id="myTopnav" class="topnav">
			<p>Welcome <strong><?php echo $_SESSION["admin_name"];?></strong></p>
		</div>

		<div class="container-fluid home_section" id="section">
		<div class="sub-main-content">
			<h3><span></span><span></span>Home</h3>

		</div>
		</div>

		<div class="container-fluid users_section" id="section" style="display: none;">
		<div class="sub-main-content col-lg-10 container-fluid">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Users</h3>
				</div>
				<div class="panel-body">


					<table class="table table-responsive table-striped">
						<thead>
							<?php
							$users_col = array ('username', 'first_name', 'last_name' ,'email', 'delivery_address', 'location_id', 'role_id');

							$users_col1 = array ('User name', 'First Name', 'Last Name' ,'Email', 'Location', 'Role');
							?>
							<tr>
								<th>#</th>
								<?php
							
								foreach ($users_col1 as $key => $value) {
									echo '<th>'.$value.'</th>';
								}
								?>
								<th>Action</th>
							</tr>

						</thead>
						<?php
						//var_dump($orders_array);
						// foreach($orders_array  as $key => $value){
						// 	var_dump($value['id']);
						// 	echo '<br>';
						// 	echo '<br>';
						// }

						?>
						<tbody>
							<?php
							require '../connect.php';



							if (empty($users_array)) {
								echo '<tr><td><h3>Users Table is Empty. 
								</h3></td></tr>';
							} else {
								$ctr = 0;
								foreach($users_array as $value1){
									$ctr = $ctr + 1;
									echo'
									<tr>
										<td>'. $ctr.'</td>
										<td>'. $value1['username'] .'</td>
										<td>'. $value1['first_name'] .'</td>
										<td>'. $value1['last_name'] .'</td>
										<td>'. $value1['email'] .'</td>
										<td>'. $value1['location_id'] .'</td>
										<td>'. $value1['role_id'] .'</td>
										<td>

											<button type="button" class="editUsers btn btn-sm btn-success" data-toggle="modal" data-target="#editUsersModal" data-index="'.$value1["id"].'"><span class="fa fa-edit"></span></button>
											<button type="button" class="deleteUsers btn btn-sm btn-danger" data-index="'.$value1["id"].'" data-toggle="modal" data-target="#deleteUsersModal"><span class="fa fa-trash"></span></button>

										</td>
										
									</tr>';
								}
							}

							mysqli_close($conn);

							?>
							
							
						</tbody>
					</table>
				</div><!-- panel-body -->
			</div><!-- panel -->
		</div><!-- sub-main-content -->
		</div>

		<div class="container-fluid orders_section" id="section" style="display: none;">
		<div class="sub-main-content col-lg-10 container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Orders</h3>
				</div>
				<div class="panel-body">

					<table class="table table-responsive table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Reference Number</th>
								<th>Transaction Date & time</th>
								<th>Total Amount</th>
								<th>Payment Status</th>
								<th>Order Status</th>
								<th>Action</th>
							</tr>

						</thead>
						<tbody>
							<?php
							require '../connect.php';

							if (empty($orders_array)) {
								echo '<tr><td><h3>Orders Table is Empty. 
								</h3></td></tr>';
							} else{
								$ctr=0;
								foreach ($orders_array as $key1 => $value1) {
									$ctr = $ctr + 1;
									// $ps_id = load_row_given_unique_value_array($conn, "payment_statuses", "id", $value1["payment_status_id"], "payment_status_name");
									// $ds_id = load_row_given_unique_value_array($conn, "delivery_statuses", "id", $value1["delivery_status_id"], "delivery_status_name");

									// var_dump($ps_id);
									// var_dump($ds_id);
									// exit;
									echo ' 
									<tr>
										<td>'. $ctr .'</td>
										<td>'. $value1["reference_number"] .'</td>
										<td>'. $value1[ "transaction_date"].'</td>
										<td>'. $value1["total"].'</td>
										<td>'. $value1["payment_status_id"] .'</td>
										<td>'. $value1["delivery_status_id"] .'</td>
										<td>
											
											<button type="button" class="editOrders btn btn-sm btn-success" data-toggle="modal" data-target="#editOrdersModal" data-index="'.$value1["id"].'"><span class="fa fa-edit"></span></button>
											<button style="display: none;" type="button" class="deleteOrders btn btn-sm btn-warning" data-index="'.$value1["id"].'" data-toggle="modal" data-target="#deleteOrdersModal"><span class="fa fa-trash"></span></button>
										
										</td>
									</tr>';

									// <td>'. $ps_id[0]["payment_status_name"] .'</td>
									// 	<td>'. $ds_id[0]["delivery_status_name"] .'</td>
								}
								
							}

							mysqli_close($conn);

							?>

							
						</tbody>
					</table>
				</div><!-- panel-body -->
			</div><!-- panel -->
		</div><!-- sub-main-content col-lg-10 container-fluid orders-->
		</div>

		<div class="container-fluid items_section" id="section" style="display: none;">
		<div class="sub-main-content col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Options</h3>
				</div>
				<div class="panel-body">
					<button type="button" class="createItem btn btn-info btn-lg" data-toggle="modal" data-target="#createItemModal">Add New Item <span class="fa fa-plus-square"></span></button>
				</div><!-- panel-body -->
			</div><!-- panel -->
		</div>
		
		<div class="sub-main-content col-lg-9 container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Items</h3>
				</div>
				<div class="panel-body">

					<table class="table table-responsive table-striped">
						<thead>
							<?php
							$users_col = array ('product_name', 'brand_id', 'product_category_id', 'product_collection_id', 'price' ,'stock');

							$users_col1 = array ('Product Name', 'Brand', 'Category', 'Collection','Price' ,'Stock');
							?>
							<tr>
								<th>#</th>
								<?php
							
								foreach ($users_col1 as $key => $value) {
									echo '<th>'.$value.'</th>';
								}
								?>
								<th>Action</th>
							</tr>

						</thead>
						<tbody>
							<?php
							require '../connect.php';

							if (empty($items_array)) {
								echo '<tr><td><h3>Items Table is Empty. 
								</h3></td></tr>';
							} else{

								$ctr = 0;
								foreach ($items_array as $key1 => $value1) {
									$ctr = $ctr + 1;
									echo ' 
									<tr>
										<td>'. $ctr .'</td>
										<td>'. $value1["product_name"] .'</td>
										<td>'. $value1["brand_id"] .'</td>
										<td>'. $value1["product_category_id"] .'</td>
										<td>'. $value1["product_collection_id"] .'</td>
										<td>'. $value1[ "price"].'</td>
										<td>'. $value1["stock"].'</td>
							
										<td>
											<button type="button" class="editItems btn btn-sm btn-success" data-toggle="modal" data-target="#editItemModal" data-index="'.$value1["id"].'"><span class="fa fa-edit"></span></button>
											<button type="button" class="deleteItem btn btn-sm btn-danger" data-index="'.$value1["id"].'" data-toggle="modal" data-target="#deleteItemModal"><span class="fa fa-trash"></span></button>
										</td>


			
									</tr>';
									
								}
								
							}

							mysqli_close($conn);

							?>
							
						</tbody>
					</table>
				</div><!-- panel-body -->
			</div><!-- panel -->
		</div><!-- sub-main-content items -->
		
		</div>
	</div><!-- main-content -->

<?php include 'partials/modals.php'; ?>
<?php include 'partials/foot.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){

		// CHANGE ACTIVE STATUS IN SIDEBAR
		$(document).on('click',"#list li", function(){
			$("."+ this.id + "section").show().siblings("#section").hide();

			var options = document.querySelectorAll(".option");
			options.forEach(function(value,key){
				value.classList.remove('active');
			});
			this.classList.toggle('active');
		});

		$(".createItem").on("click", function(){
			$.post("assets/create_new_item.php",
				{},
				function(data, status){
					$("#createItemModalBody").html(data);
				});
		});
	

		// CONTAINS INPUTS FOR #editItemModalBody
		$(".editItems, .editOrders, .editUsers").click(function(){
			var itemId = $(this).data('index');
			// var target = $(this).data('target');
			var class_indicator = $(this).attr('class').split(' ')[0];
			// console.log(class_indicator);
			if ( class_indicator == "editItems") {
				$.post("assets/edit_item.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editItemModalBody').html(data);
				});
			} else if (class_indicator == "editOrders") {
				$.post('assets/edit_orders.php',
					{
						id: itemId
					},
					function(data,status){
						$('#editOrdersModalBody').html(data);
					});
			} else if (class_indicator == "editUsers"){
				$.post('assets/edit_users.php',
					{
						id: itemId
					},
					function(data,status){
						$('#editUsersModalBody').html(data);
					});
			};
		});

		// CONTAINS INPUTS FOR #deleteItemModalBody
		$('.deleteItem, .deleteOrders, .deleteUsers').on('click', function () {
			var itemID = $(this).data('index');
			var class_indicator = $(this).attr('class').split(' ')[0];
			// console.log(class_indicator);
			if ( class_indicator == "deleteItem") {
				$.post('assets/del_item_catalog.php',
					{
						id: itemID
					},
					function(data, status) {
						console.log("hello from delItem");
						$('#deleteItemModalBody').html(data);
				});
			} else if (class_indicator == "deleteOrders") {
				$.post('assets/del_orders.php',
					{
						id: itemID
					},
					function(data, status) {
						$('#deleteOrdersModalBody').html(data);
				});
			} else if (class_indicator == "deleteUsers"){
				$.post('assets/del_users.php',
					{
						id: itemID
					},
					function(data, status) {
						$('#deleteUsersModalBody').html(data);
				});
			};
		});

	});

</script>
</body>
</html>
