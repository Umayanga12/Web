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
<style type="text/css">
    button{
        margin-bottom: 10%;
    }
    label{
        font-size: 3vh;
    }
</style>
<link rel="stylesheet" type="text/css" href="design/profile.css">
<body>
	<div class="profile_info">
    <div class="info_img">
      <img src="images/images.jfif" >
    </div>
	<form action="edit_profile.php" method="post">
  <div class="info_form">
    <center>
    	<h1>Profile Info</h1>
    </center>
    <label><b>Name :   <?php echo $log_user_fname; ?>  <?php echo $log_user_sname; ?></b></label>
<br><br>
    <label><b>Email :  <?php echo $log_email; ?></b></label>
<br><br>
    <label><b>Age : <?php echo $log_age; ?></b></label>
<br><br>
    <label><b>Gender :  <?php echo $log_gender; ?> </b></label>
<br><br>
    <label><b>Address : <?php echo $log_address; ?></b></label>
<br><br>
    <label><b>Contact : <?php echo $log_con; ?></b></label>
<br><br>
    <button type="submit" class="btn" style="margin-left: 45%; width: 20%; height: 10%; font-weight: bold; color: ;"><a href="edit_profile.php">Edit Profile → </a></button>
  </div>
</form>
</div>
</body>
</html>