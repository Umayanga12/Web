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
$db_email="";
$db_use_name ="";
$db_nic="";
$db_pass="";
$db_name="";

//sql query to serch the data base 
$sql="SELECT * FROM user WHERE iduser=$uid";

//$sql="SELECT * FROM user";

//exhicuting the quary
$result=mysqli_query($connection,$sql);

//rectrivee the data to search that the users with the same user name 
while ($row=mysqli_fetch_array($result)) {
	$db_email=$row['email'];
    $db_use_name = $row['user_name'];
    $db_con_num = $row['contact'];
}

//creating the folder name
$folder_name = $db_use_name."_".$db_email."_"."img";

//getting the bording places details
$sql_boding="SELECT * FROM bording_palces WHERE iduser=$uid";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="./Js/reg.js"></script>
    <!--<script src="https://cdn.tailwindcss.com"></script>!-->
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/button.css">
</head>
<body>
    
    <div class="container">
        <div class="box">
            <img src="./images/UNILODGE.png" alt="">
            <ul>
            <li><?php echo $db_use_name ; ?></li>
                <li><?php echo $db_email; ?></li>
                <li><?php echo $db_con_num; ?></li>
                <li>
                    <center>
                    <a href="../edit_user_detail.php">
                        <button class="Btn">Edit profile detail
                        <svg class="svg" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                        </button>
                        </a>
                    </center>
                </li>
                <li>
                    <center>
                    <button>
                        <a href="../control/log_out.php">
                        <button class="log_Btn">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        
                        <div class="text">Logout</div>
                        </button>
                        </a>
                    </button>
                    </center>
                </li>
                <li><i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i></li>
                <li>
                    <center>
                    <a href="../Control/delete_user.php">
                <button class="button">
                <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                </button>
                </a>
                    </center>
                </li>
            </ul>
        </div>
    
        <div class="About">
            <div class="title">New Bording Registration</div>
            <div class="content">
                <form action="../Control/add_new_place.php" method ="post"  enctype="multipart/form-data">
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
                                <div id="map"  class=" map1"  name="map" >
                                </div>
                                <div>
                                <!--   Cancel & confirm buttons -->
                                <button id="cancelBtn" type="button" class="bg-red-500 text-red-900 rounded-md p-1">Undo Selection</button>
                                <button id="confirmBtn" type="button"class="bg-green-500 text-green-900 rounded-md p-1">Confirm </button>
                                </div>
                            </div>
                                <!-- IIFE Below (only API KEy) -->
                                <script>
                                (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                                    ({key: "AIzaSyB00xJTicICPDFwtoGDS8BtktScvXiznCI", v: "beta"});
                                </script>
                                <div class="up-img">
                                        <label class="up-text">Upload Your Boarding Images</label>
                                        <input type="file" name ="file">
                                    
                                </div>
                                    
                        <div class="buttona">
                            <input type="submit" value="Register">
                        </div>
                    </div>    
        
                </form>
        </div>
    </div>    
    <ul class="groups">
        <li>
            <div class="card">
                <div class="image-session">
                    <span class="image" style="background-image: url('./images/DSC_4723.jpg');"></span>
                </div>
                <div class="meta-sission">
                    <div class="head">
                        <a href="#" class="catogry">Category</a>
                    </div>
                    <div class="body">
                        <h2 class="title"> Bording</h2>
                        <p class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur ex
                            corporis nisi dignissimos quam debitis enim repellat explicabo consequatur.</p>
                    </div>
                    <div class="footer">
                        <a href="../edit-place/edit_palce.php" class="button1">Edit</a>
                    </div>
                    <div class="foot">
                        <a href="../Control/delete_place_detail.php" class="button1">Delete</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</body>
</html>