<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$order_id   = $_POST['order_id'];
		$order_status = $_POST['order_status'];

		if (!empty($order_id) && !empty($order_status)) {
			
			$query = "UPDATE `user_order` SET `order_status`= '$order_status' WHERE order_id = '$order_id'";
			mysqli_query($con, $query);

			header("Location: ../admin-orders-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}