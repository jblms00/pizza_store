<?php
	// Function to destroy or to logout your account
	session_start();

	if(session_destroy()) {
		header("Location: ../signin-page.php");
	}
?>