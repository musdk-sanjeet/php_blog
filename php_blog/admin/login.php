<?php
session_start();
if(isset($_SESSION['auth']))
{

    if(!isset($_SESSION['auth']))
    {
    $_SESSION['message']="You are already loged in ";
    header("Location: logout.php");  
    }

    
    $_SESSION['message']="You are already loged in ";
    header('Location: index.php');
    exit(0);
}

?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
       <div class="col-md-5">
       <div class="card">
        <div class="card-header">
            <h4>Login</h4>
            <div class="card-body">
                <form action="logincode.php" method="post">
                <div class="form-group mb-3">
                    <label>Email id</label>
                    <input type="email" name="email" required placeholder="Email Address" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Enter Password" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="login_btn" required class="btn btn-primary">Login</button>
                </div>
                </form>
            </div>
            </div>
        </div>
       </div> 

       </div> 
    </div>
</div>





