<?php
include './database_connection/Database_connection.php';
session_start();
$uid=$_SESSION['iduser'];
if (isset($_SESSION['iduser'])) {

	}else {

	header("location:login.html");

	}
include 'libraries.php';
include 'inc/menu_bar.php';

$sql_appoinment="select * from appoinment where 	user_information_iduser='$uid'";
$result=mysqli_query($con,$sql_appoinment);
while ($row=mysqli_fetch_array($result)) {
	  $branch=$row['branch_idbranch'];
	   $time=$row['timetable_idtimetable'];
	   $app_number=$row['appoinment_number'];
	   $doc_id=$row['doctor_iddoctor'];
			
}

$sql_branch="select * from branch where idbranch='$branch'";
$result_branch=mysqli_query($con,$sql_branch);
while ($row=mysqli_fetch_array($result_branch)) {
     $id=$row['idbranch'];
     $location=$row['location'];

}
$sql_user="select * from user_information where iduser='$uid'";
$result_user=mysqli_query($con,$sql_user);
while ($row=mysqli_fetch_array($result_user)) {
     $db_user_name_1=$row['first_name'];
     $db_user_name_2=$row['last_name'];
     $db_user_nic=$row['email'];
     $db_user_con=$row['con_number'];
     $db_user_address=$row['address'];
     $age=$row['age'];
}

$sql_doctor="select * from doctor where iddoctor='$doc_id'";
$result_doctor=mysqli_query($con,$sql_doctor);
while ($row=mysqli_fetch_array($result_doctor)) {
     $db_doctor=$row['name'];
     $doc_fee=$row['doc_payment'];
}
$sql_time="select * from timetable where 	doctor_iddoctor='$doc_id' && 	branch_idbranch='$branch'";
$result_time=mysqli_query($con,$sql_time);
while($row=mysqli_fetch_array($result_time)){
     $time1=$row['time_from'];

}



?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="design/appoinment_detail_preview.css">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Appoinment</title>
</head>
<style type="text/css">
	.pop-up{
  width: 400px;
  background: lightsalmon;
  border-radius: 6px;
  position: absolute;
  top: 25%;
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
<div class="app">
	<div class="heading">
		<center>My Appoinment</center>
	</div>
	<!--searching the data--->
	<?php

$sql_appoinment="select * from appoinment where 	user_information_iduser='$uid'";
$result=mysqli_query($con,$sql_appoinment); 
while ($row=mysqli_fetch_array($result)) {
	$app_id=$row['idappoinment'];
	 // $branch=$row['branch_idbranch'];
	   $time=$row['timetable_idtimetable'];
	   $app_number=$row['appoinment_number'];
	   $doc_id=$row['doctor_iddoctor'];
     $number=$row['appoinment_number'];
     echo '<div class="detail" style="width: 50%; margin-left: 25%; margin-top: 5%; background-color: yellowgreen; padding:2%;">
     <div><img src="images/types-of-doctors-1600114658.png" style="width: 300px; float: left; margin-right: 8%; border-radius: 15px;"></div>
		<form>
			<label>Name : '. $db_user_name_1.' '. $db_user_name_2.'</label>
			<br>
			<label>Age : '.$age.'</label>
			<br>
		    <label>Doctor : '.$db_doctor.' </label>
		    <br>
		    <label>Time : '.$time1.' </label>
		    <br>
		    <label>Appoinment Number : '.$number.'</label>
		    <br>
		    <label>Branch : '.$location.'</label>
		    <br>
		    <label>Doctor Fee : '. $db_user_con.' </label>
		    <br>
		    <input onclick="OpnePopUpBox()" type="button" class="btn-danger delete" value="Cancel Appoinment">
		</form>
	</div>';
}
	 ?>
	 <!-- pop-up window -->
	<div class="pop-up">
      <i class="fa-solid fa-circle-check"></i>
      <h3>Are You Sure....!!!</h3>
      <p>Are You Sure That Do you Want to Delete....????</p>
      <center>
      	<form action="control/delete-appoinment.php" method="post">
      		<input type="hidden" name="appoinment_id" value="<?php echo $app_id; ?>">
      		<input type="submit" value="YES" class="btn-danger" onclick="ClosePopUpBox()"  name="y_button">
      </form>
      <input type="submit" onclick="ClosePopUpBox()" class="btn-success" value="No">
  </center>
    </div>
  </div>
   <script>
    let popup = document.querySelector(".pop-up");

    function OpnePopUpBox(){
      popup.classList.add("open-PopUp");
    }
    function ClosePopUpBox(){
      popup.classList.remove("open-PopUp");
    }
  </script>
</div>
</body>
</html>