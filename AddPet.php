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
                                <a href="Book Appointment.php"> Book Appointment </a>
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


    <div class="wrapper" style="margin-top:-45% ;">
        <div class="title">Add Pet</div>
        
        <div class="field">
        <form action="addpet.php" method="POST">
           
            
      
        <div class="field">
            <input type="text" name ="PName"required>
            <label id = "qq">Pet Name</label>
          </div>
    
          <div class="field">
            <input style="color: #617470;" type="date" name ="date"   >
            <label id = "qq">Date Of Birth</label>
          </div>
        

        <div class="field">
            <input type="text" name ="PBreed"required>
            <label id = "qq"> Pet Breed </label>
          </div>

            <div class="radioLeft" style="padding-top: 5%;">
             <label   id = "test" style="color: #617470; padding-left: 5% ; font-size: larger;" for="gender">Gender:</label>
                <input type="radio" name="gender" value="Male"required >
                <label  id = "test" style="font-size: 19px;" for="male">male</label>
                <input type="radio" name="gender" value="Female"required >
                <label  id = "test" style="font-size: 19px;" for="female">female</label>
            </div>
<br>
                <div class="radioLeft">
              <label style="color: #617470; padding-left: 5% ; font-size: larger;" for="Neutered Status">Neutered:</label>
                        <input type="radio"  name="NStatus" value="Spayed" required>
                        <label id = "test" style="font-size: 19px;" for="Spayed">Spayed</label>
                        <input type="radio" name="NStatus" value="UnSpayed"required >
                        <label  id = "test" style="font-size: 19px;" for="UnSpayed">UnSpayed</label><br>
                    </div>
                    <br>



    <div id = "qq"> <lable id = "qq" style="color: #617470; padding-left: 5% ; font-size: 19px;"> Change Profile Photo  <input style = "padding-left: 5% ;" type="file" id="myFile" name="Petphoto">
    </div>


<p id = "qq" style=" font-size: 19px; padding-left: 5% ; color: #617470;">Optional fields</p>          
        <div class="field">
            <input type="text" name ="vaccinations" >
            <label style = " font-size: 19px;" id = "qq">vaccinations </label>
          </div>

        <div class="field">
            <input type="text" name ="MHistory">
            <label id = "qq"> Medical History  </label>
          </div>

        <div class="field">
            <input type="submit" value="Add" name="Add"> 
          </div>
           
        </form>
</div> 
</div>



  </body>