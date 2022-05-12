<?php 
        session_start();
        
    require "mail.php";

    if(isset($_POST['sendM'])) {
       $email = $_POST['Email'];
       $message = $_POST['message'];
       $Subject = $_POST['title'];
       send_mail($email, $Subject, $message);
       function_alert("Email has been sent successfully");
    }

    function function_alert($message) {
        // Display the alert box
        echo "<script>alert('$message');</script>";
    }
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
                                <a href="AddPet.php"> Add Pet </a>
                                <a href="Pet Profiles .html"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Appointments </button>
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
                            <button class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="MyProfile.html"> View My Profile </a>
                                <a href="dalalabout.php"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
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
            <h1>About Us!</h1>
            <p class="about-content">
                Our caring team creates a relaxing environment for your pet in our modern spa
                facilities, which are designed to cater to the comfort of our furry guests.
                Our pet spa is fully stocked with hypoallergenic shampoos, conditioners and
                products designed specifically to be safe and gentle on a pet’s skin and coat.
                Our place attendants are highly trained at handling pets of all sizes and breeds,
                and know how to put your pup at ease during any treatment.
            </p>
            <div class="words">
               
            <span class="active">Riyadh, Hitten</span>
                <span ><a  href="tel:1-212-555-5555" style="text-decoration: none; color: #617470; background-color: transparent ;"> (212) 555-2368 </a></span>
                <span ><a id ="words" href="mailto:PetCare@gmail.com" style="text-decoration: none; color: #617470; background-color: transparent ;">PetCare@gmail.com </a></span>
            </div>
        </div>
    </section>

    <section id="contact">

        <h1 class="contact-header">Contact us!</h1>

        <div class="contact-wrapper">

            <!-- Left contact page -->

            <form id="contact-form" class="form-horizontal" role="form" method = "post" action = "Owner homepage.php">

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="feilds" id="name" name="title" placeholder="TITLE" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="feilds" id="email" name="Email" placeholder="EMAIL" required>
                    </div>
                </div>

                <textarea class="feilds" id="message" rows="5" placeholder="MESSAGE" name="message" required></textarea>

                <button class="send-button" name = "sendM" id="submit" type="submit"> SEND </button>

            </form>

            <!-- Left contact page -->

            <div class="contact-information"> <BR><BR> <BR><BR><BR><BR>
                <hr>
                <ul class="contact-list">
                    <li class="list-item"><span class="contact-text place"> Riyadh, Hitten</span></li>

                    <li class="list-item"><span class="contact-text phone"><a href="tel:1-212-555-5555"> (212) 555-2368
                            </a></span></li>

                    <li class="list-item"><span class="contact-text email"><a href="mailto:PetCare@gmail.com">
                                PetCare@gmail.com </a></span></li>
                </ul>

                <hr>

            </div>

        </div>

    </section>

</body>

</html>