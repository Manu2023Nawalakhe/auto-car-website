<?php
include "../../db_connection.php";
if(isset($_POST['submit']))
{
    
    
	 $keyword =mysqli_real_escape_string($conn,$_POST['keyword']);
     $unique_id=rand(00000,99999).date('Ymdihs');

   
    $insert_seller = mysqli_query($conn,"INSERT INTO `add_keyword`(`unique_id`, `keyword`, `e_date`, `is_del`) VALUES ('$unique_id','$keyword','".date('Y-m-d')."','approved')");
						
						if($insert_seller==TRUE)
						{
					?>
					<script>
					    
					    alert("Added Successfully");
					    window.location="view_keyword.php";
					    
					</script>
					<?php	
		}
		else
		{
		?>
		<script>
					    
					    alert("Not Added Successfully");
					    window.location="view_keyword.php";   
        </script>
		
<?php
		}
		
}else{ ?>
    
    <script>
					    
					    alert("Something Went Wrong");
					    window.location="view_keyword.php";   
        </script>
    
    
<?php    
}
?>