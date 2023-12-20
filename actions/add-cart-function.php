<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$product_id 	= $_POST['product_id'];
		$product_name	= $_POST['product_name'];
		$product_price	= $_POST['product_price'];
		$product_image	= $_POST['product_image'];
		$user_email		= $_POST['user_email'];
        
		if (!empty($product_id) && !empty($product_name)) {

			$query = "INSERT INTO `user_cart`(`product_id`, `product_name`, `product_price`, `product_image`, `user_email`) VALUES ('$product_id','$product_name','$product_price','$product_image','$user_email')";
			mysqli_query($con, $query);

			header("Location: ../user-menu-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}