<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";
?>
<?php
 $admin_id = $_SESSION['admin_id'];
if(!empty($_SESSION['admin_id']))
{	
$user_id=$_SESSION['admin_id'];
}
else
{
session_destroy();	
?>
<script>
window.location="../index.php"
</script>
<?php
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php meta(); ?>
  
   <?php css(); ?>
    
</head>

<body>
   
<?php  header_tag(); ?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add Keyword</h4>
		   
	   </div>
	  
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <!--<div class="card-header text-uppercase bg-white"></div>-->
            <div class="card-body">
    <form method="POST" action="insert_keyword.php?admin_id=<?php echo  $admin_id; ?>" enctype="multipart/form-data" >
				
					 
					 
				  <div class="row">
					  
                      <div class="col-md-12">
                          <label>Enter Keyword</label>
                         <input type="text"  class="form-control" name="keyword" required placeholder="Enter The Keyword"><br>
                      </div>

					
                  </div>
				  
				  
				  <br>
				  <div class="row">
					 <div class="col-sm-6">
						<button type="submit" class="btn btn-primary shadow-primary px-5" name="submit" id="submit"><i class="icon-lock"></i>Add</button>
					  </div>
				  </div>
				</form>


                </div>
              </div>
            </div>
          </div>

    </div>
    <!-- End container-fluid-->
    
    </div>
    
    <?php footer(); ?>
    <?php js(); ?>
      
</body>
</html>