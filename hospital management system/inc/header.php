<?php
include './database_connection/Database_connection.php';

$uid=$_SESSION['iduser'];
$log_user="";
$log_email="";
$log_con="";
$log_pw="";
$log_gendr="";

$sql="select * from user_information where iduser='$uid'";

$result=mysqli_query($con,$sql);


while ($row=mysqli_fetch_array($result)) {
     $log_email=$row['email'];
     $uid=$row['iduser'];
     $log_user_fname=$row['first_name'];
     $log_user_sname=$row['last_name'];
     $log_address=$row['address'];
     $log_con=$row['con_number'];
     $log_pw=$row['password'];
     $log_age=$row['age'];
     $log_gender=$row['gender'];

}

?>
