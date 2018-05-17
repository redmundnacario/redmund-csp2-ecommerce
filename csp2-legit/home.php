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
	<?php 
	include 'partials/main_header.php';
	include 'partials/notification_bar.php';
	?>

	

	<main class="wrapper2 container-fluid">
		<!-- <h1>Home Page</h1> -->	
	<?php
		include 'partials/carousel_home.php';
	?>
		<!-- <div class="container-fluid">
			<img src="./assets/img/carousel/Honeyken.png">
		</div> -->

		<?php
		// check_user();
		?>

	</main>


	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

</body>
</html>