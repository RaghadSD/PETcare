<?php 

session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}


if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

if(isset($_GET['id'])){
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=$_GET['id'];
    }
}

$id=$_SESSION['id'];

if (isset($_POST['submitRev'])) {

$rev = $_POST['Textt'];
$query= "UPDATE appointment SET review = '$rev' WHERE id= '$id' ";
$u = mysqli_query($database, $query);
 if ($u) {
    function_alert("Review submitted successfully");
 }
 else {
 function_alert("Review cannot submitted");
}




}


function function_alert($message) {
      
    // Display the alert box
    echo "<script>alert('$message');
    window.location.href='previous appointments.php';</script>";
}
?> 
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="home page style.css">
    <meta charset="utf-8">
    <title>Review</title>
</head>

<body>

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
        <section style = "background-color: transparent; margin-top:-70px;" class="edit-about-section" id="ABOUTUS">
    <div>     
         <form method = "post" action = "WriteReview.php" enctype="multipart/form-data">
            <h1> Write Review</h1>
            <div class="form-group">
            <textarea class="feilds" id="message" rows="4" name="Textt" required></textarea>

            <br>
            

            <button style ="height: 45px;  width: 120px; margin-left: 62px;" class="send-button" name="submitRev"> Submit </button>
            <button style ="height: 45px;  width: 120px; margin-left: auto;" onClick="document.location.href='Previous Appointments.php';" type="button" class="send-button"> Cancel </button>
          
            </section>
        </form>
    </div>

    </section>



</html>
