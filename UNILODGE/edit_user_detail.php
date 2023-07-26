<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit User Detail</title>
</head>
<?php

//start the session 
session_start();

//assing the user id to the session 
$uid = $_SESSION['iduser'];

//import the database connection  
include './db_connection/data_connection.php';

// check weather the session is set, if not then regrate to the login page 
if(isset($_SESSION['iduser'])){

}else{
    header("location:./login.html");
}

  
//declearing the variable to assing the data from the database
$db_email="";
$db_use_name ="";
$db_nic="";
$db_pass="";
$db_name="";

//sql query to serch the data base 
$sql="SELECT * FROM user WHERE iduser ='$uid' ";

//exhicuting the quary
$result=mysqli_query($connection,$sql);

//rectrivee the data to search that the users with the same user name 
while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
    $db_use_name = $row['user_name'];
    $db_nic = $row['nic'];
    $db_pass = $row['password'];
    $db_name = $row['name'];
    $db_con_number = $row['contact'];
    $db_pass = $row['password'];
}

?>
<link rel="stylesheet" type="text/css" href="./style/edit_user.css">
<body bgcolor="845931">
<div class="sign_up">
	<form action="control/edit_user_profile_detail.php" method="post">
  <div class="container">
    <center>
    	<h1>Edit Detail</h1>
    </center>
    <hr>
    <label><b>Name</b></label>
    <input type="text" name="name" id="name" required  placeholder="Enter name" value="<?php echo $db_name ;?>">

    <label><b>User name</b></label>
    <input type="text" name="user_name" required placeholder="Enter user name"  value="<?php echo $db_use_name ;?>">

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required  value="<?php echo $db_email ;?>">

    <label><b>NIC</b></label>
    <input type="text"  name="nic"  required placeholder="Enter the NIC number"  value="<?php echo $db_nic ;?>">

    <label><b>Contact Number</b></label>
    <input type="text"  name="pn"  required placeholder="Enter the Contact number"  value="<?php echo $db_con_number ;?>">

    <label><b>Password</b></label>
    <input type="password" name="psw" id="psw" required placeholder="Password"  value="<?php echo $db_pass ;?>">

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required  value="<?php echo $db_pass ;?>">
    <hr>
    <center>
        <button type="submit" class="registerbtn">
            <span>Edit details</span>
            <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="37" cy="37" r="35.5" stroke="black" stroke-width="3"></circle>
                <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="white"></path>
            </svg>
        </button>
    </center>
  </div>
</form>
</div>
</body>
</html>