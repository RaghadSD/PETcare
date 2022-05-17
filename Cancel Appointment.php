<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-managers.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");


                if(isset($_GET['deleteid'])){
                    $id=$_GET['deleteid'];

                  $query="  DELETE FROM `appointment` WHERE id='$id'";
                
                  $r_update = mysqli_query($database, $query);
                  if ($r_update) {                   
                      echo "<script>alert('Appointment has been canceled successfully')</script>";
                      header("location: Appointment requests.php");
                  } else {
                      echo "<script>alert('Error: Cannot cancel appointment!')</script>";
                      echo  $database->error;
                      exit();
                  }

                }
                
            
?> 