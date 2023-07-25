<?php
session_start();
if (isset($_SESSION['iduser'])) {

	}else {

	header("location:login.html");

	}
	include 'libraries.php';
include 'inc/menu_bar.php';
include './database_connection/Database_connection.php';

$doctor=$_GET['did'];
$branch=$_GET['bid'];
$user=$_GET['uid'];
$date=$_GET['day'];
$timeid=$_GET['time_id'];

$sql_branch="select * from branch where idbranch='$branch'";
$result_branch=mysqli_query($con,$sql_branch);
while ($row=mysqli_fetch_array($result_branch)) {
     $id=$row['idbranch'];
     $location=$row['location'];

}

$sql_user="select * from user_information where iduser='$user'";
$result_user=mysqli_query($con,$sql_user);
while ($row=mysqli_fetch_array($result_user)) {
     $db_user_name_1=$row['first_name'];
     $db_user_name_2=$row['last_name'];
     $db_user_nic=$row['email'];
     $db_user_con=$row['con_number'];
     $db_user_address=$row['address'];
     $age=$row['age'];
}

$sql_doctor="select * from doctor where iddoctor='$doctor'";
$result_doctor=mysqli_query($con,$sql_doctor);
while ($row=mysqli_fetch_array($result_doctor)) {
     $db_doctor=$row['name'];
     $doc_fee=$row['doc_payment'];
}
$sql_time="select * from timetable where 	doctor_iddoctor='$doctor' && 	branch_idbranch='$branch'";
$result_time=mysqli_query($con,$sql_time);
while($row=mysqli_fetch_array($result_time)){
     $time=$row['time_from'];

}

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="design/appoinment_detail_preview.css">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Make Appoinment</title>
</head>
<style type="text/css">
	.pop-up{
  width: 400px;
  background: lightsalmon;
  border-radius: 6px;
  position: absolute;
  top: 50%;
  left: 50%;
   transform: translate(-50%, -50%) scale(0);
   text-align: center;
   padding: 30px 30px;
   visibility: hidden;
   transition: 0.4s;
}
.open-PopUp{
  visibility: visible;
  transform: translate(-50%, -50%) scale(1);
  transition: 0.4s;
}
.pop-up i{
  font-size: 3.3em;
  color: #1fbd00;
}
.pop-up h3{
  margin: 30px 0px 20px 0px;
}
.pop-up button{

  margin-top: 5%;
  padding: 10px 15px;
  border: none;
  outline: none;
  color: #fff;
  font-size: 20px;
  border-radius: 6px;
  cursor: pointer;
} 
</style>
<body>
<div>
	<div class="heading">
		<center>Make Appoinment</center>
	</div>
	<style type="text/css">
		
	</style>
	<div class="detail" style="width: 50%; margin-left: 25%; margin-top: 5%;">
		<form action="control/appoinment_valodation.php" method="post" >
			<?php 
			echo '<label>Name : '. $db_user_name_1.' '. $db_user_name_2.'</label>
			<br>
			<label>Age : '.$age.' </label>
			<br>
		    <label>Doctor : '.$db_doctor.'</label>
		    <br>
		    <label>Date : '.$date.' </label>
		    <br>
		    <label>Time : '.$time.' </label>
		    <br>
		    <label>Branch : '.$location.'</label>
		    <br>
		    <label>Contact : '. $db_user_con.'</label>
		    <br>
		    <label>Doctor Fee :  Rs.'.$doc_fee.'</label>
		    <br>
		    <div class="alert-info">
		    	Note : 1.If you need to edit your name or age please go to the profile and Edit Profile
		    </div>';
			 ?>
		    <br>
		    	<input type="hidden" name="p_name" value="<?php echo $user ?>">
		    	<input type="hidden" name="doctor" value="<?php echo $doctor ?>">
		    	<input type="hidden" name="time" value="<?php $time ?>">
		    	<input type="hidden" name="branch" value="<?php echo $branch ?>">
		    	<input type="hidden" name="date" value="<?php echo $date ?>">
		    	<input type="hidden" name="time_id" value="<?php echo $timeid ?>">
		    <input type="submit" value="Make Appoinment">
		</form>
	</div>
</div>
</body>
</html>