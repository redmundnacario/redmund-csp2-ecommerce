<?php
$thisPage = "home.php";
session_start();



function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

include 'partials/head.php';

?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	

	<main class="wrapper container-fluid wrapper-contact container-fluid">

		<form method="POST" action="assets/authenticate.php" class="form-contact col-lg-6 col-md-6 col-sm-12 col-xs-12">

			<div class="contact">
				<h3>Contact Us</h3>

				<!-- <label for="username">Username</label> -->
				<input type="text" name="fullname" id="fullname" class="" placeholder="Fullname" required>

				<input type="email" name="email" id="email" class="" placeholder="Email" required>

				<textarea class="contact-textarea" name="description" placeholder="Input your message here"></textarea required>

				

				<input type="submit" name="submit" id="submit" value="Submit" class="button-contact">
				<!-- placeholder="Enter your username" -->

			</div>
		</form>
	</main>


	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

</body>
</html>