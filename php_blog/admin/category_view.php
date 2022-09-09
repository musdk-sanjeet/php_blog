
<?php
include_once ('authentication.php');
include_once('includes/header.php');
$category="SELECT * FROM categories WHERE status!='2'";
$category_run=mysqli_query($con,$category);
 
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
               
            <div class="card">
    		  <div class="card-header"><h4>View Category

                <a href="category_add.php" class="btn btn-primary float-end">Add Category</a>
              </h4></div>


    		  <div class="card-body">

                <table id="student_list" class="table table-bordered table-striped">                    
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>                                
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            if(mysqli_num_rows($category_run)>0)
                            {
                            foreach($category_run as $item)
                            {

                             ?>
                                <tr>
                                    <td> <?= $item['id']; ?></td>
                                    <td> <?= $item['name']; ?></td>                                    
                                    <td>
                                    <?= $item['status'] == '1' ? 'Hidden' : 'Visible'; ?>
                                    </td>
                                    <td><a href="category_edit.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_edit.php?id=<?= $item['id']; ?>" class="btn btn-danger">Delete</a>


                                    </td>
                                </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="5" >No Record Found</td>
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
            </div>
        </div>        
    </div>
</div>
<?php include_once("includes/footer.php")?>

 <script>

  $(document).ready(function () {
        $('#student_list').DataTable();
  });
  </script>


