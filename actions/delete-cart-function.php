<?php
	include("database-connect.php");
	
	if(ISSET($_POST['delete'])){

		$cart_id = $_POST['cart_id'];
		$query = "DELETE FROM `user_cart` WHERE `cart_id` = '$cart_id'";
        mysqli_query($con, $query) or die(mysqli_error());
		
		header("Location: ../user-cart-page.php");
	}