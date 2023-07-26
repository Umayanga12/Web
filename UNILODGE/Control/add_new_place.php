<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="stylesheet" href="../style/error_msg.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<?php
include '../db_connection/data_connection.php';

session_start();
$uid = $_SESSION['iduser'];

$bord_name = $_POST['bord_name'];
$bord_address=$_POST['bord_address'];
$bord_number = $_POST['con_num'];
$bord_gender = $_POST['gender'];
$num_room = $_POST['num_of_room'];
$price = $_POST['price'];    
$facility = $_POST['face_dis'];


//$log = $_GET['log'];
//$lat = $_GET['lat'];


// $search_sql ="SELECT * FROM place WHERE logi='$log' && lati='$lat'";
// $search_result= mysqli_query($connection,$search_sql);

// $db_log ="";
// $db_lat ="";

// while($row = mysqli_fetch_array($search_result)){
//     $db_lat = $row['lati'];
//     $db_log = $row['logi'];
// }

if(isset($_FILES["file"])) {

    $file_name = $_FILES["file"]["name"];
    $temp_name = $_FILES["file"]["tmp_name"];

    // //getting the original size of the image
    // list($width, $height) = getimagesize($temp_name);

    // // Resize the image
    // $new_width = 280;
    // $new_height = 220;
    // $resize_image = imagecreatetruecolor($new_width, $new_height);
    // imagecopyresampled($new_image, $image_file, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    $query = "SELECT user_name && email FROM user WHERE iduser = '$uid'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['user_name'];
        $email = $row['email'];
        $folder_name = $username."_".$email."_"."img";
    }
    
    $upload_file = move_uploaded_file($temp_name,"./uploads/$folder_name/$file_name");
    //imagejpeg($temp_name, "./uploads/$folder_name/$file_name", 80);

    if($upload_file == 1){
        //$query = "INSERT INTO images (file_name) VALUES ('$new_file_name')";
        mysqli_query($connection, $query);

        header("location: ../dashboard.php");
    } else {
        echo '<div class="responsive-div">
    <img src="../images/error_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
    <div class="alert alert-danger" role="alert">
        <h3>Error - File cannot upload</h3>
        </div>
</div>';
    }

} else {
    echo '<div class="responsive-div">
<img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
<div class="alert alert-warning" role="alert">
<h3>No file was uploaded.</h3>
</div>
</div>'; 
}

if($db_lat==$lat && $db_log == $log){

    echo '<div class="responsive-div">
    <img src="../images/warning_msg_img.png" alt="Oh snap! Sorry! There was a problem with your request.">
    <div class="alert alert-warning" role="alert">
    <h3>The bording place alredy exit</h3>
    </div>
</div>'; 

}else{

    

}

?>
</body>
</html>