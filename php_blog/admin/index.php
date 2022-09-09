<?php 
include ('authentication.php');
include('includes/header.php');
$category="SELECT * from categories";
$category_run=mysqli_query($con,$category);


$post="SELECT * from post";
$posts_run=mysqli_query($con,$post);


$useractive="SELECT * from users";
$useractive_run=mysqli_query($con,$useractive);


$blockuser="SELECT * from users WHERE status='1'";
$blockuser_run=mysqli_query($con,$blockuser);

 ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">PHP Admin Panel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card bg-primary text-white mb-4">
        <div class="card-body">Totla Category</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <?php 
            if($category_total=mysqli_num_rows($category_run))
            {
           
                echo '<h4 class="mb-0">'.$category_total.'</h2>';
            }
            else
            {
                echo '<h4 class="mb-0">No Records founds</h2>';
            }
            ?>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-warning text-white mb-4">
        <div class="card-body">Total Posts</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <?php 
            if($post_total=mysqli_num_rows($posts_run))
            {
           
                echo '<h4 class="mb-0">'.$post_total.'</h2>';
            }
            else
            {
                echo '<h4 class="mb-0">No Records founds</h2>';
            }
            ?>

        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-success text-white mb-4">
        <div class="card-body">Total User</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <?php 
            if($total_user=mysqli_num_rows($useractive_run))
            {
           
                echo '<h4 class="mb-0">'.$total_user.'</h2>';
            }
            else
            {
                echo '<h4 class="mb-0">No Records founds</h2>';
            }
            ?>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white mb-4">
        <div class="card-body">Blocked User</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <?php 
            if($Block_user=mysqli_num_rows($blockuser_run))
            {
           
                echo '<h4 class="mb-0">'.$Block_user.'</h2>';
            }
            else
            {
                echo '<h4 class="mb-0">No Data</h2>';
            }
            ?>
        </div>
    </div>
</div>
</div>                     
</div>








<?php 
include('includes/footer.php');

?>