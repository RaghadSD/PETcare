<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");

                $emaill = $_SESSION['email'];
                

                  $query="  DELETE FROM `owner` WHERE email='$emaill'";
                
                  $r_update = mysqli_query($database, $query);
                  if ($r_update) {                   
                    
                      echo '<script>alert("Deleted successfully")</script>';
                      header("location: logout.php");
                  } else {
                      echo '<script>alert("Error: Cannot Delete!, you have to delete your pets first")</script>';

                      $query= "DELETE FROM `pet`  WHERE emailO='$emaill'";
                      $r_update = mysqli_query($database, $query);
                      if ($r_update){
                        $query="  DELETE FROM `owner` WHERE email='$emaill'";
                        $r_update = mysqli_query($database, $query);
                        echo '<script>alert("Deleted successfully")</script>';
                        header("location: logout.php");
                        exit();
                      }
                           
                  }
                        
?> 