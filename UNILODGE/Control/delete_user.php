<?php
include '../header/session.php';

$query = "SELECT user_name && email FROM user WHERE iduser = '$uid'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['user_name'];
    $email = $row['email'];
    $folder_name = $username."_".$email."_"."img";
}

$sql="DELETE FROM user WHERE iduser='$uid'";
$sql_place="DELETE FROM place WHERE iduser='$uid'";

$result=mysqli_query($connection,$sql);
$delete_result=mysqli_query($connection,$sql_place);

if($result && $delete_result){

    $flag=unlink("./uploads/$folder_name");
    header('Location:../index.html');

}
else{
    echo "Error:".$sql;
}

?>