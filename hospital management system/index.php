<!DOCTYPE html>
<html lang="en">
<head>

     <title>Winton Hospital</title>
     <?php
     include 'libraries.php';
     ?>
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
<?php
include './inc/menu_bar.php';
?>

     

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make your life happier</h3>
                                             <h1>Healthy Living</h1>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Aenean luctus lobortis tellus</h3>
                                             <h1>New Lifestyle</h1>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Pellentesque nec libero nisi</h3>
                                             <h1>Your Health Benefits</h1>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>
     
     <section id="services" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Our Service</h2>
                         </div>
                    </div>

                     <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/Doctors_For_Men-732x549-thumbnail-1-732x549.jpg" class="img-responsive" alt="" style="height: 31vh;">

                                   <div class="team-info">
                                        <h3>Consultant</h3>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/MLT.jpeg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Laboratory</h3>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <img src="images/1_2X9CF59EFja5NARuBoGV8g.png" class="img-responsive" alt="" >

                                   <div class="team-info">
                                        <h3>Dental</h3>
                                   </div>

                         </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/34003.jpg" class="img-responsive" alt="" style="height: 31vh;">

                                   <div class="team-info">
                                        <h3>Ambulance</h3>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/ayurvedic-medicinmes-in-Punjab.jpg" class="img-responsive" alt="" style="height: 31vh;">

                                   <div class="team-info">
                                        <h3>Ayurvedic Treatement</h3>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <img src="images/CT_Scan_222.jpg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Scan & Checkup</h3>
                                   </div>

                         </div>
                    </div>
                    
               </div>
          </div>
          <style type="text/css">
               .btn:hover{
                    background-color: yellowgreen;
               }
          </style>       
          <center>
               <button style="margin-top: 3%; margin-bottom: 5%; font-weight: bold;" class="btn">

                    <a href="about.php #services">LEARN MORE </a>
               </button>
          </center>
     </section>

     <section id="google-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           

     <?php
     include 'inc/footer.php';
     ?>

</body>
</html>