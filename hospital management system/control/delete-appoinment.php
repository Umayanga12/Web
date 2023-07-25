<?php
include '../database_connection/Database_connection.php';

$id=$_POST['appoinment_id'];

$sql="DELETE FROM appoinment WHERE idappoinment='$id' ";

 if (!mysqli_query($con,$sql)) {
	  	
	    die(mysql_errno($con));
      }

header("location:../my_appoinment.php");

?>