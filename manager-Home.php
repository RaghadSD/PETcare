<?php
session_start();


if(!isset($_SESSION['email'])) {
    header("location: login-manager.php");
    // The exit() function prints a message and exits the current script. It is an alias of the die() function.
    exit();
}	

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    
$query3 = "SELECT * FROM aboutus";
$result3 = mysqli_query($database,$query3);


$rows2 = mysqli_fetch_array($result3);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Pet care</title>
    <meta charset="utf-8">
    <meta neme="viewport" contenet="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home page style.css">
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



        <div class="description">
            <h1>
                Your Pet Deserves the Best.
            </h1>
            <p>
                ​We chase the absolute highest standards of safety in everything we do!
                <br> Our goal is to make sure all pets in our care are happy, safe and comfortable.
            </p>
            <a id="mabs" href="#ABOUTUS" class="more"> More about us!</a>
          
        </div>

    </section>
    <section class="Services" id="services">
        <br>
        <h1> Our services </h1>
        <br>
        <div class = "row"> 
            <div class = "Services-column"> 
    
                <h3> Classic Bath, Brush & Nails </h3>
                <p>
                    Teethbrushing, facial mask naturally exfoliates and hydrates leaving your pets 
                    face with a brighter, fresh smelling complexion, nail trim, and nail filing.  <br>
                    <img src = "pet-shampoo.png" />
                </p>
            </div>
            <div class = "Services-column"> 
                <h3> Delux Bath, Brush & Nails </h3>
                <p>
                    Professional groomers start each cut and style experience with a moisturizing 
                    massage and bath before cutting, drying, and styling your pet. 
                    <img src = "bathtub.png" />
    
                </p>
            </div>
            <div class = "Services-column"> 
                <h3> Shaving & Haircut </h3>
                <p>
                    Create the perfect look for your pet! We offer full haircuts, bath and neaten, 
                    and maintenance brushing from our list of pet grooming services. <br>
                    <img src = "beauty-saloon.png" />
                </p>
            </div>
        </div>
        <div class = "row2"> 
            <div class = "Services-column"> 
                <h3> Spaying Surgery </h3>
                <p>
                 Our surgical suite is supplied with professional surgical tables, anesthesia monitors, 
                  and other equipment to keep your pet as safe as possible during the procedure.  <br>
                 <img src = "medicine.png" />
                </p>
            </div>
    
            <div class = "Services-column"> 
                <h3> Exams & Consultations </h3>
                <p>
                  Our vets provide physical examination services to check for potential health problems and recommend 
                  proper treatment and work-up if needed.  
                    <img src = "medicine (1).png" />
    
                </p>
            </div>
            <div class = "Services-column"> 
                <h3> Dentistry </h3>
                <p>
                Dental care is a critical part of your pet’s overall health regimen to prevent oral disease. One of the most 
                 common conditions of small animals is Periodontal Gum Disease.      <br>       
                  <img src = "surgery.png" />
                </p>
            </div>
    </section>


    <section class="about-section" id="ABOUTUS">
        <div class="box">
            <h1><?php echo $rows2['title'];?> </h1>
            <p class="about-content">
            <?php echo $rows2['description'];?> 
            </p>
            <div class="words">
                <span class="active">Thalassotherapy</span>
                <span>Balneotherapy</span>
                <span>Aromatherapy</span>
            </div>
            <br> <br>
            <a href="editAboutUs.php" class="editAbout"> Edit About us </a>

        </div>
    </section>

    

</body>

</html>