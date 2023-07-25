<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit profile</title>
</head>
<?php
session_start();
include './database_connection/Database_connection.php';
	
	if (isset($_SESSION['iduser'])) {

	}else {

	header("location:login.html");

	}

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

<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<style type="text/css">
		* {box-sizing: border-box}

	.sign_up{
		width: 100%;
        background-color: transparent;
        position: absolute;
	}

/* Add padding to containers */
.container {
	width: 40%;
	margin-left: 30%;
  padding: 16px;
  position: absolute;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<body>
	<div class="sign_up">
	<form action="control/editprofile.php" method="post">
  <div class="container">
    <center>
    	<h1>Edit Profile</h1>
    </center>
    <hr>
    <label><b>Name</b></label>
    <input type="text" placeholder="First Name" name="fname" id="fname" required value="<?php echo $log_user_fname; ?>">
    <input type="text" placeholder="Second Name" name="lname" id="lname"  value="<?php echo $log_user_sname; ?>">

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="em" id="email" required value="<?php echo $log_email; ?>">

    <label><b>Age</b></label>
    <input type="text" name="age" required value="<?php echo $log_age; ?>">

    <label><b>Gender</b></label>
    <input type="text" name="gen" value="<?php echo $log_gender; ?>">
<br><br>

    <label><b>Address</b></label>
    <input type="text"  name="adr" value="<?php echo $log_address; ?>">

    <label><b>Contact Number</b></label>
    <input type="text"  name="pn"  required value="<?php echo $log_con; ?>">

    <label><b>Password</b></label>
    <input type="password" name="pw" required placeholder="Password" value="<?php echo $log_pw; ?>"S>

    <hr>
    <button type="submit" class="registerbtn">Edit Profile</button>
  </div>
</form>
</div>
</body>
</html>