<?php
if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");

                if(isset($_GET['cancelId'])){
                    $id=$_GET['cancelId'];
                    echo  $id;
                  $query= "DELETE FROM appointment WHERE id=$id";
                
                  $cancelA = mysqli_query($database, $query);
                  if ($cancelA) {                   
                      echo "<script>alert('Appointment has been canceled successfully')</script>";
                  }
                  } else {
                      echo "<script>alert('Error: Cannot cancel Pet!')</script>";
                      echo  $database->error;
                      exit();
                  }
                  header("location: Upcoming appointments.php");


                
