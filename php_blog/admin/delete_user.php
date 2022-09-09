<?php 
	
include ('authentication.php');
	$id = $_POST['id'];

	 $query="UPDATE users set status='2' where id='$id'" ;
    $query_run=mysqli_query($con,$query);
     if($query_run) {
     	echo "success";
     	}
     	
     else {

     	echo "fail";
     }

?>