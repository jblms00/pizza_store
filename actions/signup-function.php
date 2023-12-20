<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

    $data = [];
	$data['status'] = '';

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = base64_encode($_POST['password']);
		$confirm_password = $_POST['password'];
		
		if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {

			//if true, inputs will be saved in database.
			$sql_email = "select * from users where email = '$email'";
			$resu_email = mysqli_query($con, $sql_email) or die (mysqli_error($con));

			//password format validation
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);	

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['status'] = "error";
                $data['message'] = "Invalid email format";
			}

			// check if email is in used or not
			else if(mysqli_num_rows($resu_email) > 0) {
                $data['status'] = "error";
                $data['message'] = "Email already used!";
			}

			// password is combination of 1 uppercase letter, 1 number, and 1 special character
			else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $data['status'] = "error";
                $data['message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            }

			// check if passsword match correctly
			else if($_POST['password'] !== $_POST['confirm_password']) {;
                $data['status'] = "error";
                $data['message'] = "Password doesn't match!";
			}

			else {
				$query = "INSERT INTO users (user_type, first_name, last_name, email , password, user_status) values ('user', '$first_name', '$last_name', '$email', '$password', 'Active')";
				mysqli_query($con, $query);
                $data['status'] = "sucess";
                $data['message'] = "Account created!";
			}
		}

		else {
            $data['status'] = "error";
            $data['message'] = "Please enter some information!";
		}
	}

echo json_encode($data);