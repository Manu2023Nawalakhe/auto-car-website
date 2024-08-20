<?php
session_start();
include "../db_connection.php";

if(isset($_POST['sign_in'])){
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if($result = mysqli_query($conn, "SELECT * FROM `tbl_admin_reg` WHERE `email_id`='$username' AND `password`='$password'  AND `email_status`='approved'"))
        
        {
        	$num_rows = mysqli_num_rows($result);
        
        	if($num_rows > 0)
        	{	
        		while($rows = $result->fetch_object())                                                                   
        		{
        				$_SESSION['username']=$rows->email_id;
        				$_SESSION['admin_id']=$rows->unique_id;
        				$_SESSION['admin_name']=$rows->fullname;
        		
        			?>
        			<script>
        			    window.location="admin/index.php";
        			</script>
        			<?php
        		}
        	}else
        	{
        	    
        	  	?>
        			<script>
        			    alert('Wrong Email-id And Password');
        			    window.location="index.php";
        			</script>
        			<?php  
        	    
        	    
        	}
        	
        }
}else
{
    
    	?>
			<script>
		     	alert("Something Went Wrong");
			    window.location="index.php";
			</script>
			<?php
}
mysqli_close($conn);
?>