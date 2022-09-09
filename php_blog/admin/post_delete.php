<?php
include_once ('authentication.php');
if(isset($_GET['delete_id']))
{
$category_id=$_GET['delete_id'];

$delete_query=mysqli_query($con,"UPDATE post set status='1' WHERE id ='".$category_id."'");
if($delete_query)
{
	header("Location: post_view.php");
}
else
{
	header("Location: post_view.php");
}
}
?>