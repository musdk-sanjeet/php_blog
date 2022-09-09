<?php 
include('includes/header.php');
include('includes/navbar.php');
if(isset($_GET['title']))
{
$slug=mysqli_real_escape_string($con,$_GET['title']);
$posts="SELECT * from post where slug='$slug'";
$posts_run=mysqli_query($con,$posts);
}
?>


<div class="py-5">
<div class="container">
<div class="row">
<?php
	while(!empty($postdata=mysqli_fetch_array($posts_run))) { ?>
		<div class="col-md-9">
		<div class="card card-body shadow-sm mb-4">
	
		<div><?php echo $postdata['description'];?></div>
		
		</div>
	<?php } ?>
		
</div>	
		

<div class="col-md-3">
<div class="card">
<div class="card-header">
	<h3>Advertise Area</h3>
</div>	
<div class="card-body">
Your Advertise
	
</div>
</div>
</div>
</div>
</div>
</div>

<?php 
include('includes/footer.php');
?>