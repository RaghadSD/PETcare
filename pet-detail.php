<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");
	


if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();

    	
?>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
</head>
<body>
<section class="header">
  <nav> <a href="manager-home.php"> <img id=logo src="Image (2).jpeg"></a>
    <div>
      <div class="header-links">
        <ul>
          <li> <a href="addService.php"> Add Service </a> </li>
          <li>
            <div class="dropdown">
              <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> Appointments </button>
              <div class="dropdown-content"> 
              <a href="setAppointment.php"> Set Appointment </a> 
              <a href="page7ViewAppoitment.php"> All Appointments </a> 
              <a href="page6AcceptDecline.php"> Appointment Requests </a> 
              <a href="previous.php"> Previous Appointments </a> 
              <a href="upcoming.php"> Upcoming Appointments </a> </div>
            </div>
          </li>
          <li> <a href="Reviews.php"> Owners Review </a> </li>
          <li> <a href="Home.php"> Logout </a> </li>

        </ul>
      </div>
    </div>
  </nav>
</section>

<div class="wrapper" style="margin-top:-48% ;">
<div class="title"> Pet Profile </div>
<div class="field">
<form >

<?php  

        if(isset($_GET['id'])){
          $id=$_GET['id'];

          $q = "select profilePic from pet WHERE Id='$id'";
                            $newResult = mysqli_query($database,$q);
                            $ReqSTATresult = mysqli_fetch_assoc($newResult);
                            $img= $ReqSTATresult['profilePic'];

                        if(!empty($img)){ ?>
                           
                         <img style="   margin: auto;display: block;border-radius: 90%; height: 130px;  width: 150px; ;" src="data:image/jpeg;base64, <?php echo base64_encode($ReqSTATresult['profilePic']) ;?>">
                           <?php
                        }
                           else{
                            echo "<img style='   margin: auto;display: block;border-radius: 90%; height: 130px;  width: 150px; ;' src='images/profile-male.jpeg' alt='profile picture'>";
                           }
                           $query="SELECT * FROM `pet` WHERE Id='$id'";

                           $result = mysqli_query($database, $query);
                           if ($result) {                   
                            $row= mysqli_fetch_assoc($result);
                            $name=$row['name'];
                            $gender=$row['gender'];
                            $vaccinations=$row['vaccinations'];
                            $profilePic=$row['profilePic'];
                            $breed=$row['breed'];
                            $DOB=$row['DOB'];
                            $neuterStatus=$row['neuterStatus'];
                            $medHistory=$row['medHistory'];
                            $owneremail = $row['emailO'];
                       
                            echo  ' <div class="content">
                            <p> <lable style="color: #617470;font-size: x-large;padding-top: 20%;">'.$name.' </p>
                         </div>
                       
                         <div class="content">
                            <p> <lable style="color: #000000;font-size: large;"> '.$breed.' </p>
                         </div>
                         
                         <div class="content">
                            <p> <lable style="color: #617470;font-size: large;"> '.$gender.' </p>
                         </div>
                          <div class="content" >
                            <p>  Date Of Birth: '.$DOB.'</p>
                         </div>
                       
                          <div class="content">
                            <p> <lable style="color: #617470;font-size: large;"> '.$neuterStatus.' </p>
                         </div>';
                         
                         if(!empty($vaccinations)){
                             
                           echo '<div class="content" >
                          <p style="color: #617470;font-size: large;">  Vaccinations: '.$vaccinations.'</p>
                        </div>'; }
                        
                        if(!empty($medHistory)){
                           
                            echo '<div class="content" >
                              <p style="color: #617470;font-size: large;">  Medical History: '.$medHistory.'</p>
                            </div>';}?>

                            <div class="content">
                            <p>Owner Email:</p>
                          </div>
                          <div class="content">
                          <a href="mailto:<?php echo $row['emailO']; ?>" style="color: #617470;font-size: large;"> <?php echo $row['emailO']; ?> </a>
                          </div>
                            <?php
                            }
                       
                       else { 
                             echo  $database->error;
                              exit();
                             }
                         }
                              ?>  
                              <div class="content" > <a style="color: #617470;font-size: large;" href="javascript:history.back()">Back</a>  </div>     
                               
                               </form>
</body>
</html>
