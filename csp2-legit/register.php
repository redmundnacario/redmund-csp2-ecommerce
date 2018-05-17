<?php

function getTitle(){
	echo 'Register';
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

	<main class="wrapper container-fluid">

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
				<form id="registerForm" method="POST" action="assets/registration.php" class="register-form">


					<div class="register">
						<h3>Register</h3>
						
						<label for="first_name">First name</label>
						<input type="text" name="first_name" id="firstName" class="" required>

						<label for="last_name">Last name</label>
						<input type="text" name="last_name" id="lastName" class="" required>

						<label for="username">Username<span class="span-username"></span></label>
						<input type="text" name="username" id="userName" class="" required>

						<label for="password">Password<span class="span-password"></span></label>
						<input type="password" name="password" id="passWord"  class="" placeholder="Enter your password" required>

						<label for="confirmpassword">Confirm Password<span class="span-confirmpassword"></span></label>
						<input type="password" name="confirmpassword" id="confirmPassword" placeholder="Re-type your password here"  class="" required>

						<label for="email">Email<span class="span-email"></span></label>
						<input type="email" name="email" id="email" class="" required>

						<input type="submit" name="submit" id="submit" value="Register" placeholder="Email" class="button-register">

						<!-- placeholder="Enter your username" -->
						<p>Already have an account? <a href="login.php">Log in here</a></p>
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

<script type="text/javascript">
	$('#userName').on('input' , function() {
		var username = $(this).val();

		$.post('assets/username_validation.php',
			{
				username : username
			},
			function(data,status){
				$('[class="span-username"]').html(data);
			});
	});

	$('#confirmPassword').on('input', function() {
		// console.log($('#password').val());
		// console.log($('#confirmPassword').val());

		var passwordText = $('#passWord').val();
		var confirmPasswordText = $('#confirmPassword').val();

		if (confirmPasswordText == '') {
			$('[for="confirmpassword"]').html('Confirm Password');
		} else {
			if (passwordText != '' || confirmPasswordText != '') {
				if (passwordText == confirmPasswordText) {
					// console.log('matched');
					$('[for="confirmpassword"]').html('Confirm Password <span class="green-message">matched</span>');
				} else {
					// console.log('mismatched');
					$('[for="confirmpassword"]').html('Confirm Password <span class="red-message">mismatched</span>');
				}
			} else {
				$('[for="confirmpassword"]').html('Confirm Password');	
			}
		}

		if (confirmPasswordText == '' && confirmPasswordText == '') {
			$('[for="confirmpassword"]').html('Confirm Password');
			$('[for="password"]').html('Password');

		}
	});

	$('#passWord').on('input', function() {
		// console.log($('#password').val());
		// console.log($('#confirmPassword').val());

		var passwordText = $('#passWord').val();
		var confirmPasswordText = $('#confirmPassword').val();

		if (passwordText == '' && confirmPasswordText != '' ) {
			$('[for="password"]').html('Password <span class="red-message">empty</span>');
			$('[for="confirmpassword"]').html('Confirm Password <span class="red-message">mismatched</span>');
		} else{
			if (passwordText == confirmPasswordText) {
				$('[for="password"]').html('Password');
			}
		}
	});

	$('#email').on('input', function() {
		var emailText = $(this).val();
		// console.log(usernameText);

		$.post('assets/email_validation.php',
			{ email: emailText },
			function(data, status) {
				// console.log('Processed: ' + data);
				$('[class="span-email"]').html(data);
			});
	});
</script>


</body>
</html>