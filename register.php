<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="Style1.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Regestration Form</div>

      <div class="field">
      <form method = "post" action = "register.php" enctype="multipart/form-data" >      
      <div class="field"  >
        <input type="email" name ="email" required>
        <label>Email Address</label>
      </div>

      <div class="field">
        <input type="text" name ="FName" required>
        <label>First Name</label>
      </div>

      <div class="field">
        <input type="text" name ="LName"required>
        <label>Last Name </label>
      </div>
 
      <div class="field">
        <input type="password" name ="password"required>
        <label> Password </label>
      </div>

      <div class="field">
        <input type="password" name ="re_password" required>
        <label> Repeat your Password </label>
      </div>


      <div class="field">
        <input type="tel" name ="phone" required>
        <label> Phone Number </label>
      </div>

      <div class="content">
      <div class="radio">
       <label style="color: #617470;" for="gender">Gender</label>
          <input type="radio" name="gender" value="Male" required>
          <label for="male">male</label>
          <input type="radio" name="gender" value="Female" required>
          <label for="female">female</label>
      </div></div>
      
     


          <div lable style="color: #617470;"> Profile photo
                        <input type="file" id="myFile" name="profile" required > </div>  
      <p>
        <div class="field">
          <input type="submit" value="Sign Up" name="create">
          

          </div>
      </p>
      </form>
      <?php

            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");



            if (isset($_POST['create'])) {
                $FName = $_POST['FName'];
                $LName = $_POST['LName'];
                $email = $_POST['email'];
                $isExist = isEmailExists($database, "owner", $email);
                if($isExist == 1){
                function_alert("Email is already exist, try to sign in");
                exit();
              }
              $password = $_POST['password'];
              $rePassword = $_POST['re_password'];
              
              if ( $password != $rePassword) {
                function_alert("Oops! Password did not match! Try again.");
                exit();
              }
                $password = $_POST['password'];
                $profile =addslashes(file_get_contents($_FILES["profile"]["tmp_name"]));
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                //$profile =$_POST['profile'];
                $profilePic =addslashes(file_get_contents($_FILES["profilePic"]["tmp_name"]));
                $query = "INSERT INTO owner VALUES('$email','$password','$gender','$phone','$profile','$FName','$LName')";
                $result = mysqli_query($database, $query);
                if ($result) {
                  session_start();
                    header('Location: owner homepage.php');
                } else {
                  function_alert( "Error: can not create new user!");
                    echo  $database->error;
                    exit();
                }
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

  </body>
</html>
