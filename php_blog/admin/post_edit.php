<?php
include ('authentication.php');
include('includes/header.php');
if(isset($_GET['category_id']))
{
$category_id=$_GET['category_id'];
$category_run=mysqli_query($con,"SELECT * FROM post where category_id='$category_id'");
}
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
    	<div class="col-md-12">           
            
            <div class="card">
    		  <div class="card-header"><h4>Edit POST

                <a href="post_view.php" class="btn btn-danger float-end">Back</a>
              </h4></div>
    		  <div class="card-body">
            <?php
            
            if(mysqli_num_rows($category_run)>0)
            {
               $row=mysqli_fetch_array($category_run);
            ?>

               <form action="code.php" method="POST">
                <input type="hidden" name="category_id" value="<?= $row['category_id'] ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?= $row['name'] ?>" required class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Slug (URL)</label>
                            <input type="text" name="slug" value="<?= $row['slug'] ?>" required class="form-control">
                        </div>

                       <div class="col-md-12 mb-3">
                            <label for="">Description </label>
                            <textarea name="description" id="editor" required class="form-control" rows="4"><?= $row['description'] ?></textarea> 
                        </div> 
                        <div class="col-md-12 mb-3">
                            <label for="">Meta-Title </label>
                            <input type="text" name="meta_title" value="<?= $row['meta_title'] ?>" max="191" required class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="">Meta-Description </label>
                            <textarea name="meta_description" required class="form-control" rows="4"><?= $row['meta_description'] ?></textarea> 
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="">Meta-Keyword</label>
                            <textarea name="meta_keyword" required class="form-control" rows="4"><?= $row['meta_keyword'] ?></textarea> 
                        </div> 

                        <div class="col-md-6 mb-3">
                            <label for="">image</label>
                            <input type="file" name="image" required class="form-control">
                        </div>

                                

                         <div class="col-md-6 mb-3">
                            <label for="">status</label>
                            <select class="form-select" aria-label="Default select example">
							 
							  <option value="0">Enable</option>
							  <option value="1">Disable</option>
							  
							</select>
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" name="post_update" class="btn btn-primary">Update POST</button>
                         </div>
                    </div>
                    
                </form>
                   

                    <?php 

            }

            else
            {
                ?>
                <h4>No Records founds</h4>
                <?php

            

        }
        ?>

              </div>
            </div>
        </div>        
    </div>
</div>


<?php include('includes/footer.php');?>