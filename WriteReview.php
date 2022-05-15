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
$id=$_GET['review'];

if (isset($_POST['submitRev'])) {
$rev = $_POST['Textt'];

$query= "UPDATE appointment SET review = '$rev' WHERE id='$id' ";
$u = mysqli_query($database, $query);
 if ($u) {
    function_alert("Review submitted successfully");
    header("location: Previous Appointments.php");
 }
 else {
 function_alert("Review cannot submitted");
 header("location: Previous Appointments.php");
}
  
}


function function_alert($message) {
      
    // Display the alert box
    echo "<script>alert('$message');</script>";
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
    <section class="edit-about-section" id="ABOUTUS">
    <div>     
         <form method = "post" action = "WriteReview.php">
            <h1> Write Review</h1>
            <div class="form-group">
            <textarea class="feilds" id="message" rows="4" name="Textt" required></textarea>

            <br>
            

            <button style ="height: 45px;  width: 120px; margin-left: 62px;" class="editAbout" name="submitRev"> Submit </button>
            <button style ="height: 45px;  width: 120px; margin-left: auto;" onClick="document.location.href='Previous Appointments.php';" type="button" class="editAbout"> Cancel </button>
          
            </section>
        </form>
    </div>

    </section>


</html>