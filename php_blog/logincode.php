<?php 
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['login_btn']))
{
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$login_query="SELECT * FROM users WHERE email='$email' AND password='$password'";
	$login_query_run=mysqli_query($con,$login_query);
	$userData = mysqli_fetch_array($login_query_run);
	if(!empty($userData))
	{
		
		$_SESSION['auth'] = true;
		$_SESSION['auth_role']=$userData['role_as']; //1=admin, 0=users
		$_SESSION['user_id'] = $userData['id'];
		$_SESSION['user_name'] = $userData['fname'];
		$_SESSION['user_email'] = $email;
		
		if($userData['role_as'] == '1') //1=Admin
		{
			$_SESSION['message']="Welcome to Dashboard";
			header('Location: admin/index.php');
		    exit(0);
		}
		elseif($userData['role_as'] == '0') //0=User
		{
			$_SESSION['message']="You are loged in";
			header('Location: index.php');
			exit(0);
		}

	}
	else
	{
		$_SESSION['message']="Invalid email or password";
		header('Location: login.php');
		exit(0);

	}


}
else
{
	$_SESSION['message']="You are not allowed to access this file";
	header('Location: login.php');
	exit(0);
}

?>