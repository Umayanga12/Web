<!DOCTYPE html>
<html>
<head>
	<title>Select the doctor</title>
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
                    <a href="index.php" class="navbar-brand"><i class="fa fa-W-square"></i>wintan Hospital</a>
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
$user=$_SESSION['iduser'];

$sql_user="select * from user_information where iduser='$user'";
$result_user=mysqli_query($con,$sql_user);
while ($row=mysqli_fetch_array($result_user)) {
     $db_user_name_1=$row['first_name'];
     $db_user_name_2=$row['last_name'];
     $db_user_nic=$row['email'];
     $db_user_con=$row['con_number'];
     $db_user_address=$row['address'];
}

$user=$_SESSION['iduser'];

?>
<section>
     <center>
          <h1>Please select the doctor</h1>
     </center>
     <div class="app" style="background-color: yellowgreen;">
          <form action="doc_shedual_graph.php">
          <label>Doctor's Name :</label>
          <select style="width: 50%;" name="d_id">
               <option>Please Select the Doctor </option>
          <?php 
             $sql_doctor="select * from doctor";
               $result_doctor=mysqli_query($con,$sql_doctor);
               while ($row=mysqli_fetch_array($result_doctor)) {
                    $db_doctor=$row['name'];
                    $db_id=$row['iddoctor'];

                    echo '<option value="'.$db_id.'" >'.$db_doctor.'</option> ';
               }

           ?>
          </select>
          <input type="submit" value=" Continue" class="btn-success button1">
          <button class="btn-danger button"><a href="index.php">Cencel</a></button>
     </form>

     </div>
</section>

</body>
</html>