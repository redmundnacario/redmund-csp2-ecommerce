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

	

	<main class="wrapper container-fluid wrapper-login container-fluid">
		<h1>About Us</h1>
		<div class="login-ads col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<p>Honeyken is an online make-up store. We offer products with brands such as:</p>
			<div class="brand-banner-div container-fluid">
				<img class="brand-banner-img img-responsive" src="./assets/img/product/ELF/elf.jpg">
				<img class="brand-banner-img img-responsive" src="./assets/img/product/Colourpop/colourpop.jpg">
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