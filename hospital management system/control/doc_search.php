<?php 
include '../database_connection/Database_connection.php';

$d_name=$_GET['doc_name'];

$doc_name="";

$sql="select * from doctor where name = $d_name";
$result=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($result)) {
	$doc_name=$row['name'];
	
}

echo $doc_name;
		
 ?>