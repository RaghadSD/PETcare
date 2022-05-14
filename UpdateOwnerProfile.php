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

    $emaill = $_SESSION['email'];

 
       $query= "UPDATE owner SET phoneNumber='$phoneNumber',Fname='$Fname',Lname='$Lname' WHERE email= '$emaill'";

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
                                <a href="Book Appointment.php"> Book Appointment </a>
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
        <div class="title"> Edit My Profile</div>

                <form id="addform" action="UpdateOwnerProfile.php" method="POST" enctype="multipart/form-data">

                <?php


                   $query3 = "SELECT * FROM owner";
                   $result3 = mysqli_query($database,$query3);


                   $rows2 = mysqli_fetch_array($result3);?>

                   
                        <div class="field">
                            <input type="text" name ="Fname" value="<?php echo $rows2['Fname'];?>">
                            <label>First Name</label>
                        </div>

                        <div class="field">
                            <input type="text" name ="Lname" value="<?php echo $rows2['Lname'];?> ">
                            <label>Last Name </label>
                        </div>


                        <div class="field">
                            <input type="tel" name ="phoneNumber" value="<?php echo $rows2['phoneNumber']; ?>">
                            <label> Phone Number </label>
                        </div>					

                        
                        <lable style="color: #617470;" for="myfile">Change Profile photo?</label>
                        <input type="file" id="fileToUpload1" name="fileToUpload1"  > 

                        <br><br>
                        <div class="field">
                        <input type="submit" value="update" name="update" />
                        </div>
                   

                </form>
            </div>

        </main>

    </body>
</html>