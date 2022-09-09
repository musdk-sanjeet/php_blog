<?php 
include_once ('authentication.php');
include_once('includes/header.php');
$category_run=mysqli_query($con,"SELECT * from categories where status='0'");

?>


<div class="container-fluid px-4">
    <div class="row mt-4">
    	<div class="col-md-12">

           
            
            <div class="card">
    		  <div class="card-header"><h4>Add POST 

                <a href="post_view.php" class="btn btn-danger float-end">Back</a>
              </h4></div>
    		  <div class="card-body">

               <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    	<div class="col-md-12 mb-3">

                    		<label for="">Category-list</label>

	                    	<select name="category_id" required class="form-control">
	                    		<option value="">---Select-Category---</option>

	                    		<?php
	                    		if(mysqli_num_rows($category_run)>0) 
	                    			{
	                    			 while($row=mysqli_fetch_array($category_run))
	                    			  { 
	                    		 ?>

	                    		<option value="<?php echo $row['id'] ?>"> <?= $row['name']?> </option>	    
                                	<?php  } } ?>                		
	                    	
	                    	</select>
	                    

                    	</div>	

                    	<!--  -->
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" required class="form-control">
                        </div>

                        <!--  -->
                        <div class="col-md-6 mb-3">
                            <label for="">Slug (URL)</label>
                            <input type="text" name="slug" required class="form-control">
                        </div>

                        <!--  -->
                       <div class="col-md-12 mb-3">
                            <label for="">Description </label>
                           <textarea name="description" id="editor" required></textarea>
                        </div> 
                        
                        <!--  -->
                        <div class="col-md-12 mb-3">
                            <label for="">Meta-Title </label>
                            <input type="text" name="meta_title" max="191" required class="form-control">
                        </div>

                        <!--  -->
                        <div class="col-md-6 mb-3">
                            <label for="">Meta-Description </label>
                            <textarea name="meta_description" required class="form-control" rows="4"></textarea> 
                        </div> 

                        <!--  -->
                        <div class="col-md-6 mb-3">
                            <label for="">Meta-Keyword</label>
                            <textarea name="meta_keyword" required class="form-control" rows="4"></textarea>                            
                        </div> 

                        <!--  -->
                        <div class="col-md-6 mb-3">
                            <label for="">image</label>
                            <input type="file" name="image" required class="form-control">
                        </div>

                        <!--  -->
                          <div class="col-md-6 mb-3">
                            <label for="">status</label>
                            <select class="form-select" aria-label="Default select example">
							 
							  <option value="0">Enable</option>
							  <option value="1">Disable</option>
							  
							</select>
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" name="post_add" class="btn btn-primary">Save POST</button>
                         </div>
                    </div>
                      
		           
                </form>
             
                 		
              </div>
            </div>
        </div>        
    </div>
</div>

    


<?php include ("includes/footer.php");?>

 