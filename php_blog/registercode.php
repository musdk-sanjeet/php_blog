<?php
session_start();
include('admin/config/dbcon.php'); 

if(isset($_POST['register_button']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $conform_password=mysqli_real_escape_string($con,$_POST['cpassword']);

    if($password == $conform_password)
    {
        // Check Email is register or not
        $checkemail="SELECT email FROM users where email='$email'";
        $checkemail_run=mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run))

        {
            // Already email exits
        $_SESSION['message']="Already email exits";
        header("Location: register.php");
        exit(0);


        }
        else
        {
            $user_query="INSERT INTO users(fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
            $user_query_run=mysqli_query($con,$user_query);

            if($user_query_run)
            {
                $_SESSION['message']="Register Successfully";
                header("Location: login.php");
                exit(0);   
            }
            else
            {
             $_SESSION['message']="Something went wrong";
            header("Location: register.php");
            exit(0);
                }

        }

    }
    else
    {
        $_SESSION['message']="Password and Conform Password does not match";
        header("Location: register.php");
        exit(0);
    }

}
else
{
    header("Location: register.php");
    exit(0);
}


?>