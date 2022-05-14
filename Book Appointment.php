<?php

session_start();

$ID = $_SESSION['ID'];

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

if(isset($_POST['book'])){

    $petName = $_POST['pet'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['Notes'];

    $petID = "SELECT id From pet where idO = $ID && name ='$petName' " ;
    $result = mysqli_query($database, $petID);
    $query_executed = mysqli_fetch_assoc ($result);
    $petID = $query_executed['id'];
    
$query = "INSERT INTO appointment VALUES (DEFAULT , 'request', '$note','$date','$time',DEFAULT,DEFAULT,'$service','$petID','$ID')";
if ($result=mysqli_query($database, $query))
function_alert("Appointment requested successfully");




}
function function_alert($message) {
      
    // Display the alert box
    echo "<script>alert('$message');</script>";
}
               

?>
<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Book Appointment</title>
  </head> 

  <body>
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
                                <a href="Edit My Profile.html"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
                </ul>


            </div>

        </div>
        </nav>
       

    </section>
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Book Appointment</div>
       
        <div class="field">
            <form method = "post" action = "Book Appointment.php">
  
  
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
            <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="pet2" id="pet">
            <option disabled selected>Choose your pet</option>
           
            <?php
            $records = mysqli_query($database, "SELECT name From pet where idO = '$ID';");
            while ($data = mysqli_fetch_array($records)) {
            echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['name']) . "</option>";
             }
             ?>
            </select>
           </div></div>


           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 

           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="service" id="service">

           <option disabled selected>Choose service</option>

           <?php
           $records = mysqli_query($database, "SELECT name From service");
       
           while ($data = mysqli_fetch_array($records)) {
                echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['name']) . "</option>";
            }
            ?>
           </select>
           </div>
        </div> 
           
           <div class="field">
            <input type="date" name ="date" >
            <label>Date </label>
          </div>

          <div class="field">
            <input type="time" name ="time" >
            <label>Time </label>
          </div>

       

        <div class="field">
            <input type="text" name = "Notes" id = "Notes" placeholder = "Any thing You want to tell us about!" >
            <label for = "Notes"> Notes: </label>
          </div>

        <div class="field">
            <input name= "book" type="submit" value="Book">
          </div>

     
        </form>
</div> 


  </body>

</html>
