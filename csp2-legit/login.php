<?php
function getTitle(){
	echo 'Login';
}
session_start();

include 'partials/head.php';

?>

</head>
<body class="container-fluid">
	<!-- main header -->

	<?php 
	include 'partials/main_header.php';
	include 'partials/notification_bar.php';
	?>


	<main class="wrapper container-fluid wrapper-login container-fluid">

		<div class="login-div div-center">


			<div class="container col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="login-ads text-center">
					
					<h1 class="">Experience shopping for your favorite make-up products <strong style="color:#58dffc;">online</strong></h1>

					<p>Honeyken is an online make-up store. We offer products with brands such as:</p>
					<div class="brand-banner-div container-fluid">
						<img class="brand-banner-img img-responsive" src="./assets/img/product/ELF/elf.jpg">
						<img class="brand-banner-img img-responsive" src="./assets/img/product/Colourpop/colourpop.jpg">
					</div>
					
				</div>
			</div>


			<div class="container col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<form method="POST" action="assets/authenticate.php" class="div-center form-login">

					<div class="login">
						<h3>Login</h3>

						<!-- <label for="username">Username</label> -->
						<input type="text" name="username" id="userName" class="entry" placeholder="Username" required>

						<!-- <label for="password">Password</label> -->
						<input type="password" name="password" id="passWord"  class="entry" placeholder="Password" required>

						<input type="submit" name="submit" id="submit" value="Login" class="button-login">
						<!-- placeholder="Enter your username" -->

						<p>New to Honeyken? <a href="register.php">Create an account</a></p>
					</div>
				</form>
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