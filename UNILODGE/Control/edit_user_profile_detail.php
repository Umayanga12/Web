<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warning</title>
</head>
</style>
<link rel="stylesheet" href="../style/error_msg.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<?php
//get the user inputs
$nam = $_POST['name'];
$use_name = $_POST['user_name'];
$pass = $_POST['psw'];
$c_pass = $_POST['psw-repeat'];
$nic = $_POST['nic'];
$email = $_POST['email'];
$con_num = $_POST['pn'];

include '../header/session.php';

//declearing the variable to assing the data from the database
$db_email="";
$db_use_name ="";
$db_uid="";
$db_nic="";
$db_pass="";
$db_name="";

//sql query to serch the data base 
$sql="SELECT * FROM user WHERE iduser=$uid";

//exhicuting the quary
$result=mysqli_query($connection,$sql);

//rectrivee the data to search that the users with the same user name 
while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
    $db_use_name = $row['user_name'];
    $db_uid = $row['iduser'];

}

$sql_dup = "SELECT * FROM user WHERE iduser!=$uid ";
$result_dup=mysqli_query($connection,$sql_dup);

while ($row=mysqli_fetch_array($result_dup)) {
	$db_dup_email=$row['email'];
    $db_dup_use_name = $row['user_name'];
    
    if($use_name == $db_dup_use_name){
        echo '<div class="responsive-div">
            <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
            <div class="alert alert-danger" role="alert">
                <h3>This username is alredy exits !!</h3>
                ';
    }elseif($email==$db_dup_email){
        echo '<div class="responsive-div">
        <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
        <div class="alert alert-danger" role="alert">
            <h3>This email is alredy exits !!</h3>
            ';
    }else{
        echo "success" ; 
    }

}

//checking weather the password and the comfirmed password is same 
if($pass == $c_pass){
     // check for the empty input datas
    if ($nam=="" || $use_name=="" || $email=="" || $nic=="" ||$pass=="") {
        echo '<div class="responsive-div">
        <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
        <div class="alert alert-danger" role="alert">
            <h3>Please Enter the Detail !!</h3>
            </div>
    </div>';
    
    } else {
        $file_path = '../uploads/';
        $rename = $file_path.$use_name."_".$email."_"."img";
        $old_folder_name =$file_path.$db_use_name."_".$db_email."_"."img";
        //if rename the folder then update the data at the database.
        if (rename($old_folder_name,$rename)) {
            // data update quary
            $sql="UPDATE user SET name='$nam',email='$email',nic='$nic',user_name='$use_name',password='$pass'  WHERE iduser=$uid";
            
            // if the detail updating process is fail display the error 
            if (!mysqli_query($connection,$sql)) {
                die(mysqli_error($con));
            }
            header('location:../login.html');
        } else {
            echo'<div class="responsive-div">
            <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
            <div class="alert alert-warning" role="alert">
            <h3>Cannot Update the detail !!!</h3>
            </div>
        </div>';
        }
    }

    }else{

    echo'<div class="responsive-div">
    <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
    <div class="alert alert-warning" role="alert">
    <h3>Passwords are not matched !!!</h3>
    </div>
</div>';

}


?>
</body>
</html>
