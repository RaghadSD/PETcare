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


    if (isset($_POST['submit'])) {

        
        $title=$_POST['title'];
        $description=$_POST['Textt'];
        $location=$_POST['location'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $emailM=$_SESSION['email'];
        $picture=addslashes(file_get_contents($_FILES["picture"]["tmp_name"]));
        

        $query2 = "UPDATE aboutus SET email='$email' , description='$description', title='$title' , picture='$picture', location='$location', phoneNumber='$phone'  where Id=1 ";
        $result2 = mysqli_query($database, $query2);
        if ($result2) {
            echo "<script>alert('About Us has been updated successfully')
            window.location.href='manager-home.php';
            </script>";
        } else {
            echo "<script>alert('Error: Cannot update About Us!')</script>";
            echo  $database->error;
            exit();
        }
    }


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reviews-style.css">
    <meta charset="utf-8">
    <title>Edit About Us</title>
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
              <button class="dropbtn"> Appointments </button>
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
    <section class="edit-about-section" id="ABOUTUS">
        
    <div>
        <form action="editAboutUs.php" method="post" enctype="multipart/form-data">
        <?php


           $query3 = "SELECT * FROM aboutus";
           $result3 = mysqli_query($database,$query3);
           

          $rows2 = mysqli_fetch_array($result3);
          
          

?>
            <label for="label">Label</label> <br>

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="feilds" id="email" name="title"  required>
                </div>
            </div>
            <br>
            <label for="label">Text</label> <br>
            <textarea class="feilds" id="message" rows="5"  name="Textt" required></textarea>
            <br>
            <label for="pic">Picture</label><br>
            <input type="file" name="picture" class="feilds" style="padding-top: 10px; padding-bottom: 10px;" required>
            <br>
            <label for="location">Location</label><br>
            <input type="text" name ="location" class="feilds" >
            <br>
            <label for="Phone">Phone Number</label><br>
            <input type="text" name = "phone" class = "feilds">
            <br>
            <label for="email">Email</label><br>
            <input type="email" name="email" class="feilds">
            <br>

            <input type="submit" name="submit" value="Submit" class="editAboutt" style="height: 45px;
            width: 145px;">
            <a href="manager-Home.php" class="editAboutt"> Cancel </a>
            </section>

        </form>
    </div>

    </section>


</html>
