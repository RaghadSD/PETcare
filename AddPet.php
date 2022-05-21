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
    $medHistory = $_POST['medHistory'];
    $vaccinations = $_POST['vaccinations'];
    $PBreed = $_POST['PBreed'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $NStatus =$_POST['NStatus'];
    $profile =addslashes(file_get_contents($_FILES["profile"]["tmp_name"]));

    $id =000; 
    $emaill = $_SESSION['email'];

    $query = "INSERT INTO pet VALUES('$id','$PName','$medHistory','$vaccinations','$profile','$gender','$PBreed','$date','$NStatus','$emaill')";
    $result = mysqli_query($database, $query);

    if ($result) {
        header('Location: petsprofiles.php');
    } else {
        echo "Error: can not create new user!";
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


     <div class="wrapper" style="margin-top:-45%;">
        <div class="title">Add Pet</div>
        
        <div class="field">
        <form method = "post" action = "" enctype="multipart/form-data" >
      

      <div class="field">
            <input type="text" name ="PName"required>
            <label>Pet Name</label>
          </div>
    
          <div class="field">
            <input style="color: #617470;" type="date" name ="date">
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

                    <div style=" padding-bottom:6%;padding-left: 25% ;font-size: larger;" > <lable style="color: #617470;"> Pet Profile photo <br<>
                        <input type="file" id="myFile" name="profile" required> </div> 


          <p style="color: #617470;">Optional fields</p> 
                   
        <div class="field">
            <input type="text" name ="vaccinations" >
            <label>vaccinations </label>
          </div>

        <div class="field">
            <input type="text" name ="medHistory">
            <label> Medical History  </label>
          </div>

         
      <p>
        <div class="field">
          <input  type="submit" value="Add" name="Add" > 
              </div> 
              </div> 
</div>
  
      </p>
      </form>

  </body>
  </html> 
