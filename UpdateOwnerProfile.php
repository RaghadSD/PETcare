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

             
              

                if (isset($_POST['update'])) {
    
                    $phoneNumber = $_POST['phoneNumber'];
                    $Fname = $_POST['Fname'];
                    $Lname = $_POST['Lname'];
                    $gender = $_POST['gender'];
                    $emaill = $_SESSION['email'];
                    $password = $_POST['password'];
                    $profile =addslashes(file_get_contents($_FILES["profile"]["tmp_name"]));
              
                    $query= "UPDATE owner SET phoneNumber='$phoneNumber',Fname='$Fname',Lname='$Lname',password='$password',`gender`='$gender' , profilePic ='$profile' WHERE email= '$emaill'";
           $r_update = mysqli_query($database, $query);
          if ($r_update) {
            echo "<script>alert('profile has been updated successfully')</script>";
            header("location: OwnerProfile.php");
          } else {
            echo "<script>alert('Error: Cannot update profile!')</script>";
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

  <title>Edit My Profile </title>
  </head> 

    <body >
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
        <div class="title"> Edit My Profile</div>

                <form id="addform" action="" method="POST" enctype="multipart/form-data">
                <?php
        $emaill = $_SESSION['email'];
       
         $query3 = "SELECT * FROM owner WHERE email= '$emaill'";
         $result3 = mysqli_query($database,$query3);
         $rows2 = mysqli_fetch_array($result3);
         ?>
                   
                        <div class="field">
                            <input type="text" name ="Fname" value="<?php echo $rows2['Fname'];?>">
                            <label  id = "test">First Name</label>
                        </div>

                        <div class="field">
                            <input type="text" name ="Lname" value="<?php echo $rows2['Lname'];?> ">
                            <label  id = "test">Last Name </label>
                        </div>

                        


                        <div class="field">
                            <input type="test" name ="phoneNumber" value="<?php echo $rows2['phoneNumber']; ?>">
                            <label  id = "test"> Phone Number </label>
                        </div>					

                       
                        <div class="field">
                            <input type="test" name ="password" value="<?php echo $rows2['password'];?> ">
                            <label  id = "test"> Password </label>
                        </div>
                         <br>
                        <div class="radioLeft">
            <div  id = "test" class="radio" style="font-size: 19px;">
             <label id = "test" style="color: black; padding-left: 5% ; font-size: 19px;" for="gender">Gender:</label>
                <input type="radio" name="gender" value="Male"required <?php
                if( $rows2['gender']== "Male")
                echo "checked";
                ?> >
                <label id = "test" for="male">male</label>

                <input type="radio" name="gender" value="Female"required  
                <?php
                if( $rows2['gender']== "Female")
                echo "checked";
                ?> 
              >
                <label  for="Female">Female</label>
            </div></div>

                  <br>  

                        
                          <div style=" padding-bottom:6%;padding-left: 25% ;font-size: larger;" > <lable style="color: #617470;"> Change Profile photo <br<>
                        <input type="file" id="myFile" name="profile" value = <?php  $rows2['profilePic']; ?> > </div> 

                        <div class="field">
                        <input type="submit" value="update" name="update" />
                        </div>
                   

                </form>
            </div>

        </main>

    </body>
</html>
