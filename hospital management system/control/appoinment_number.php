<?php
include '../database_connection/Database_connection.php';
$sql="SELECT * FROM appoinment ";
$result=mysqli_query($con,$sql);

    if ($result = mysqli_query($con, $sql)) {
  
    $rowcount = mysqli_num_rows( $result );
    
      if ( $rowcount==0) {
      	$rowcount=1;
      	echo  $rowcount;
      } else {
      	 $number=$rowcount++;
      	 echo $number;
      }
      
}

 ?>