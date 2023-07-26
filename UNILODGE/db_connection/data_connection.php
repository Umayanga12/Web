<?php
// ("server" , "username" ,"password","database_name","port number")
$connection = mysqli_connect("localhost","root","","boding_book","3306");

//checking for the errors in the database connections
if(mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}
?>
