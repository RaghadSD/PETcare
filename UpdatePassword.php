<?php

    require "mail.php";

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    if (isset($_POST['reset'])) {
      session_start();

        //check if the email already exist in owner or manager?
        $email = $_POST['Email'];

        $isExist = isEmailExists($database, "owner", $email);
        $manager = false;
        $_SESSION['managerOrOwner'] = "owner";  

        if($isExist != 1){
            $isExist = isEmailExists($database, "manager", $email);

            if($isExist != 1){            
            function_alert("Email dosent exist, sign up");
            exit();}

            $manager = true;
            $_SESSION['managerOrOwner'] = "manager";  

          }


        //if its already exist, create random number and store it as verifaction code in the database
        //manager
        $OTP = generateNumericOTP();
        //to store
        if ($manager){
            $query = "UPDATE manager SET Verification = '$OTP' WHERE email = '$email' ";

        }else{ //owner
            $query = "UPDATE owner SET Verification = '$OTP' WHERE email = '$email' ";
        }

        $result = mysqli_query($database, $query);

        //send it to this email 
        $subject = "Password Reset Code";
        $message = "Your password reset code is " . $OTP;
        send_mail($email,$subject,$message);
        $_SESSION['Email'] = $_POST['Email'];  
        //ask the user to enter this number, if its correct allow him to change the password
        header('Location: OTP.php');
      }
   
    function isEmailExists($db, $tableName, $email){
        // SQL Statement
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."'";
        // Process the query
        $results = $db->query($sql);
        // Fetch Associative array
        $row = $results->fetch_assoc();
        // Check if there is a result and response to  1 if email is existing
        return (is_array($row) && count($row)>0);
      }

      function generateNumericOTP(){
          $generator = "1357902468";
          $result = "";
          for ($i = 1; $i <= 4; $i++) {
              $result .= substr($generator, (rand() % (strlen($generator))), 1);
            }
            // Returning the result 
            return $result;
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
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Reset Password</div>

      <form method = "post" action = "UpdatePassword.php">
      
        <div class="field"  >
          <input type="email" name ="Email"required>
          <label>Email Address</label>
        </div>
    
          <div class="field" style="padding-top:2% ;">
              <input name ="reset" type="submit" value="Update">

              <div class="content">
                <a style="color: #617470;font-size: large;" href="login-manager.php">Back</a>
             </div>

            </div>
        </p>
        </form>
    </div>
  </body>
</html>

