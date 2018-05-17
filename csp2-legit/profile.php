<?php

require 'connect.php';
require 'myfunctions.php';

session_start();


if (!isset($_SESSION['current_user'])){
	header('location: index.php');
}

function getTitle(){
	echo 'Profile';
}

# load userarray
$users_array = convert_sql_out_to_array(load_db_single_table("users", $conn));
$target_user = load_row_given_unique_value($conn, "users", "username", $_SESSION["current_user"]);
$target_user = convert_sql_out_to_array_b($target_user)[0];

// var_dump($target[0]);
// exit();

# get array info given current username 




include 'partials/head.php';

?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	<main class="wrapper container-fluid">

		<div class="profile div-shrink-80 div-center">

		<div class="container col-lg-9 col-md-9 col-sm-12 col-xs-12 text-center">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1>Account Details</h1>
				</div>

				<div class="panel-body">
					<table class="table-responsive table-condensed table-hover">
						<tbody class="item-table-item">
							<tr>
								<th>User Name</th>
								<td><?php echo $target_user["username"]; ?></td>
							</tr>
							<tr>
								<th>First Name</th>
								<td><?php echo $target_user["first_name"]; ?></td>
							</tr>
							<tr>
								<th>Last Name</th>
								<td><?php echo $target_user["last_name"]; ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $target_user["email"]; ?></td>
							</tr>
							<tr>
								<th>location ID</th>
								<td><?php echo $target_user["location_id"]; ?></td>
							</tr>

							<tr>
								<th>Delivery Address</th>
								<td><?php echo $target_user["delivery_address"]; ?></td>
							</tr>

							<tr>
								<th>House or Building #</th>
								<td><?php echo $target_user["bh_no"]; ?></td>
							</tr>

							<tr>
								<th>Street or Road</th>
								<td><?php echo $target_user["street"]; ?></td>
							</tr>

							<tr>
								<th>Barangay</th>
								<td><?php echo $target_user["barangay"]; ?></td>
							</tr>

							<tr>
								<th>City or Municipality</th>
								<td><?php echo $target_user["city_mun"]; ?></td>
							</tr>

							<tr>
								<th>Province</th>
								<td><?php echo $target_user["province"]; ?></td>
							</tr>

							<tr>
								<th>Region Name</th>
								<td><?php echo $target_user["region_name"]; ?></td>
							</tr>
							<tr>
								<th>Cellphone Number</th>
								<td><?php echo $target_user["cellphone_number"]; ?></td>
							</tr>

							<tr>
								<th>Telephone Number</th>
								<td><?php echo $target_user["telephone_number"]; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		
		</div>



		<div class="container col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Settings</h4>
				</div>

				<div class="panel-body">
					<div >
						<button class=" form-control" id="editAccount" data-toggle="modal" data-target="#editAccountModal" data-index=<?php echo $target_user["id"]; ?>>
							Account Name
						</button>
					</div>
					<div >
						<button class=" form-control" id="editEmailPassword" data-toggle="modal" data-target="#editEmailPasswordModal" data-index=<?php echo $target_user["id"]; ?>>
							Credentials
						</button>
					</div>
					
					<button class=" form-control" id="editUserLocation" data-toggle="modal" data-target="#editUserLocationModal" data-index=<?php echo $target_user["id"]; ?>>
							Delivery Address
						</button>

					<button class=" form-control" id="editContact" data-toggle="modal" data-target="#editContactModal" data-index=<?php echo $target_user["id"]; ?>>
							Contact Details
						</button>

					<button class=" form-control" id="deleteAccount" data-toggle="modal" data-target="#deleteAccountModal" data-index=<?php echo $target_user["id"]; ?>>
							Delete Account
						</button>

				</div>
			
			</div>
		</div>
		</div>
	</main>

	<div id="editAccountModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/update_account.php" enctype="multipart/form-data">


						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Account Name Details</h4>
						</div>

				      	<div class="modal-body" id='editAccountBody'>
				        <!-- <p id="out">Some text in the modal.</p> -->
				      	</div>


				      	<div class="modal-footer">

				      		<button type="submit" class="btn btn-success">Save</button>

				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      
				      	</div>
			     </form>
			</div>
		</div>
	</div>

	<div id="editEmailPasswordModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/update_email_password.php" enctype="multipart/form-data">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Credentials</h4>
						</div>

				      	<div class="modal-body" id='editEmailPasswordBody'>
				        <!-- <p id="out">Some text in the modal.</p> -->
				      	</div>


				      	<div class="modal-footer">

				      		<button type="" class="btn btn-success">Save</button>

				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      
				      	</div>
			     </form>
			</div>
		</div>
	</div>

	<div id="editUserLocationModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/update_user_location.php" enctype="multipart/form-data">

			      		

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Delivery Address</h4>
						</div>

				      	<div class="modal-body" id='editUserLocationBody'>
				        <!-- <p id="out">Some text in the modal.</p> -->
				      	</div>


				      	<div class="modal-footer">

				      		<button type="submit" class="btn btn-success">Save</button>

				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      
				      	</div>
			     </form>
			</div>
		</div>
	</div>

	<div id="editContactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/update_user_contact.php" enctype="multipart/form-data">

			      		

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Contact Details</h4>
						</div>

				      	<div class="modal-body" id='editContactBody'>
				        <!-- <p id="out">Some text in the modal.</p> -->
				      	</div>


				      	<div class="modal-footer">

				      		<button type="submit" class="btn btn-success">Save</button>

				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      
				      	</div>
			     </form>
			</div>
		</div>
	</div>

	<div id="deleteAccountModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    
		    	
			    <div class="modal-content">

			      <form method="POST" action="assets/delete_account.php" enctype="multipart/form-data">

			      		<input type="number" name="id" value=<?php echo $target_user["id"];?> hidden>

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Delete Account</h4>
						</div>

				      	<div class="modal-body" id=''>
				      		Are you sure you want to delete your account?
				      	</div>


				      	<div class="modal-footer">

				      		<button type="submit" class="btn btn-danger">Yes</button>

				        	<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
				      
				      	</div>
			     </form>
			</div>
		</div>
	</div>


	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>


<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>


</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#editUserLocation").click(function(){
			var itemId = $(this).data('index');

			$.get("assets/edit_user_location.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editUserLocationBody').html(data);
			});
		});

		$("#editAccount").click(function(){
			var itemId = $(this).data('index');

			$.get("assets/edit_account.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editAccountBody').html(data);
			});
		});

		$("#editEmailPassword").click(function(){
			var itemId = $(this).data('index');

			$.get("assets/edit_email_password.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editEmailPasswordBody').html(data);
			});
		});

		$("#editContact").click(function(){
			var itemId = $(this).data('index');

			$.get("assets/edit_user_contact.php",
					{
					id: itemId
					},
					function(data,status){
						$('#editContactBody').html(data);
			});
		});

	});
</script>
</html>