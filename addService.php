
<?php

if (!($database = mysqli_connect("localhost", "root", "")))
  die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
  die("<p>Could not open URL database</p>");

  if (isset($_POST['submit'])) {

      $name=$_POST['name'];
      $description=$_POST['description'];
      $price=$_POST['price'];
      $photo=addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));


      $query = "INSERT INTO service VALUES('$name','$description','$price','$photo')";
      $result = mysqli_query($database, $query);
      if ($result) {
          echo "<script>alert('Service has been added successfully')</script>";
      } else {
          echo "Error: Can not add new service!";
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
  <title> Add Service</title>
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
        <div class="title">Add Service</div>
       
  
        <div class="field">
            <form method = "post" action = "addService.php"  enctype="multipart/form-data" >
  
                <div class="field">
                    <input type="text" name = "name" id = "Service Name" placeholder = "checkup,grooming,...." >
                    <label>Service Name: </label>
                  </div>


                   
           
          <div class="field">
                    <input type="number" name = "price" id = "Service price" placeholder = "price"  >
                    <label>Service Price: </label>
                  </div>

                
                  <div class="field">
                    <input type="text" name = "description" id = "Service des" placeholder = "Description about the Service" >
                    <label for = "des"> Description: </label>
                  </div>

                  <div style="padding-top: 4%;padding-left: 6%;"> 
                  <p> <lable style="color: #617470; FONT-SIZE: 18PX ; ">  Photo <br<>
                    <input type = "file" name = "photo" id = "photo" required>
                <p>
                </div>
        <div class="field" >
            <input type="submit" name="submit" value="Add">
          </div>

     
        </form>
</div> 


  </body>

</html>
