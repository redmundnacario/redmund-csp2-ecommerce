<div>
	<?php

	require 'assets/class/class.php';

	if (FlashMessage::isset("success")){
		# code...
		echo '
		<div class="alert alert-success">
			<strong></strong> '. FlashMessage::render("success") .'
		</div>';
	}

	if (FlashMessage::isset("danger")){
		# code...
		echo '
		<div class="alert alert-warning">
			<strong></strong> '. FlashMessage::render("danger") .'
		</div>';
	}

	?>
</div>