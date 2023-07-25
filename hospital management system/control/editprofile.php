<?php
session_start();
include '../database_connection/Database_connection.php';

$uid=$_SESSION['iduser'];

$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$contact=$_POST['pn'];
$email=$_POST['em'];
$pw=$_POST['pw'];
$age=$_POST['age'];
$gender=$_POST['gen'];
$address=$_POST['adr'];

if ($f_name=="" || $contact=="" || $email=="" || $contact=="" ||$pw=="") {
    
    echo "Please Enter the Detail";

} else {

	$sql="UPDATE user_information SET first_name='$f_name',last_name='$l_name', age='$age',gender='$gender' ,email='$email',address='$address',con_number='$contact',  password='$pw' WHERE iduser='$uid'";

	if (!mysqli_query($con,$sql)) {
		die(mysqli_error($con));
	}
	
	header('location:../index.php');
}

?>