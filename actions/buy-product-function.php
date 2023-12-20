<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$product_id 	= $_POST['product_id'];
		$product_name	= $_POST['product_name'];
		$product_price	= $_POST['product_price'];
		$product_quantity	= $_POST['product_quantity'];
		$product_image	= $_POST['product_image'];
		$user_address		= $_POST['user_address'];
		$user_email		= $_POST['user_email'];

        $total_price = $product_price * $product_quantity;
        
		if (!empty($product_quantity) && !empty($user_address)) {

			$query = "INSERT INTO `user_order`(`product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`, `product_total_price`, `user_address`, `user_email`, `order_status`)
            VALUES ('$product_id','$product_name','$product_price','$product_quantity','$product_image','$total_price','$user_address','$user_email','Preparing')";

            if (mysqli_query($con, $query)) {
                $query = "DELETE FROM `user_cart` WHERE `product_id` = '$product_id'";
                mysqli_query($con, $query) or die(mysqli_error());
                
                header("Location: ../user-profile-page.php");
                die;
            }
		}

		else {
            $message = "Please enter some information!";
		}
	}