<?php
 


if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Services</title>
        <link rel="stylesheet" href="reviews-style.css">
    </head>

    <body>

    <?php

$role = $_GET['role'];
if(isset($_GET['role'])){
  if(!isset($_SESSION['role'])){
      $_SESSION['role']=$_GET['role'];
  }
}
$role = $_SESSION['role'];

if($role == 'manager'){
    ?>
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
    <?php
}

if($role=='owner')
{
    ?>
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
    <?php
}

if($role=='guest'){
    ?>

<section class="header">
<nav> 
  <a href="home.php"> <img id=logo src="Image (2).jpeg"></a>

<div> 
    <div class="header-links">

    </div>
    
</div>
</nav>
</section>
    <?php
}

?>



        <section id="heading">
            <div class="headerr">
                <h1>Our services</h1>
            </div>
              
    <section class="Services" id="services">
        <br>

        <div class = "row" style="align:center;"> 
           <?php
                $service= "select * from service";
                $res = mysqli_query($database,$service);
                if(mysqli_num_rows($res)>0)
                 {

                 while($serRow = mysqli_fetch_array($res))
                 {
                ?>
            <div class = "Services-column"> 
                
    
                <h3> <?php echo $serRow['name']; ?> </h3>
                <p>
                <?php echo $serRow['description']; ?><br>
                price: <?php echo $serRow['price']; ?> SR
                      <br>
                      <img  style = "width:100px; height:100px;"alt="service picture" src="data:image/jpeg;base64, <?php echo base64_encode($serRow['photo']) ;?>">
                      
                </p>
            </div><br>
         
            <?php
                 }
                }
            ?>
            </div> 
            
       </section>



        </section>


    </body>


</html>
