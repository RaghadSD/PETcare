<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");
                

  // $emaill = $_SESSION['email'];
?> 


<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title>My Profile</title>
  </head> 

  <body>
  <section class="header">
  <nav> 
            <a href="Owner homepage.php"> <img id=logo src="Image (2).jpeg"></a>
        <div>

            <div class="header-links">

                <ul>
                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My pets </button>
                            <div class="dropdown-content">
                                <a href="AddPet.php"> Add Pet </a>
                                <a href="PetsProfiles.php"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book-table.php"> Book Appointment </a>
                                <a href="Appointment requests.php"> Appointment Requests </a>
                                <a href="Upcoming appointments.php"> Upcoming Appointment </a>
                                <a href="Previous Appointments.php"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="ownerprofile.php"> View My Profile </a>
                                <a href="UpdateOwnerProfile.php"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>


            </div>

        </div>
        </nav>
     

</section>


    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title"> My Profile</div>
       
        <div class="field">
  
     <form>
    <!-- <img style="padding-left: 18%;border-radius: 80%;" src="images/images-1.jpeg" alt="my profile photo">-->
            
     <?php

     $emaill = $_SESSION['email'];

     $q = "select profilePic from owner WHERE `email` ='$emaill'";
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

   $query= "SELECT * FROM `owner` WHERE `email` ='$emaill'";
  
   $result = mysqli_query($database, $query);

   if ($result) {
        $row= mysqli_fetch_assoc($result);
        $Fname=$row['Fname'];
        $Lname=$row['Lname'];
        $phoneNumber=$row['phoneNumber'];
        $profilePic=$row['profilePic'];
        $gender=$row['gender'];
        
        // echo "<script>alert('Error: Can get profile info!')</script>";

          echo  '<div class="content">
          <p> <lable style="color: #617470;font-size: x-large;padding-top: 15%;"> '.$Fname.' '.$Lname.' </p>
       </div>
        <div class="content" >
       <p> <label> <a style=" color: #000;font-size: large;"href="mailto:'.$emaill.' ">'.$emaill.' </a></p>
    </div>

     <div class="content">
       <p> <lable style="color: #617470;font-size: large;"> '.$phoneNumber.' </p>
    </div>

     <div class="content">
       <p> <lable style="color: #000000;font-size: large;">'.$gender.' </p>
    </div> 
    <div class="content">
        <a style="color: #617470;font-size: large;" href="UpdateOwnerProfile.php">Edit</a>
        <a style="color: #617470;font-size: large;"href="DeleteOwner.php"">Delete</a>
        
     </div>';
}

    else {
       echo "<script>alert('Error: Cannot get profile info!')</script>";
       //echo  $database->error;
       exit();
   }   
     ?>       

        
        </form>

  </body>
