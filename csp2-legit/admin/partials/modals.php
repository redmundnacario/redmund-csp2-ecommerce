	<!-- ADD/crearte Modal item-->
	<div id="createItemModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<form method="POST" action="assets/add_item.php" enctype="multipart/form-data">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add New Item</h4>
					</div>

					<div class="modal-body" id='createItemModalBody'>
						<!-- <p id="out">Some text in the modal.</p> -->
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Add Item</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal item-->
	<div id="editItemModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<form method="POST" action="assets/update_item.php" enctype="multipart/form-data">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Item Details</h4>
					</div>

					<div class="modal-body" id='editItemModalBody'>
						<!-- <p id="out">Some text in the modal.</p> -->
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete ITEM Modal -->
	<div id="deleteItemModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<form method="POST" action="assets/delete_product.php">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Item</h4>
					</div>
					<div id="deleteItemModalBody" class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Edit Modal Orders-->
	<div id="editOrdersModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<form method="POST" action="assets/update_orders.php" enctype="multipart/form-data">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Order Details</h4>
					</div>

					<div class="modal-body" id='editOrdersModalBody'>
						<!-- <p id="out">Some text in the modal.</p> -->
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete ORDERS Modal -->
	<div id="deleteOrdersModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<form method="POST" action="assets/delete_orders.php">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Order</h4>
					</div>
					<div id="deleteOrdersModalBody" class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Edit Modal Users-->
	<div id="editUsersModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<form method="POST" action="assets/update_users.php" enctype="multipart/form-data">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit User Details</h4>
					</div>

					<div class="modal-body" id='editUsersModalBody'>
						<!-- <p id="out">Some text in the modal.</p> -->
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Users Modal -->
	<div id="deleteUsersModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<form method="POST" action="assets/delete_users.php">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete User</h4>
					</div>
					<div id="deleteUsersModalBody" class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</form>
		</div>
	</div>