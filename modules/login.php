<?php

if($_POST['action'] == "AuthUser")
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM users WHERE user_name = '".$user."'";
	$result = $mysqli -> query($sql);

	// Fetch  product info
	$user_details = $result -> fetch_array(MYSQLI_ASSOC);

	// Free result set
	$result -> free_result();
	
	if(!empty($user_details))
	{
		$user_authenticated = password_verify($pass,$user_details['password_hash']);

		if($user_authenticated == true)
		{
			// Initialize the session
			session_start();
			 
			// Unset all of the session variables
			$_SESSION['logged_in'] = true;
			$_SESSION['user_details'] = $user_details;

			header("Location: ./index.php?module=product_crud");	

			// print_r($_SESSION);

			// Destroy the session.
			// session_destroy();
		}
		else{
			$body->assign("error_message", "Error : Wrong password.");
		}
	}
	else{
		$body->assign("error_message", "Error : User not available.");
	}
	
}
elseif($_GET['action'] == "RegisterUser")
{
	$sql = "SELECT * FROM users WHERE user_name = '".$_GET['user']."'";
	$result = $mysqli -> query($sql);

	// Fetch  product info
	$user_details = $result -> fetch_array(MYSQLI_ASSOC);

	$result -> free_result();

	if(empty($user_details))
	{
		$hash = password_hash($_GET['password'], PASSWORD_DEFAULT);

		$query = "INSERT INTO users SET user_name = '".$_GET['user']."', password_hash = '".$hash."'";
		
		if($mysqli->query($query))
		{
			echo "User created";
		}
		else{
			echo "Error creating user.";
		}
	}
	else{
		echo "User name already existed";
	}
	

	//./index.php?module=login&action=RegisterUser&user=User&password=user123
}

// print_r($_SESSION);