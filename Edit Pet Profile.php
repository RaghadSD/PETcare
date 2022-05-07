<?php
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");

                if(isset($_POST['Update']))
                {
                    $id = $_POST['id'];

                    $query ="UPDATE 'pet' SET 
                    PName = '$_POST[PName]',
                    date = '$_POST[date]',
                PBreed = '$_POST[PBreed]',
                gender = '$_POST[gender]',
                NStatus = '$_POST[NStatus]',
                vaccinations ='$_POST[vaccinations]',
                MHistory ='$_POST[MHistory]',
                Petphoto ='$_POST[Petphoto]',
                where id ='$_POST[id]'";
                $query_run = mysqli_query($database,$query);
                
                if($query_run){
                    echo '<script type ="text/javascript"> alert ("data updated")</script>';
                    header('Location:  Pet profiles .html');
                }
                else{
                    echo '<script type ="text/javascript"> alert ("data not updated")</script>';
                    echo  $database->error;
                    exit();
                   }

                
?>

<!DOCTYPE html> 
<html> 
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="Style1.css">
  <link rel="stylesheet" href="home page style.css">
  <title>Edit Pet Profile </title>
  </head> 
<body>

    <section class="header">
        <nav> 
            <a href="Manger homepage.html"> <img id=logo src="Image (2).jpeg"></a>
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
                                <a href="add Pet.html"> Add Pet </a>
                                <a href="Pet Profiles .html"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book Appointment.html"> Book Appointment </a>
                                <a href="Appointment requests.html"> Appointment Requests </a>
                                <a href="Upcoming appointments.html"> Upcoming Appointment </a>
                                <a href="Previous Appointments.html"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="MyProfile.html"> View My Profile </a>
                                <a href="Edit My Profile.html"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="Home.html"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
                </ul>


            </div>

        </div>
        </nav>
       

    </section>
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Edit Pet Profile</div>
  
        <div class="field">
        <form method = "post" action = "#">
        
            <div class="field">
                <input type="text" name ="id">
                <label>Pet id</label>
              </div>
        <div class="field">
          <input type="text" name ="PName">
          <label>Pet Name</label>
        </div>
  
        <div class="field">
          <input type="date" name ="date">
          <label>Date Of Birth</label>
        </div>
  
        <div class="field">
          <input type="text" name ="PBreed">
          <label> Pet Breed </label>
        </div>
  
        <div class="content">
        <div class="radio">
         <label style="color: #617470;padding-right: 5%;font-size: larger;" for="gender">Gender:</label>
            <input type="radio" name="gender" value="Male" >
            <label for="male">male</label>
            <input type="radio" name="gender" value="Female" >
            <label for="female">female</label>
        </div></div>
  
        <div class="content">
          <div class="radio">
        <label style="color: #617470;padding-right: 5%;font-size: larger; "for="Neutered Status">Neutered: </label>
                  <input type="radio" name="NStatus" value="Spayed" >
                  <label for="Spayed">Spayed</label>
                  <input type="radio" name="NStatus" value="UnSpayed" >
                  <label for="UnSpayed">UnSpayed</label><br>
              </div></div>
  
              <div style="padding-left: 20% ;font-size: larger;" > <lable style="color: #617470;"> vaccinations <br>
                  <input  type="file" id="myFile" name="vaccinations">
              </div>
        
        <div style="padding-left: 20% ;font-size: larger;" > <lable style="color: #617470;"> Medical History <br>
          <input  type="file" id="myFile" name="MHistory">
      </div>
  
  
      <div style="padding-left: 20% ;font-size: larger;" > <lable style="color: #617470;"> Change Profile Photo <br>
          <input  type="file" id="myFile" name="Petphoto">
      </div>
  
          <div  class="field">
              <input type="submit" name="Update" value="Update">
              <div class="content">
                <a style="color: #617470;font-size: large;" href="PetProfile.html">Back</a>
             </div>
            </div>
        </p>
        </form>
  
      
  
      </div>


  </body>

</html> 
