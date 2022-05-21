<?php

session_start();

if(isset($_GET['id'])){
    if(!isset($_SESSION['id'])){
 $_SESSION['id']=$_GET['id'];
}
}

$ID = $_SESSION['id'];

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}


$emaill = $_SESSION['email'];

if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

if(isset($_POST['book'])){

    $petid = $_POST['pet'];
    $note = $_POST['Notes'];
    

$query = "UPDATE appointment SET status='pending',note='$note',petId='$petid',emailOwner='$emaill' WHERE id='$ID'";
if ($result=mysqli_query($database, $query)){
function_alert("Appointment booked successfully");}
else{
    function_alert("Appointment cannot be booked!"); 
}


}
function function_alert($message) {
      
    // Display the alert box
    echo "<script>alert('$message');
    window.location.href='Book-table.php';</script>";
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
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Book Appointment</div>
       
        <div class="field">
            <form method = "post" action = "book-appointment.php" enctype="multipart/form-data">
  
  
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 
            <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="pet" id="pet">
            <option disabled selected>Choose your pet</option>
           
            <?php
            $records = mysqli_query($database, "SELECT * From pet  WHERE emailO = '$emaill'"); 
           
            while ($data = mysqli_fetch_array($records)) {
                ?>
                <option value="<?php echo $data['Id']; ?> "> <?php echo $data['name']; ?> </option>
                <?php
               }
                ?>
            </select>
           </div></div>



         
<br>
       

        <div class="field">
            <input type="textarea" name = "Notes" id = "Notes" placeholder = "Any thing You want to tell us about!" >
            <label for = "Notes"> Notes: </label>
          </div>
<br> 

        <div class="field">
            <input name= "book" type="submit" value="Book">
          </div>

     
        </form>
</div> 


  </body>

</html>
