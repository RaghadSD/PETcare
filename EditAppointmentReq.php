<?php

session_start();
$ID = $_SESSION['ID'];

if(isset($_GET['id'])){
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=$_GET['id'];
    }
}

if (!isset($_SESSION['email']) ) { 
    header("location: login.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

if(isset($_POST['Update'])){

    $petName = $_POST['pet2'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['Notes'];


    $petID = "SELECT id From pet where idO = $ID && name ='$petName' " ;
    $result = mysqli_query($database, $petID);
    $query_executed = mysqli_fetch_assoc ($result);
    $petID = $query_executed['id'];

    $emaill = $_SESSION['email'];
    $Updateid=$_GET['Updateid'];
    
//$query = "INSERT INTO appointment VALUES (DEFAULT , 'request', '$note','$date','$time',DEFAULT,DEFAULT,'$service','$petID','$emaill')";
//$query = "UPDATE `appointment` SET ,`note`='$note',`date`='$date',`time`='$time,`serviceName`='$service',`petId`='$petID',`emailOwner`='$emaill' WHERE id='$Updateid'";
$query = "UPDATE appointment SET  date='$date', time='$time', serviceName='$service' , petId = '$petID' ,note = '$note' WHERE id='$Updateid'";
if ($result=mysqli_query($database, $query))
function_alert("Appointment request updated successfully");

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
  <title> Edit Appointment Request </title>
  </head> 

  <body>
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
                                <a href="Book Appointment.php"> Book Appointment </a>
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

    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Edit Request</div>
       
        <div class="field">
            <form method = "post" action = "EditAppointmentReq.php">

            <?php
         $emaill = $_SESSION['email'];
         $Updateid=$_GET['Updateid'];
       
         $query3 = "SELECT * FROM appointment WHERE id= '$Updateid'";
         $result3 = mysqli_query($database,$query3);
         $rows2 = mysqli_fetch_array($result3);
         ?>
  
  
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
            <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="pet" id="pet">
            <option disabled selected>Choose your pet</option>
            <?php
            $records = mysqli_query($database, "SELECT name From pet where idO = '$ID';");
            while ($data = mysqli_fetch_array($records)) {
            echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['name']) .
           "</option>";
             }
             ?>
            </select>
           </div></div>

           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="service" id="service">
           <option selected> Choose a service </option>
           <?php
           $records = mysqli_query($database, "SELECT name From service");
       
           while ($data = mysqli_fetch_array($records)) {
            ?>
            <option value="<?php echo $data['name']; ?>"> <?php echo $data['name']; ?></option>
            <?php
           }
            ?>

           </select>
           </div>
        </div>
           
        <div class="field">
            <input type="date" name ="date" value="<?php echo $row['date']; ?>">
            <label>Date </label>
          </div>

          <div class="field">
            <input type="time" name ="time"  value="<?php echo $row['time']; ?>">
            <label>Time </label>
          </div>


        <div class="field">
            <input type="text" name = "Notes" id = "Notes" 
            placeholder = "Any thing You want to tell us about!" >      
            <label for = "Notes"> Notes: </label>
          </div>

   
          <div class="field">
            <input name= "Update" type="submit" value="Update">
          </div>

        </form>
</div> 


  </body>

</html>

