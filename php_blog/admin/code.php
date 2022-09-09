<?php 

include ('authentication.php');

// Update POST
if(isset($_POST['post_update']))
{
	$category_id=$_POST['category_id'];
	$name=$_POST['name'];
	$slug=$_POST['slug'];
	$description=$_POST['description'];
	$meta_title=$_POST['meta_title'];
	$meta_description=$_POST['meta_description'];
	$meta_keyword=$_POST['meta_keyword'];
	$image=$_FILES['image']['name'];
	$status=$_POST['status']; 

 $result=mysqli_query($con,"UPDATE post set id='$category_id',name='$name',slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',image='$image',status='$status' where category_id='$category_id'");
if($result)
{
	move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$image);
	header("Location: post_view.php");

}
else
{
	header("Location: post_edit.php");
}


}





// Post-Add  
if(isset($_POST['post_add']))
{
$category_id=$_POST['category_id'];
$name=$_POST['name'];
$slug=$_POST['slug'];
$description=$_POST['description'];
$meta_title=$_POST['meta_title'];
$meta_description=$_POST['meta_description'];
$meta_keyword=$_POST['meta_keyword'];
$image=$_FILES['image']['name'];


$status=$_POST['status'] == true ? '1' : '0';

$query="INSERT into post (category_id,name,slug,description,image,meta_title,meta_description,meta_keyword,status) VALUES ('$category_id','$name','$slug','$description','$image','$meta_title','$meta_description','$meta_keyword','$status')";
$query_run=mysqli_query($con,$query);
if($query_run)
{
	move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$image);
	$_SESSION['message']="Post added Sucessfully";
	header('Location: post_view.php');
}
else
{
$_SESSION['message']="Something Wrong!!";
header('Location: post_add.php');

}
}







// Category Delete
if(isset($_POST['category_delete']))
{
$category_id=$_POST['category_delete'];

	
$query="UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1"; 
$query_run=mysqli_query($con,$query);

if($query_run)
{
	$_SESSION['message']="Category Deleted Sucessfully";
	header('Location: category_view.php');
}
else
{
	$_SESSION['message']="Something want wrong";
	header('Location: category_view.php');
}
}




// Category Edit/Update 
if (isset($_POST['category_update'])) 
{

	$category_id=$_POST['category_id'];

	$name=$_POST['name'];
	$slug=$_POST['slug'];
	$description=$_POST['description'];
	$meta_title=$_POST['meta_title'];
	$meta_description=$_POST['meta_description'];
	$meta_keyword=$_POST['meta_keyword'];
	$navbar_status=$_POST['navbar_status'] == true ? '1' : '0';
	$status=$_POST['status'] == true ? '1' : '0';

 echo $query="UPDATE categories SET name='$name',slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',navbar_status='$navbar_status',status='$status' WHERE id='$category_id'"; die();

$query_run=mysqli_query($con,$query);

if($query_run)
{
	$_SESSION['message']="Category Updated Sucessfully";
	header('Location: category_view.php');
}
else
{
	$_SESSION['message']="Something want wrong";
	header('Location: category_edit.php?id='.$category_id);
}
}


// Add Category
if(isset($_POST['category_add']))
{

	$name=$_POST['name'];
	$slug=$_POST['slug'];
	$description=$_POST['description'];
	$meta_title=$_POST['meta_title'];
	$meta_description=$_POST['meta_description'];
	$meta_keyword=$_POST['meta_keyword'];
	$navbar_status=$_POST['navbar_status'];
	$status=$_POST['status'];

	$query="INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keyword, navbar_status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";

	$query_run=mysqli_query($con,$query);

if($query_run)
{
	$_SESSION['message']="Category Added Sucessfully";
	header('Location: category_add.php');
}
else
{
	$_SESSION['message']="Something want wrong";
	header('Location: category_add.php');
}
}




// Add Admin/user
if(isset($_POST['add_user']))
{
	

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$role_as=$_POST['role_as'];
	$status=$_POST['status'] == true ? '1':'0';

 $query="INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
$query_run=mysqli_query($con,$query);

if($query_run)
{
	$_SESSION['message']="Admin/User added Sucessfully";
	header('Location: view_register.php');
	
}
else
{
	$_SESSION['message']="Something went wrong";
	header('Location: view_register.php');
	
}


}


// Update User/Admin

if(isset($_POST['update_user']))
{

	$user_id=$_POST['user_id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$role_as=$_POST['role_as'];
	$status=$_POST['status'] == true ? '1':'0';

	$query="UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id'";

	$query_run=mysqli_query($con,$query);

	if($query_run)
	{
		$_SESSION['message']="Updated Sucessfully";
		header("Location: view_register.php");
		exit(0);
	}
}


?>