<?php

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    if (isset($_POST['submit'])) {

        $service=$_POST['service'];
        $date=$_POST['date'];
        $time=$_POST['time'];


        $query = "INSERT INTO appointment (date,time,serviceName) VALUES('$date','$time','$service')";
        $result = mysqli_query($database, $query);
        if ($result) {
            echo "<script>alert('Appointment has been added successfully')</script>";
        } else {
            echo "Error: can not set new appointment!";
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
  <title> Set Appointment</title>
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
                        <li> <a href="page4Add.html"> Add Service </a> </li>
    
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn"> Appointments </button>
                                <div class="dropdown-content">
                                    <a href="page5set.html"> Set Appointment </a>
                                    <a href="page7ViewAppoitment.html"> All Appointments </a>
                                    <a href="page6AcceptDecline.html"> Appointment Requests </a>
                                    <a href="previous.html"> Previous Appointments </a>
                                    <a href="page 3Upcoming.html"> Upcoming Appointments </a>
                                </div>
                            </div>
                        </li>
                        <li> <a href="Reviews.html"> Owners Review </a> </li>
                        <li> <a href="Home.html"> Logout </a> </li>
                        <li> <a href="owners.html"> Contact </a> </li>
                    </ul>
    
    
                </div>
    
            </div>
        </nav>
       

    </section>
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Set Appointment</div>
       
  
        <div class="field">
            <form method = "post" action = "setAppointment.php">
  
  


           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px; color: #617470;" name="service" id="pet">
             <option value="Classic Bath,Brush & Nails" >Classic Bath,Brush & Nails</option>
             <option value="Deluxe Bath,Brush & Nails">Deluxe Bath,Brush & Nails</option>
             <option value="Spaying Surgery">Spaying Surgery</option>
             <option value="Exams & Consultations">Exams & Consultations</option>
             <option value="Dentistry">Dentistry</option>
           </select>
           </div></div> 
           
           <div class="field">
            <input type="date" name ="date" >
            <label>Date </label>
          </div>

          <div class="field">
            <input type="time" name ="time" >
            <label>Time </label>
          </div>

    

        <div class="field">
            <input type="submit" value="Set" name="submit">
          </div>

     
        </form>
</div> 


  </body>

</html>
