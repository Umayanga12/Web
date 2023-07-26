<?php
include '../header/session.php';

$place = $_GET['placeid'];
$bord_name = $_GET['bord_name'];
$bord_address=$_GET['bord_address'];
$bord_number = $_GET['con__num'];
$bord_gender = $_Get['gender'];
$num_room = $_GET['num_room'];
$price = $_GET['price'];    
$facility = $_GET['face_dis'];
$log = $_GET['log'];
$lat = $_GET['lat'];
$file_name = $_FILES["filename"]["name"];
$temp_name = $_FILES["filename"]["tmp_name"];

$query = "SELECT * FROM user WHERE iduser = '$uid'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['user_name'];
        $email = $row['email'];
        $imag = $row['imag_name'];
        $folder_name = $username."_".$email."_"."img";
    }

if($file_name == $imag){

    // $query = "INSERT INTO images (file_name) VALUES ('$new_file_name')";
    // $insert_data = "INSERT INTO place () VALUES ()";
    // mysqli_query($connection, $query);
    // mysqli_query($connection, $insert_data);
    

}else{

    if(isset($_FILES["filename"])) {

        //getting the original size of the image
        list($width, $height) = getimagesize($image_file);
    
        // Resize the image
        $new_width = 280;
        $new_height = 220;
        $resize_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image_file, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        $upload_file = move_uploaded_file($resize_image,"./uploads/$folder_name/$file_name");
        imagejpeg($resize_image, "./uploads/$folder_name/$file_name", 80);
    
        if($upload_file == 1){
            // $query = "INSERT INTO images (file_name) VALUES ('$new_file_name')";
            // $insert_data = "INSERT INTO place () VALUES ()";
            // mysqli_query($connection, $query);
            // mysqli_query($connection, $insert_data);
    
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

}

?>