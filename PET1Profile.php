<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");
?> 


<html>
    <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="Style1.css">
 <link rel="stylesheet" href="home page style.css">
  <title>Pet Profile</title>
  </head> 

  <body>
  <section class="header">
        <nav> 
            <a href="Owner homepage.html"> <img id=logo src="Image (2).jpeg"></a>
        <div>

            <div class="header-links">

                <ul>
                    <li> <a href="#ABOUTUS"> About </a> </li>
                    <!-- <li> <a href="#LoginOP"> Login </a> </li> -->
                    <li> <a href="#services"> Services </a> </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My pets </button>
                            <div class="dropdown-content">
                                <a href="AddPet.php"> Add Pet </a>
                                <a href="PetsProfiles.php"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book Appointment.php"> Book Appointment </a>
                                <a href="Appointment requests.php"> Appointment Requests </a>
                                <a href="Upcoming appointments.php"> Upcoming Appointment </a>
                                <a href="Previous Appointments.php"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="ownerprofile.php"> View My Profile </a>
                                <a href="UpdateOwnerProfile.php"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
                </ul>


            </div>

        </div>
        </nav>
        

    </section>


    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title"> Pet Profile</div>
       
        <div class="field">
  
     <form>  

     <img style="padding-left: 12%;border-radius: 90%; ;" src="images/images.jpeg" alt="Pet photo">

     <?php  

        if(isset($_GET['Viewid'])){
          $id=$_GET['Viewid'];

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
     //echo "<script>alert('Error: Can get profile info!')</script>";
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
  </div>

   
  <div class="signup-link">View Owner? <a href="OwnerProfile.php">Owner</a></div>'
  ;
    
        } else {
      echo "<script>alert('Error: Cannot Delete Pet!')</script>";
      echo  $database->error;
       exit();
      }

}
       ?>       
        
        </form>



  </body>
  </html> 