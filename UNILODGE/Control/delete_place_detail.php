<?php
include("../db_connection/connection.php");

$place_id=$_GET['place_id'];

$query = "SELECT user_name && email FROM user WHERE iduser = '$uid'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['user_name'];
    $email = $row['email'];
    //getting the folder name 
    $folder_name = $username."_".$email."_"."img";
    $image_name = $row['img_name'];
}

$sql="DELETE FROM place_detail WHERE place_id='$place_id'";

$result=mysqli_query($conn,$sql);


if($result){
    
    //delete the respective image
    $flag=unlink("./uploads/$folder_name/$image_name");

    header("Location:../dashboard.php");
}
else{
    echo "Error:".$sql;
}



?>