<?php
session_start();

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    if (isset($_POST['submit'])) {

        $service=$_POST['service'];
        $date=$_POST['date'];
        $time=$_POST['time'];


        $query = "INSERT INTO appointment (status,date,time,serviceName) VALUES('new','$date','$time','$service')";
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
  <nav> <a href="manager-home.php"> <img id=logo src="Image (2).jpeg"></a>
    <div>
      <div class="header-links">
        <ul>
          <li> <a href="addService.php"> Add Service </a> </li>
          <li>
            <div class="dropdown">
              <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> Appointments </button>
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
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Set Appointment</div>
       
  
        <div class="field">
            <form method = "post" action = "setAppointment.php">
  
  


            <!-- edited :) -->
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
            <label>Service </label>

           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px; color: #617470;" name="service" id="pet">
           <?php


           $query2 = "SELECT name FROM service";
           $result2 = mysqli_query($database,$query2);



            if(mysqli_num_rows($result2)>0)
              {

            while($rows2 = mysqli_fetch_array($result2))
             {

           ?>


             <option value="<?php echo $rows2['name']; ?>" ><?php echo $rows2['name']; ?></option> 
             <?php
            }}
            ?>
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
