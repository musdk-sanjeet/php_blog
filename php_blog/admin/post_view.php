<?php 
include_once ('authentication.php');
include_once('includes/header.php');

$result=mysqli_query($con,"SELECT * from post where status='0'");
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
    	<div class="col-md-12">

            
            <div class="card">
    		  <div class="card-header"><h4>List POSTS

                <a href="post_add.php" class="btn btn-primary float-end">Add List</a>
              </h4></div>
    		  <div class="card-body">

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="student_list">
                        <thead>
                            <tr>
                                <th>Category_ID</th>
                                <th>Name</th>                              
                                <th>Image</th>
                                <th>STATUS</th>                                
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(mysqli_num_rows($result)>0)
                        	{
                        		while($row=mysqli_fetch_array($result))
                        		{

                        	?>
                        	<tr>
                        		<td><?php echo $row['category_id']; ?></td>
                        		<td><?php echo $row['name']; ?></td>
                        		<td><img src="assets/img/<?php echo $row['image']; ?>" width="50px" height="50px"></td>
                        		<td><?php echo $row['status']== '1' ? 'Hidden' : 'Visible'?></td>
                        		<td>
                        			<a class="btn btn-primary" name="post_edit" href="post_edit.php?category_id=<?php echo $row['id']; ?>">Edit</a>
                        			<a class="btn btn-danger" href="post_delete.php?delete_id=<?php echo $row['id'] ?>">Delete</a>
                        		</td>
                        	</tr>

                        	<?php 
                        		}
                        	}
                        	?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php') ?>










