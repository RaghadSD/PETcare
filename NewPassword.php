<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();

    if(isset($_POST['cahnge'])){
        $pass = $_POST['Password'];
        $rePass = $_POST['rePassword'];
        $email = $_SESSION['Email'];  
        
        
        if ($pass !==  $rePass) {
            function_alert("Password mismatch!, Try again");
        }else{   
            if ($_SESSION['managerOrOwner'] == "manager") {
                $query = "UPDATE manager SET password = '$pass' WHERE email = '$email' ";    
            }else if ( $_SESSION['managerOrOwner'] == "owner"){
                $query = "UPDATE owner SET password = '$pass' WHERE email = '$email' ";    
            }

            $result = mysqli_query($database, $query);
            echo "<script>alert('You have entered incorrect code, try again');</script>";
            header('Location: login-manager.php');

            //function_alert("Password has been changed successfully!");
            //redirect error???
        }
         
         
        


    }


    function function_alert($message) {
      
        // Display the alert box
        echo "<script>alert('$message');</script>";
    } 
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="Style1.css">
    <link rel="stylesheet" href="home page style.css">

  </head>
  <body>
  <nav> 
  <a href="Home.php"> <img id=logo src="Image (2).jpeg"></a>

<div> 
    <div class="header-links">

        <ul>
            <li> <a href="#ABOUTUS"> About </a> </li>
           <!-- <li> <a href="#LoginOP"> Login </a> </li> --> 
            <li> <a href="#services"> Services </a> </li>
            <li> <a href="#contact"> Contact </a> </li>
        </ul>

    </div>
    
</div>
</nav>
    <div class="wrapper">
      <div class="title">Reset Password</div>

      <form method = "post" action = "NewPassword.php">

        <div class="field">
            <input type="password" name ="Password"required>
            <label> Password </label>
          </div>
   
        <div class="field">
          <input type="password" name ="rePassword"required>
          <label> ReWrite Password </label>
        </div> 

  
    
          <div class="field" style="padding-top:2% ;">
              <input name ="cahnge" type="submit" value="Update">

              <div class="content">
                <a style="color: #617470;font-size: large;" href="login-manager.php">Back</a>
             </div>

            </div>
        </p>
        </form>
    </div>
  </body>
</html>