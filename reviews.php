<?php
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reviews</title>
        <link rel="stylesheet" href="reviews-style.css">
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

        <section id="heading">
            <div class="headerr">
                <span>Comments</span>
                <h1>Reviews</h1>
            </div>

            <div class="container">

            <?php

            $connect= mysqli_connect("localhost","root","");
            $database = mysqli_select_db($connect,"petcare1");
            $query = "SELECT * FROM appointment";
            $result = mysqli_query($connect,$query);

            if(!$connect){
                die("<script>alert('Connection Failed')</script>");
            }

            if(mysqli_num_rows($result)>0)
            {

            while($rows = mysqli_fetch_array($result))
            {

                if (!empty($rows['review'])){

                ?>

                <div class="box">
                <div class="box-header">
                    <div class="profile">
                        
                        <div class="pic">
                            <?php 
                            $owwner = "select Fname, Lname, email from owner, appointment where email=emailOwner";
                            

                            $query2=mysqli_query($connect,$owwner);
                            
                            if(mysqli_num_rows($query2)>0) 
                            {

                           $row = mysqli_fetch_assoc($query2);
                           
                            
                            $emaill=$row['email'];

                            $q = "select profilePic from owner where email='$emaill'";
                            $newResult = mysqli_query($connect,$q);
                            $ReqSTATresult = mysqli_fetch_assoc($newResult);
                            $img= $ReqSTATresult['profilePic'];

                        if(!empty($img)){ ?>
                           
                            <img alt="profile picture" src="data:image/jpeg;base64, <?php echo base64_encode($ReqSTATresult['profilePic']) ;?>">
                           
                           <?php

                        }
                           else{
                            echo "<img src='images/profile-male.jpeg' alt='profile picture'>";
                           }
                            ?>

                        </div>

                        <div class="username">

                            <strong><?php 
                            

                            echo $row['Fname'] . " " . $row['Lname'];
                           }
                            
                            ?></strong>
                            <span><?php echo $rows['emailOwner'];?></span>
                    
                        </div>


                    </div>

                    <div class="review">

                    </div>

                    <div class="comment">
                        <p><?php  echo $rows['review']; ?></p>
                    </div>

                </div>
            </div>
            <?php
            }
             } 
            }
            ?>
            



        </section>

    </body>


</html>
