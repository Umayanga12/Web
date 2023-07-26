<?php
//start the session 
session_start();

//assing the user id to the session 
$uid = $_SESSION['iduser'];

//import the database connection  
include '../db_connection/data_connection.php';

// check weather the session is set, if not then regrate to the login page 
if(isset($_SESSION['iduser'])){

}else{
    //regratin to the login page
    header("location:./login.html");
}

//declearing the variable to assing the data from the database


//sql query to serch the data base 
$sql="SELECT * FROM bording_place WHERE user_iduser='$uid' ";


//exhicuting the quary
$result=mysqli_query($connection,$sql);

//rectrivee the data to search that the users with the same user name 
while ($row=mysqli_fetch_array($result)) {
	$db_dis=$row[''];
    $db_add = $row[''];
    $db_name = $row[''];
    $lot = $row[''];
    $log = $row[''];
    $ntown = $row[''];
    $room = $row[''];
    $db_price = $row[''];
    $pnumber =$row[''];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="module" src="./Js/reg.js"></script>
    <!--<script src="https://cdn.tailwindcss.com"></script>!-->
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/button.css">
</head>
<body>
    
    <div class="container">
        <div class="About">
            <div class="title">Edit Bording Details</div>
            <div class="content">
                <form action="../Control/edit_place_det.php" method ="post"  enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Bording Name</span>
                            <input type="text" placeholder="Enter bording name" required name="bord_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Bording Address</span>
                            <input type="text" placeholder="Enter your Bording Address" required name="bord_address">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" placeholder="Enter Bording number" required  name="con_num">
                        </div>
                        <div class="input-box">
                            <span class="details">Number of Rooms</span>
                            <input type="text" placeholder="Number of Rooms" required name="num_of_room">
                        </div>
                        <div class="input-box">
                            <span class="details">Price (Per month)</span>
                            <input type="text" placeholder="Confirm your password" required name="price">
                        </div>
                    </div>
                        <div class="gender-details">
                            <input type="radio" name="gender" id="dot-1" value="male">
                            <input type="radio" name="gender" id="dot-2" value="female">
                            <input type="radio" name="gender" id="dot-3" value="male_female">
                            <span class="gender-title">Gender</span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span id="gender">Male</span>
                                </label>
                                <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span id="gender">Female</span>
                                </label>
                                <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span id="gender">Male or Female</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="gender-details">
                            <input type="radio" name="bording" id="dot-4" value="house">
                            <input type="radio" name="bording" id="dot-5" value="apart">
                            <input type="radio" name="bording" id="dot-6" value="room">
                            <span class="gender-title">Bording</span>
                            <div class="category">
                                <label for="dot-4">
                                    <span class="dot four"></span>
                                    <span id="gender">House</span>
                                </label>
                                <label for="dot-5">
                                    <span class="dot five"></span>
                                    <span id="gender">Apartment</span>
                                </label>
                                <label for="dot-6">
                                    <span class="dot six"></span>
                                    <span id="gender">Rooms</span>
                                </label>
                            </div>
                        
                        
                            <div class="text-com">
                                <label class="up-text">Facilities</label>
                                <div class="tcomment">
                                    <textarea class="textinput" placeholder="Comment" name="face_dis"></textarea>
                                </div>
                            </div>
                        </div>
                    
                        
                        
                            <div class="map-1">
                                <label class="up-text">Select Your location</label>
                                <div class="alret alert-warning">
                                        <p>If you donot add new location the exciting location will be displayed !!</p>
                                    </div>
                                <div id="map"  class=" map1"  name="map" >
                                </div>
                                <div >
                                <!--   Cancel & confirm buttons -->
                                <button id="cancelBtn" type="button" class="bg-red-500 text-red-900 rounded-md p-1" style="margin-top :2%;">Undo Selection</button>
                                <button id="confirmBtn" type="button"class="bg-green-500 text-green-900 rounded-md p-1" style="margin-top :2%;">Confirm </button>
                                </div>
                            </div>
                                <!-- IIFE Below (only API KEy) -->
                                <script>
                                (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                                    ({key: "AIzaSyB00xJTicICPDFwtoGDS8BtktScvXiznCI", v: "beta"});
                                </script>
                                <div class="up-img">
                                    <div class="alret alert-warning">
                                        <p>If you upload another image the current image will be delete !!</p>
                                    </div>
                                        <label class="up-text">Upload Your Boarding Images</label>
                                        <input type="file" name ="file">
                                </div>
                                    
                        <div class="buttona">
                            <input type="submit" value="Edit detail">
                        </div>
                    </div>    
        
                </form>
        </div>
    </div>    
</body>
</html>