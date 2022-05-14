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

            if (isset($_POST['Add'])) {

                $PName = $_POST['PName'];
                $date = $_POST['date'];
                $PBreed = $_POST['PBreed'];
                $gender = $_POST['gender'];
                $NStatus = $_POST['NStatus'];
                $vaccinations =$_POST['vaccinations'];
                $MHistory =$_POST['MHistory'];
                $Petphoto =$_POST['Petphoto'];

                $id =000; 
                $emaill = $_SESSION['email'];

                $query = "INSERT INTO pet VALUES('$id','$PName','$MHistory','$vaccinations','$Petphoto','$gender','$PBreed','$date','$NStatus','$emaill')";
                $r_update = mysqli_query($database, $query);
                if ($r_update) {
                    echo "<script>alert('Pet has been Add successfully')</script>";
                    header("location: PetsProfiles.php");
                } else {
                    echo "<script>alert('Error: can not Add new Pet!')</script>";
                    echo  $database->error;
                    exit();
                }
            
            }
            ?>

<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Add Pet </title>
  </head> 

  <body>
    <section class="header">
        <nav> 
            <a href="Manger homepage.php"> <img id=logo src="Image (2).jpeg"></a>
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
                                <a href="add Pet.php"> Add Pet </a>
                                <a href="Pet Profiles .php"> View My Pets </a>
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
                                <a href="MyProfile.php"> View My Profile </a>
                                <a href="Edit My Profile.php"> Edit My Profile </a>
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


    <div class="wrapper" style="margin-top:-45% ;">
        <div class="title">Add Pet</div>
        
        <div class="field">
        <form action="addpet.php" method="POST">
           
            
      
        <div class="field">
            <input type="text" name ="PName"required>
            <label>Pet Name</label>
          </div>
    
          <div class="field">
            <input style="color: #617470;" type="date" name ="date"   >
            <label>Date Of Birth</label>
          </div>
        

        <div class="field">
            <input type="text" name ="PBreed"required>
            <label> Pet Breed </label>
          </div>

          <div class="content">
            <div class="radio" style="padding-top: 5%;">
             <label style="color: #617470;padding-right: 5%;font-size: larger;" for="gender">Gender:</label>
                <input type="radio" name="gender" value="Male"required >
                <label for="male">male</label>
                <input type="radio" name="gender" value="Female"required >
                <label  for="female">female</label>
            </div></div>

            <div class="content">
                <div class="radio">
              <label style="color: #617470;padding-right: 5%;font-size: larger;" for="Neutered Status">Neutered:</label>
                        <input type="radio" name="NStatus" value="Spayed" required>
                        <label for="Spayed">Spayed</label>
                        <input type="radio" name="NStatus" value="UnSpayed"required >
                        <label for="UnSpayed">UnSpayed</label><br>
                    </div></div>


            <div style="padding-left:20% ;font-size: larger;" > <lable style="color: #617470;"> vaccinations <br>
                <input  type="file" id="myFile" name="vaccinations">
            </div>
      
      <div style="padding-left:20% ;font-size: larger;" > <lable style="color: #617470;"> Medical History <br>
        <input type="file" id="myFile" name="MHistory">
    </div>


    <div style=" padding-bottom:6%;padding-left: 20% ;font-size: larger;" > <lable style="color: #617470;"> Change Profile Photo <br>
        <input  type="file" id="myFile" name="Petphoto">
    </div>

        <div class="field">
            <input type="submit" value="Add" name="Add"> 
          </div>
           
        </form>
</div> 
</div>



  </body>