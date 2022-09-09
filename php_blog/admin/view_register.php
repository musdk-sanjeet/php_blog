<?php
include ('authentication.php');
include('includes/header.php');
$query="SELECT * from users WHERE status='0'";
$query_run=mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0)
{

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    </div>

    <div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
               
            <div class="card">
            <div class="card-header">
    		  	<h4>Register User
    		  	<a href="register-add.php" class="btn btn-primary float-end" >Add Admin</a>
    		  	</h4>
    		  </div>
    		  <div class="card-body">
    		  	<table id="myTable" class="display nowrap table-bordered" style="width:100%">
    		  		<thead>
    		  			<tr>
    		  				<th>ID</th>
    		  				<th>First Name</th>
    		  				<th>Last Name</th>
    		  				<th>Email</th>
    		  				<th>Roles</th>
    		  				<th>Action</th>
    		  				
    		  			</tr>
    		  		</thead>
    		  		
    		  		<tbody>
    		  			<?php
    		  				while($row=mysqli_fetch_array($query_run))
    		  				{
    		  					?>
    		  					<tr>
		    		  				<td><?= $row['id']; ?></td>
		    		  				<td><?= $row['fname']; ?></td>
		    		  				<td><?= $row['lname']; ?></td>
		    		  				<td><?= $row['email']; ?></td>
		    		  				<td>
		    		  					<?php
		    		  					if($row['role_as'] =='1')
		    		  						echo "Admin";
		    		  					elseif ($row['role_as']=='0') {
		    		  						echo "Users";
		    		  					}
		    		  						
		    		  					?>
		    		  				</td>
		    		  				<td>		    		  				
		    		  				<a href="edit_register.php?id=<?= $row['id'];?>" class="btn btn-primary">Edit</a>
		    		  			
		    		  				<button type="button"   class="btn btn-danger" onclick="delete_user(<?= $row['id'];?>)">Delete</button>
		    		  				</td>
		    		  				
		    		  			</tr>
    		  					<?php 
    		  				}
    		  			}
    		  			else
    		  			{
    		  				?>
    		  				<tr>
    		  					<td colspan="7">No Records Founds</td>
    		  				</tr>
    		  				<?php
    		  			}

    		  			?>
   		  			
    		  		</tbody>
    		  	</table>

    		  </div>
    		  	</div>
    	</div>
    	</div>
    		</div>
    	
<?php include('includes/footer.php');?>
<script>
$(document).ready(function () {
    $('#myTable').DataTable();
});




  function delete_user(id) {

  		var r = confirm("Are you sure want to delete the data?");

  	if(r){
  	$.ajax({

  		"url":'delete_user.php',
  		"type":'post',
  		"data": { id : id},
  		success:function(result){

  			if(result == "success") {
  				alert("Success data!");
  				location.reload();
  			} 
  		
  		else {

  				alert("Something went weong!");
  				location.reload();
  			}	


  		}


  	});
}	

}

  </script>

