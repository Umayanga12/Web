<?php

//start the session 
session_start();

//assing the user id to the session 
$uid = $_SESSION['iduser'];

//import the database connection  
include './db_connection/data_connection.php';

// check weather the session is set, if not then regrate to the login page 
if(isset($_SESSION['iduser'])){

}else{
    //regratin to the login page
    header("location:./login.html");
}

?>