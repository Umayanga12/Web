<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Our Doctors</title>
</head>
<link rel="stylesheet" type="text/css" href="design/doc_detail.css">
<?php 
include 'libraries.php';
 ?>
<body>
<?php
include 'inc/menu_bar.php';
?>
<!--search doc -->
<section>
    <center>
          <div class="search_doc" style="margin-bottom: 5%;">
          <h4>Search Doctors</h4>
         <form>
          <section>
               <select name="doc_type" name="d_type">
                 <option>Please Select the Specilisit </option>

               <?php

               include './database_connection/Database_connection.php';
               $dt=0;
                if(isset($_GET['doc_type'])){
                     $dt=$_GET['doc_type'];
                }

               $sql="select * from doc_type";
               $result=mysqli_query($con,$sql);


          while ($row=mysqli_fetch_array($result)) {
               $id=$row['iddoc_type'];
               $type=$row['doc_type'];

               if($dt==$id){
                     echo '<option selected value="'.$id.'">'.$type.'</option>';
               }else{
                     echo '<option value="'.$id.'">'.$type.'</option>';
               }
              
          }

          ?>

          </select>

          </section>
          <br>
              <input type="submit" value="Search Doctors">
         </form> 
     </div>
    </center>
</section>

<!--search result-->
<style type="text/css">
     .profile_card{
          align-items: center;
          width: 50%;
          background-color: lightskyblue;
          margin-left: 25%;
          border-radius: 15px;
     }

</style>

<section>
      <h4 id="a"></h4>
      <?php 

               include './database_connection/Database_connection.php';

               if(isset($_GET['doc_type'])){

                    $doc=$_GET['doc_type']; 

               $sql1="select * from doctor where doc_type_iddoc_type = '$doc' ";
               $result1=mysqli_query($con,$sql1);
           while ($row=mysqli_fetch_array($result1)) {
               $doc_id=$row['iddoctor'];
               $name=$row['name'];
               $b_hos=$row['based_hospital'];

              echo ' 
              <div class="profile_card" style="margin-bottom: 2% ;" id="doc-profile_card">
          <div class="card_img"><img src="images/avatar-2.png" style="width: 300px; float: left; margin-right: 8%; border-radius: 15px;"></div>
          <div>
               <form action ="./doc_shedual_graph.php">
               <label style="padding-top: 10%;"><h5> Name : </h5></label>
               <label name="doc_name"><h5>'.$name.'</h5></label>
               <br>
               <label><h5>Based Hospital : </h5></label> 
              <label><h5>'.$b_hos.'</h5></label>
               <br> <br>
               <input type="hidden" name="d_id" value="'.$doc_id.'">
               <input type="submit" value="Check Avalability" style="margin-bottom: 11%;">
           </form>
          </div>
     </div>';
          }    

           }
          ?>


</section>

<?php
include 'inc/footer.php';
?>
</body>
</html>