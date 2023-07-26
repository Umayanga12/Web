<!DOCTYPE html>
<html lang="en">
<head>
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
//start the session 
session_start();

//import the database connection
include "../db_connection/data_connection.php";

//getting the user inputs from the login pages 
$email = $_POST['email'];
$pass_w = $_POST['pass'];

//sql qyary for the search the user table of the database 
$sql = "SELECT * FROM user WHERE email='$email'";

//declearing the variable to catch data form the database
$db_email ="";
$db_passowrd ="";
$user_id ="";

//exhicte the database connection and the sql quary and pass it to the variable 
$result= mysqli_query($connection,$sql);

//checking weather the user inputs are null 
if($email == "" || $pass_w == ""){
    echo '<div class="responsive-div">
                <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
                <div class="alert alert-warning" role="alert">
                <h3>Enter the Login Detail</h3>
                </div>
            </div>'; 
}else{
    //rectrive the data form the datbase
    while($row = mysqli_fetch_array($result)){
        $db_email = $row['email'];
        $db_passowrd = $row['password'];
        $user_id = $row['iduser'];

        //if the user inpute eqaul to user input  check weather user input equal to the DB password 
        if($db_email == $email){

            if ($db_passowrd == $pass_w) {
                // if the both user name and apssword that enterd by the user equal to the DB data then regrate to the dashboard
                $_SESSION['iduser'] = $user_id;
                header("location:../pro-main/dashboard.php");

            }else{
                // if the password is worng 
                echo '<div class="responsive-div">
                <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
                <div class="alert alert-warning" role="alert">
                <h3>Enter the correct Password</h3>
                </div>
            </div>'; 
            break;
            }
        }else{
            echo '<div class="responsive-div">
                <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
                <div class="alert alert-warning" role="alert">
                <h3>Enter the correct Email</h3>
                </div>
            </div>'; 
            break;
        }
    }
}

?>
    
</body>
</html>

