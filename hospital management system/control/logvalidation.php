<?php
session_start();
include '../database_connection/Database_connection.php';
$email=$_POST['em'];
$pw=$_POST['pw'];


$uid=0; 
$db_email="";
$db_pw="";

$sql="select * from user_information where email='$email'";
$result=mysqli_query($con,$sql);


while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
	$uid=$row['iduser'];
	$db_pw=$row['password'];
}

if ($email=="" || $pw=="") {
	echo "Enter the valied email and password";
} else { 
	if ($email=!$db_email) {

		echo "This email is not exit";

	} else {

		if ($db_pw==$pw) {

			$_SESSION['iduser']=$uid;
	        header("location:../index.php");
			
		} else {
			echo "Your password is worng";
		}
		

	}
	
}

?>