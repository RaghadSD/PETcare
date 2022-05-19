<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");
	


if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();
	

$petresult=mysqli_query($database, "select * from pet where id='".$_GET['id']."'");
$iPetDet = mysqli_fetch_assoc($petresult); 
    	
?>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
</head>
<body>
<section class="header">
  <nav> <a href="Manger homepage.html"> <img id=logo src="Image (2).jpeg"></a>
    <div>
      <div class="header-links">
        <ul>
          <li> <a href="page4Add.html"> Add Service </a> </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"> Appointments </button>
              <div class="dropdown-content"> 
              <a href="page5set.html"> Set Appointment </a> 
              <a href="page7ViewAppoitment.html"> All Appointments </a> 
              <a href="page6AcceptDecline.html"> Appointment Requests </a> 
              <a href="previous.html"> Previous Appointments </a> 
              <a href="page 3Upcoming.html"> Upcoming Appointments </a> </div>
            </div>
          </li>
          <li> <a href="Reviews.html"> Owners Review </a> </li>
          <li> <a href="Home.html"> Logout </a> </li>
          <li> <a href="owners.html"> Contact </a> </li>
        </ul>
      </div>
    </div>
  </nav>
</section>

<div class="wrapper" style="margin-top:-48% ;">
<div class="title"> Pet Profile </div>
<div class="field">
<form >
  <img style="padding-left: 30%;border-radius: 90%; height: 20%;width: 75%;" src="images/Kitten-Blog.jpg" alt="Pet photo">
  <div class="content">
    <p>
      <lable style="color: #617470;font-size: x-large;padding-top: 20%;">
      <?php echo $iPetDet['name']; ?> </p>
  </div>
  <div class="content">
    <p>
      <lable style="color: #000000;font-size: large;">
      <?php echo $iPetDet['breed']; ?> </p>
  </div>
  <div class="content">
    <p>
      <lable style="color: #617470;font-size: large;">
      <?php echo $iPetDet['gender']; ?>  </p>
  </div>
  <div class="content" >
    <p> Date Of Birth:  <?php echo $iPetDet['DOB']; ?> </p>
  </div>
  <div class="content">
    <p>
      <lable style="color: #617470;font-size: large;">
      <?php echo $iPetDet['neuterStatus']; ?> </p>
  </div>
  <div class="content">
    <p>Owner Email:</p>
  </div>
  <div class="content">
  <a href="mailto:<?php echo $iPetDet['emailO']; ?>" style="color: #617470;font-size: large;"> <?php echo $iPetDet['emailO']; ?> </a>
  </div>


   <div class="content" > <a style="color: #617470;font-size: large;" href="javascript:history.back()">Back</a>  </div>
</form>
</body>
</html>