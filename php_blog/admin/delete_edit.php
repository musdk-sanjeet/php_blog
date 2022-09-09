
<?php
include ('authentication.php');


$cat_id = $_GET['id'];
$sql = mysqli_query($con,"UPDATE categories SET status='2' WHERE id ='".$cat_id."'");
if($sql) {


	header("Location:category_view.php");
}


?>