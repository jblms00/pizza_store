<?php
// functions to check if you have a account already or not
function check_login($con){

	if(isset($_SESSION['email'])) {

		$id = $_SESSION['email'];
		$query = "select * from users where email = '$id'";

		//Read the results
		$result = mysqli_query($con,$query);

		if($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: ../index.php");
	die;
}