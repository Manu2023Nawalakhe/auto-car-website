<?php
session_start();

 $user_id=$_SESSION['admin_id'];
if(!empty($_SESSION['admin_id']))
{
	
   $user_id=$_SESSION['admin_id'];
  
  session_destroy();
  header("Location:../index.php");
}
else
{
   session_destroy();
  header("Location:../index.php");
}
?>