<?php
	session_start();

	include("database-connect.php");
	include("functions.php");

	$data = [];
	$data['status'] = '';

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$user_data = array();
		$user_account = $_POST['user_account'];
		$password = base64_encode($_POST['password']);

		$query = "select * from users where email = '$user_account' AND password = '$password' AND user_status = 'Active'";
		$query_result = mysqli_query($con, $query);
		$user_data = mysqli_fetch_assoc($query_result);
		
		if(!empty($user_data) ){
			$user_type = $user_data['user_type'];
			$status = $user_data['user_status'];
		}

		if($query_result && mysqli_num_rows($query_result) > 0) {
			if($user_data['password'] === $password) {
				$_SESSION['email'] = $user_data['email'];

				if( $user_type == 'user') {

					if($status == 'Active'){
						$data['status'] = "user";
						$data['message'] = "User Login Successfully!";
					}
				}

				if($user_type == 'admin'){
					$data['status'] = "admin";
					$data['message'] = "Admin Login Successfully!";
				}
			}

			else {
				$data['status'] = "error";
				$data['message'] = "Account doesn't exist!";
				
			}
		}

		else{
			$data['status'] = "error";
			$data['message'] = "Wrong email or password!";
		}
	}

echo json_encode($data);