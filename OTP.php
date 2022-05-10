<?php
if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();

    if(isset($_POST['validate'])){

      $code = $_POST['Code'];
      $emaill = $_SESSION['Email'];  
      
      if ($_SESSION['managerOrOwner'] == "manager") {
      $check_code = "SELECT Verification FROM manager WHERE email = '$emaill'"; 
      }
      else if ( $_SESSION['managerOrOwner'] == "owner"){
      $check_code = "SELECT Verification FROM owner WHERE email = '$emaill' ";
      }

      $result=mysqli_query($database,$check_code);
      $singleRow = mysqli_fetch_row($result);
      $OTP = $singleRow['0'];

      //Second we will move the user to next page 
      if ($OTP == $code)
      header('Location: NewPassword.php');
      
      else {
      echo "<script>alert('You have entered incorrect code, try again');</script>";

    }

/*

      //First we will change the otp in database to null 
      if ($_SESSION['managerOrOwner'] == "manager") {
        function_alert("im here");
        $query = "UPDATE manager SET Verification = 'NULL' WHERE email = '$email' ";
        function_alert("im null");
        $_SESSION['managerOrOwner'] = "manager";
      }
      else if ( $_SESSION['managerOrOwner'] == "owner"){
        function_alert("im here");
        $query = "UPDATE owner SET Verification = 'NULL' WHERE email = '$email' ";
        function_alert("im here");
        $_SESSION['managerOrOwner'] = "owner";

      }
       */
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

      <form method = "post" action = "OTP.php">
      
       <label id ="teVer">Verification code has been sent to your email, enter it:</label>

        <div class="field">
          <input type="text" name ="Code"required>

          <label>Received Code</label>
        </div>

  

        <div class="field" style="padding-top:2% ;">
              <input  type="submit" name= "validate" value="Update">

              <div class="content">
                <a style="color: #617470;font-size: large;" href="UpdatePassword.php">Back</a>
             </div>

            </div>
        </p>
        </form>
    </div>
  </body>
</html>

