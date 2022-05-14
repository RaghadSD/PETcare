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
                
if(isset($_GET['reviewId'])){
    $id = $_GET['reviewId'];

    echo $id;
$id = $_GET['reviewId'];
if (isset($_POST['submitRev'])) {

$reviwAppointment = $_POST['Textt'];
    $query = "UPDATE appointment SET review = '$reviwAppointment' WHERE id = '$id' ";
    $result = mysqli_query($database, $query);    
         
}
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
        <form method="POST" action="WriteReview.php">
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