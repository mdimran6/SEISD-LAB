<?php 
	session_start();

	$username = "";
	$email    = "";
	$phone	= "";
	$code	= "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$db = mysqli_connect('localhost', 'root', '', 'dbms');

$imran1="CREATE TABLE users1 (
username varchar(255),
email varchar(255),
phone varchar(255),
code varchar(255),
password varchar(255)
)";
if(mysqli_query($db,$imran1)) {
echo"New table created successfully";
}




	// REGISTER USER
	if (isset($_POST['reg_user'])) {

		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$code = mysqli_real_escape_string($db, $_POST['code']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($phone)) { array_push($errors, "phone number is required"); }
		if (empty($code)) { array_push($errors, "code is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if ($code=='5555') {
		if (count($errors) == 0) {
			$password = $password_1;
			$query = "INSERT INTO users1 (username, email, phone, code, password) 
					  VALUES('$username', '$email', '$phone', '$code','$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: ADMIN.html');
		}
}
	}

	// ... 

	// LOGIN USER
	if (isset($_POST['submit'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = $password;
			$query = "SELECT * FROM users1 WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: ADMIN.html');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}


?>