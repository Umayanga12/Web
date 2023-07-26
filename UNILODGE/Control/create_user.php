<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<link rel="stylesheet" href="../style/error_msg.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<?php
include '../db_connection/data_connection.php';

$nam = $_POST['name'];
$use_name = $_POST['user_name'];
$pass = $_POST['password'];
$c_pass = $_POST['com_pass'];
$nic = $_POST['nic'];
$email = $_POST['email'];
$pnnum = $_POST['pn_num'];

include "./serch_exit_user_data.php";

if($pass == $c_pass){
    if($db_use_name=="" && $db_email ==""){

        $inser_quey = "INSERT INTO user(name,email,nic,user_name,password,contact) VALUES ('$nam','$email','$nic','$use_name','$pass','$pnnum')";

        if (!mysqli_query($connection,$inser_quey)){													
            $error = die(mysql_errno($connection));
            echo '<div class="responsive-div">
            <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
            <div class="alert alert-danger" role="alert">
                <h3>'.$error.'</h3>
                ';
        }else{

            $folder_name = $use_name."_".$email."_"."img";
            $test_folder = mkdir("../uploads/$folder_name");

            if($test_folder!=1){
                echo '<div class="responsive-div">
                <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
                <div class="alert alert-warning" role="alert">
                <h3>Note : </h3><p>Registration process has completed with Errors. You are unable to upload images. To mitigate that error user must delete the Account and do the registration process again</p>
                </div>
            </div>';
            }else{

                header("location:../login.html");
            }
        }
    }else {

        if($db_email == $email){
            echo '<div class="responsive-div">
        <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
        <div class="alert alert-danger" role="alert">
            <h3>This email is alredy exits !!</h3>
            ';
        }elseif( $db_use_name == $use_name){
            echo '<div class="responsive-div">
            <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
            <div class="alert alert-danger" role="alert">
                <h3>This username is alredy exits !!</h3>
                ';
        }
}

} else{

    echo '<div class="responsive-div">
    <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
    <div class="alert alert-danger" role="alert">
        <h3>Passwords are not matched !!!</h3>
        ';

}

?>
</body>
</html>

