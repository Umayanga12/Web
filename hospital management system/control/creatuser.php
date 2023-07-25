<?php
include '../database_connection/Database_connection.php';

//assign the data to variables
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['pn'];
$gender=$_POST['gen'];
$email=$_POST['em'];
$cpw=$_POST['c_pw'];
$pw=$_POST['pw'];
$address=$_POST['adr'];
$age=$_POST['age'];

//create variable to search database
$db_email="";
$sql="select * from user_information where email='$email'";
$result=mysqli_query($con,$sql);


while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
}
//Validation
if ($email==""||$contact==""||$cpw==""||$pw==""||$fname=="") {

	echo "Please enter the data";

} else {

	if ($cpw==$pw) {

		if ($db_email=="") {

			 //save data at database
	         $sql="INSERT INTO user_information(first_name,last_name,age,gender,email,address,con_number,password) VALUES('$fname','$lname','$age','$gender','$email','$address','$contact','$pw')";

	         
             //looking for the error of database connection and sql query
	             if (!mysqli_query($con,$sql)) {
	  													
	                  die(mysql_errno($con));
                 }

       header("location:../login.html");

		} else {

			echo "This email has alredy used";
		}
		

	} else {

		echo "Password does not match";
	}
	
}	



?>