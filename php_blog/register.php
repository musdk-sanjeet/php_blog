<?php
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
       <div class="col-md-5">

        <?php include('message.php'); ?>

       <div class="card">
        <div class="card-header">
            <h4>Register</h4>
            <div class="card-body">
                <form action="registercode.php" method="post">
            <div class="form-group mb-3">
                    <label>First Name</label>
                    <input required type="text" name="fname" placeholder="First_Name" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input required type="text" name="lname" placeholder="Last_Name" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label>Email id</label>
                    <input required type="email" name="email" placeholder="Email Address" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input required type="password" name="password" placeholder="Enter Password" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label>Conform Password</label>
                    <input required type="password" name="cpassword" placeholder="Enter Conform Password" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="register_button" class="btn btn-primary">Register Now</button>
                </div>
                </form>
            </div>
            </div>
        </div>
       </div> 

       </div> 
    </div>
</div>





<?php
include('includes/footer.php');
?>