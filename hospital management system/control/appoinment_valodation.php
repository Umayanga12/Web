<?php
include '../database_connection/Database_connection.php';

$user=$_POST['p_name'];
$doc=$_POST['doctor'];
$time=$_POST['time_id'];
$branch_id=$_POST['branch'];
$tid=$_POST['time_id']; 
$date=$_POST['date'];
$number=0;   $rowcount=0;

$sql="SELECT * FROM appoinment WHERE doctor_iddoctor='$doc' && branch_idbranch='$branch_id'";
$result=mysqli_query($con,$sql);

//making appoinment number

    if ($result = mysqli_query($con, $sql)) {
  
    $rowcount = mysqli_num_rows( $result);
     $number=$rowcount++;
  }

   if ($rowcount<1) {
    $number=1;
    }else{
       $number=$rowcount++; 
    }
      
      

// inserting data
$sql="INSERT INTO appoinment(day,appoinment_number,app_time,user_information_iduser,doctor_iddoctor,branch_idbranch,timetable_idtimetable) VALUES('$date','$number','$time','$user','$doc','$branch_id','$tid')";

        
             //looking for the error of database connection and sql query
            if (!mysqli_query($con,$sql)) {
                                                        
                      die(mysql_errno($con));
                 }
header("location:../my_appoinment.php");
 ?>