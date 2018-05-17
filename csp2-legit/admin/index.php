<?php

session_start();

require '../assets/class/class.php';

if (isset($_SESSION["current_user"])) {
	header('location: ../index.php');
}


function getTitle(){
	echo 'Admin';
}

include 'partials/head.php';
?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 col-centered vertical-center">
				<div class="panel panel-default">
					
					<div class="panel-heading btn-pink"><h1>Admin</h1></div>

					<div class="panel-body">


						<form method="post" id="login_admin" action="assets/authenticate.php">
							<div class="form-group">
								<label for="username">Username</label>
								<div class="input-group">
									<!-- <div class="input-group-addon">
										
									</div> -->
								</div> <!-- input-group -->

								<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<div class="input-group">
									<!-- <div class="input-group-addon">
										
									</div> -->
								</div> <!-- input-group -->

								<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
							</div>

							<button type="submit" name="login" class="btn btn-pink">Sign in</button>
							
						</form> <!-- login_admin -->
						
						

						<?php
						if (FlashMessage::isset("danger")){
							# code...
							echo '
							<br>
							<div class="alert alert-danger">
								<strong></strong> '. FlashMessage::render("danger") .'
							</div>';
						}
						
						?>

						<div>
							<p class="pull-right">Go to <a href="../index.php">Homepage</a></p>
						</div>

					</div><!-- panel-body -->

				</div> <!-- panel -->
			</div> <!-- col-centered -->
		</div> <!-- row -->
	</div> <!-- container -->


<?php include 'partials/foot.php'; ?>
</body>
</html>