<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's Shedual</title>
	<link rel="stylesheet" type="text/css" href="design/doc_shedual_graph.css">
	<?php
	 include './database_connection/Database_connection.php';
	include 'inc/menu_bar.php';
	include 'libraries.php';

	//get doctor id

	$doc=$_GET['d_id'];
	


	//searching data -doctor
$sql1="select * from doctor where iddoctor = '$doc' ";
$result1=mysqli_query($con,$sql1);
           while ($row=mysqli_fetch_array($result1)) {
           	$d_id=$row['iddoctor'];
               $name=$row['name'];
               $b_hos=$row['based_hospital'];
                }
//searching data - doc_type
 $sql2="select * from doc_type ";
 $result2=mysqli_query($con,$sql2);

        while ($row=mysqli_fetch_array($result2)) {
               $id=$row['iddoc_type'];
               $type=$row['doc_type'];
           }

//searching data - timetable
 $sql3="select * from timetable where doctor_iddoctor = '$doc' ";
 $result3=mysqli_query($con,$sql3);

$day="";
$time_from="";
$time_to="";
$number=0;
$branch=0;


	?>
</head>
<body>
<!--doctor's timetable-->
<div class="timetable">
	<div class="timetable_heading">
		<h2>Time Table</h2>
	</div>
	<div class="alert-info branch">
		<table class="branch_id_table">
			<tr>
				<th>Id</th>
				<th>Branch</th>
			</tr>
			<tr>
				<td>1</td>
				<td>Maharagama</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Piliyandala</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Kesbewa</td>
			</tr>
		</table>
	</div>
	<div class="timetable_graph">
		<table border="1" width="100%" cellpadding="10" cellspacing="10">
	<tr>
		<th>Doctor's Name</th>
		<th>Specility</th>
		<th>Based Hospital</th>
		<th>Branch id</th>
		<th>Avalible Days</th>
		<th>Time</th>
		<th>Room No.</th>
		<th></th>
	</tr>
	
		
		<style type="text/css">
			.branch_id_table{
			width: 250px;
			}
			.branch{
			width: 250px;
			padding: 15px;
			align-items: center;
			margin-left: 45%;
			margin-bottom: 2%;
			}
		</style>
		
		
		
		<?php 
		 while ($row=mysqli_fetch_array($result3)) {
               $day=$row['days'];
               $time_from=$row['time_from'];
               $time_to=$row['time_to'];
               $number=$row['room_no'];
               $branch=$row['branch_idbranch'];
               $id=$row['idtimetable'];


               echo '<tr><td>'.$name .'</td>';
               echo'<td>'.$type.'</td>';
               echo'<td>'.$b_hos.'</td>';
               echo'<td>'.$branch.'</td>';
                echo'<td>'.$day.'</td>';
                 echo'<td>'.$time_from.' - '.$time_to.'</td>';
                  echo'<td>'.$number.'</td>';
                  echo '<form action="appoinment.php" metho="post">
                  <input type="hidden" name="t_id" value="'.$id.'">
		<input type="hidden" name="d_id" value="'.$doc.'">
		<input type="hidden" name="branch" value="'.$branch.'">
		<input type="hidden" name="day" value="'.$time_from.'">
		<input type="hidden" name="date" value="'.$day.'">	
		<td><input type="submit" value="Make Appoinment">
		</td></tr>
	</form>';
    
           }
           //echo $day;
		 ?>
</table>
</div>
</div>
</body>
</html>