<?php

session_start();

// $_SESSION["time"] =

header('location: home.php');


function getTitle(){
	echo 'Welcome to Honeyken Coffee';
}

include 'partials/head.php';

?>

</head>
<body class="container-fluid">
	<!-- main header -->
	<?php include 'partials/main_header.php' ?>

	<main class="wrapper">
		<h1>Index Page</h1>
	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php' ?>

<!-- Link to Jquery, Bootstrap Javascript,& Javascripts -->
<?php
	include 'partials/foot.php';
?>

</body>
</html>