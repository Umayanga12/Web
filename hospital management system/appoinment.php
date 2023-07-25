<!DOCTYPE html>
<html>
<head>
	<title>Comfirm Detail</title>
<link rel="stylesheet" type="text/css" href="design/make_appoinmnet.css">
</head>
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="design/menubar.css">
<body>
<?php
session_start();
include './database_connection/Database_connection.php';
include 'libraries.php';
include './inc/header.php';
	if (isset($_SESSION['iduser'])) {

	}else {

	header("location:login.html");

	}

?>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand"><i class="fa fa-W-square"></i>winton Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                         <li><a href="index.php #top" class="smoothScroll">Home</a></li>
                         <li><a href="index.php #about" class="smoothScroll">About Us</a></li>
                         <li><a href="doc_detail.php" class="smoothScroll">Doctors</a></li>
                         <li><a href="index.php #news" class="smoothScroll">Service</a></li>
                         <li><a href="index.php #google-map" class="smoothScroll">Contact</a></li>
                         <li class="appointment-btn"   ><a href=" profile.php">Profile</a></li>
                         
                    </ul>
               </div>

          </div>
     </section>
     <style type="text/css">
          .msg{
               width: 50%;
               height: 9vh;
          }
          .msg h4{
               padding-top: 4vh;
          }
     </style>
<?php
$doctor=$_GET['d_id'];
$user=$_SESSION['iduser'];
$branch=$_GET['branch'];
$date=$_GET['date'];

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
}

$sql_doctor="select * from doctor where iddoctor='$doctor'";
$result_doctor=mysqli_query($con,$sql_doctor);
while ($row=mysqli_fetch_array($result_doctor)) {
     $db_doctor=$row['name'];
}

$doctor=$_GET['d_id'];
$user=$_SESSION['iduser'];
$time_id=$_GET['t_id'];


?>
<section>
     <center>
          <h2>Comfirme the Detail</h2>
     </center>
     <div class="app">
          <form action="appoinment_detail_preview.php">
          <label>Name : </label>
          <label class="f-name"><?php echo $db_user_name_1;?></label>
          <label><?php echo $db_user_name_2; ?></label>
          <br>
          <label>Doctor's Name :</label>
          <label><?php echo $db_doctor; ?></label>
          <br>
          <label>Branch : </label>
          <label><?php echo $location; ?></label>
          <br>
          <label>Date : </label>
          <label><?php echo $date; ?></label>
          <br>
          <label>Contact Number : </label>
          <input type="text" value="<?php echo  $db_user_con; ?>" name="con_number">
          <br>
          <label>Address : </label>
          <input type="text" name="address" value="<?php echo $db_user_address ?>">
          <br>
          <?php 
          echo '<input type="hidden" name="uid" value="'.$user.'">
          <input type="hidden" name="did" value="'.$doctor.'">
          <input type="hidden" name="bid" value="'.$branch.'">
          <input type="hidden" name="day" value="'.$date.'">
          <input type="hidden" name="time_id" value="'.$time_id.'">
          <input type="submit" value=" Continue" class="btn-success button1">
          ';
           ?>
          
          <button class="btn-danger"><a href="index.php">Cancel</a></button>
     </form>
     </div>
</section>

</body>
</html>