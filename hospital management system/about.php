<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About</title>
</head>
<body>
	<?php
	include 'libraries.php';
	include 'inc/menu_bar.php';
	?>

	<!--adout-->
	<style type="text/css">
		.about{
			margin-bottom: 10%;
	padding: 5%;
}
.about img{
	width: 40%;
	border-radius: 15px;
	float: left;
	padding-right: 5%;
}
.about_tital{
	padding-top: 10%;
}
.aboutus_dis{
	align-items: center;
	font-size: 17px;
	margin-left: 5%;
	padding-top: 5%;
}
	</style>
	<section>
		<div class="about">
			<div class="aboutus">
				<center>
					<h4>About Us</h4>
				</center>
			</div>
			<div class="aboutus_img"><img src="images/news-image3.jpg"></div>
			<div class="aboutus_dis">
				Wintan Hospital is a super secret facility in Sri Lanka. The facility was spread out in September 2008. The Wintan Hospital offers its clients a private, tasteful and elective decision to standard clinical gathering with eight directing rooms and 38 visiting master trained professionals.
			</div>
		</div>
	</section>
<!-- vision--->
<style type="text/css">
	.vision{
		padding: 5%;
		margin-bottom: 10%;
	}
	.vision_dis p{
       align-items: center;
       font-size: 17px;
	  margin-left: 5%;
	  padding-top: 5%;
	}
	.vision img{
		width: 40%;
		float: left;
		padding-right: 5%;
	}
</style>
	<section>
		<div class="vision">
			<div class="vision_tital">
				<center>
					<h4>Our Vision</h4>
				</center>
			</div>
			<div>
				<img src="images/CT_Scan_222.jpg">
			</div>
			<div class="vision_dis">
				<p>
				The vision of Wintan Hospital is providing ancillary services to the cancer hospital and caters to the growing needs of Maharagama, Kesbewa and Piliyandala electorates. 
				</p>
			</div>
		</div>
	</section>

	<!--facility-->

	<style type="text/css">
	.facility_dis p{
       align-items: center;
       font-size: 17px;
	  margin-left: 5%;
	  padding-top: 5%;
	  padding: 5%;
	}
	.facility img{
		width: 40%;
		float: left;
		padding-right: 5%;
	}
</style>
	<section>
		<div class="facility" style="padding: 5%;">
			<div class="facility_tital">
				<center><h4>About Our Facilities</h4></center>
			</div>
			<div class="facility_img">
				<img src="images/MLT.jpeg">
			</div>
			<div class="facility_dis">
				<p>Wintan Hospital is a 187 bed acute medical and advanced surgical hospital situated at Maharagama. The hospital is owned and operated by Wintan Health Care Ltd, the largest operator of private hospitals in Australia. Winton Hospital provides lots of  private health care services. The hospital is a  Surgery Department licensed provider of Cardiothoracic surgery. The hospital is home to the Hunter Cancer Centre providing a private comprehensive oncology care in medical, surgical and radiation oncology.</p>
			</div>
		</div>
	</section>
	<style type="text/css">
		.services{
			padding: 5%;
			margin: 5%;
		}
	</style>
	<section id="services">
		<div class="serv">
			<div class="serv_tital">
				<center>
					<h4>Other Services</h4>
				</center>
			</div>
			<div class="serv_img">
				<img src="images/123.jpg" style="width: 50%; margin-left: 25%;">
			</div>
			<div class="serv_dis" style="padding: 5%;">
				<h5>Emergency Department</h5>
				<p>In March 2015 the Region’s first Private Emergency Department was opened at Lake Macquarie Private, providing another option for people requiring emergency care. The Emergency Department has 6 beds including a state of the art resuscitation room, triage room and procedure room. The enthusiastic team of emergency trained doctors and nurses provide prompt and professional care 24 hours a day, 365 days of the year.</p>
				<h5>Coronary Care Unit</h5>
				<p>10 monitored beds with 24 hour medical cover – specialising in chest pain management, the before and after care related to interventional and diagnostic cardiac procedures.</p>
				<h5>Intensive Care Unit</h5>
				<p>12 beds with haemodynamic monitoring. Staffed by Intensivists, experienced ICU trained nursing staff and 24 hour dedicated medical cover.  The ICU specialises in post operative care for cardiothoracic and other advanced surgical procedures.</p>
				<h5>Coronary Angiography Suite</h5>
				<p>Comprises two Cardiac Catheterisation Laboratories providing the latest equipment for both diagnostic and interventional procedures including Coronary Angioplasty, stenting and Electrophysiology Studies.</p>
		        <h5>Operating Theatre Suite</h5>
		        <p>7 Operating Rooms, includes a designated cardiac surgery theatre and two orthopaedic theatres.</p>
		        <h5>Endovascular Laboratory</h5>
		        <p>Providing a wide range of endovascular procedures including endoluminal grafting.</p>
		        <h5>Post Anaesthetic Care Unit</h5>
		        <p>10 monitored, first stage recovery beds meeting the standards of the Australian and New Zealand College of Anaesthetists.</p>
		        <h5>Day Surgery Unit</h5>
		        <p>6 recliners and 6 bed, second stage recovery area accommodating a wide range of same day surgical procedures.</p>
		        <h5>Day Oncology Unit</h5>
		        <p>A purpose designed and built, private Chemotherapy Unit. 8 recliner chairs plus 1 bed private room. Treatments include chemotherapy regimens, blood transfusions, IV rehydration, specialist drug infusions for a range of different disorders and diseases and iron infusions.</p>
		        <h5>GP - Pre Admission Medical Clinic</h5>
		        <p>The aim of the PAMC is to improve our pre-admission process and obtain a more comprehensive medical history for patients admitted to Lake Macquarie Private Hospital. Patient’s current medications are fully documented and their medical history forms part of the Hospital’s medical record for that admission.</p>
			</div>
		</div>
	</section>
		<?php
	include 'inc/footer.php';
	?>
	
</body>
</html>