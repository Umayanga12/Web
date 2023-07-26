<?php
//import the database connection 
include '../db_connection/data_connection.php';

//declearing the variable to assing the data from the database
$db_email="";
$db_use_name ="";
$db_uid="";
$db_nic="";
$db_pass="";
$db_name="";

//sql query to serch the data base 
$sql="SELECT * FROM user WHERE email='$email' || user_name='$use_name'";

//$sql="SELECT * FROM user";

//exhicuting the quary
$result=mysqli_query($connection,$sql);

//rectrivee the data to search that the users with the same user name 
while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
    $db_use_name = $row['user_name'];
    $db_uid = $row['iduser'];
    $db_nic = $row['nic'];
    $db_pass = $row['password'];
    $db_name = $row['name'];


}

?>