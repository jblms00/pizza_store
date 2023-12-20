<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$order_id   = $_POST['order_id'];

		if (!empty($order_id)) {
			
			$query = "UPDATE `user_order` SET `order_status`= 'Order Received' WHERE order_id = '$order_id'";
			mysqli_query($con, $query);

			header("Location: ../user-profile-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}