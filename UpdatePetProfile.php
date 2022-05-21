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

             
              

            if (isset($_POST['Update'])) {

                $PName = $_POST['PName'];
                $date = $_POST['date'];
                $PBreed = $_POST['PBreed'];
                $gender = $_POST['gender'];
                $neuterStatus = $_POST['neuterStatus'];
                $vaccinations =$_POST['vaccinations'];
                $medHistory =$_POST['medHistory'];
                
                $profile =addslashes(file_get_contents($_FILES["profile"]["tmp_name"]));

                $emaill = $_SESSION['email'];
                $id=$_GET['Updateid'];


                $query ="UPDATE `pet` SET `name`='$PName',`medHistory`='$medHistory',`vaccinations`='$vaccinations',`profilePic`='$profile',`gender`='$gender',`breed`='$PBreed',`DOB`='$date',`neuterStatus`='$neuterStatus' WHERE Id='$id'";
                $r_update = mysqli_query($database, $query);
                if ($r_update) {
                    echo "<script>alert('Pet has been Updated successfully')</script>";
                   header("location: petsprofiles.php");
                } else {
                    echo "<script>alert('Error: can not Update Pet!')</script>";
                    header("location: petsprofiles.php");
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
  <title> Update Pet Profile </title>
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


    <div class="wrapper" style="margin-top:-45% ;">
        <div class="title">Update Pet Profile</div>
        
        <div class="field">
        <form action="" method="POST" enctype="multipart/form-data" >
        
       
        <?php
        $emaill = $_SESSION['email'];
        $id=$_GET['Updateid'];
         $query3 = "SELECT * FROM pet WHERE Id='$id'";
         $result3 = mysqli_query($database,$query3);
         $rows2 = mysqli_fetch_array($result3);
         ?>

        <div class="field">
            <input type="text" name ="PName" value="<?php echo $rows2['name'];?>">
            <label>Pet Name</label>
          </div>
    
          <div class="field">
            <input style="color: #617470;" type="date" name ="date"   value="<?php echo $rows2['DOB'];?>">
            <label>Date Of Birth</label>
          </div>
        

        <div class="field">
            <input type="text" name ="PBreed"value="<?php echo $rows2['breed'];?>">
            <label> Pet Breed </label>
          </div>

          <div class="content">
            <div class="radio" style="padding-top: 5%;">
             <label style="color: #617470;padding-right: 5%;font-size: large;" for="gender">Gender:</label>
                <input type="radio" name="gender" value="Male"required <?php
                if( $rows2['gender']== "Male")
                echo "checked";
                ?> >
                <label for="male">male</label>
                <input type="radio" name="gender" value="Female"required  
                <?php
                if( $rows2['gender']== "Female")
                echo "checked";
                ?> 
              >
                <label  for="Female">Female</label>
            </div></div>

            <div class="content">
                <div class="radio">
              <label style="color: #617470;padding-right: 5%;font-size: large;" for="Neutered Status">Neutered:</label>
                        <input type="radio" name="neuterStatus" value ="Spayed"
                        <?php
                         if( $rows2['neuterStatus']== "Spayed")
                          echo "checked";
                           ?> >
                        <label for="Spayed">Spayed  </label>
                        <input type="radio" name="neuterStatus" value ="UnSpayed"
                         <?php
                         if( $rows2['neuterStatus']== "UnSpayed")
                          echo "checked";
                           ?>   >
                        <label   for="UnSpayed"> UnSpayed</label><br>
                    </div></div>


                    <div style=" padding-bottom:6%;padding-left: 25% ;font-size: larger;" > <lable style="color: #617470;"> Pet Profile photo <br<>
                        <input type="file" id="myFile" name="profile"  > </div> 


<p style="color: #617470;">Optional fields</p>          
        <div class="field">
            <input type="text"   name ="vaccinations"  value="<?php echo $rows2['vaccinations'];?>">
            <label>vaccinations </label>
          </div>

        
          <div class="field">
            <input type="text" name ="medHistory" value="<?php echo $rows2['medHistory'];?>">
            <label>Medical History  </label>
          </div>
        <div class="field">
            <input type="submit" value="Update" name="Update"> 
          </div>
           
        </form>
</div> 
</div>



  </body>
