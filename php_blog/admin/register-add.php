<?php
include ('authentication.php');
include('includes/header.php');


?>
<div class="container-fluid px-4">
    <div class="row mt-4">
    	<div class="col-md-12">

            <div class="card">
    		  <div class="card-header"><h4>Add Admin/User</h4></div>
    		  <div class="card-body">

               <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" required class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" required class="form-control">
                        </div>

                       <div class="col-md-6 mb-3">
                            <label for="">Email Address </label>
                            <input type="email" name="email" required class="form-control">
                        </div> 

                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Role as</label>
                            <select name="role_as" required class="form-control">
                            <option value="">----Select One ----</option>
                            <option value="1" >Admin</option>
                            <option value="0" >User</option>
                            </select>
                        </div>

                         <div class="col-md-6 mb-3">
                            <label for="">status</label>
                            <input type="checkbox" name="status" width="70px" height="70px">
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_user" class="btn btn-primary">Add Admin/User</button>
                         </div>
                    </div>
                    
                </form>
                   

              </div>
            </div>
        </div>        
    </div>
</div>


<?php 

include('includes/footer.php');
?>