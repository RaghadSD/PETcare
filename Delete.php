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

                  $query="  DELETE FROM `pet` WHERE Id='$id'";
                
                  $r_update = mysqli_query($database, $query);
                  if ($r_update) {                   
                      echo "<script>alert('Pet has been Deleted successfully')</script>";
                      header("location: petsprofiles.php");
                  } else {
                      echo "<script>alert('Error: Cannot Delete Pet!')</script>";
                      echo  $database->error;
                      exit();
                  }

                }
                
            
?> 