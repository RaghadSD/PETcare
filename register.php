
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
      <form method = "post" action = "register.php">
      
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
      
      <p> <lable style="color: #617470;"> Profile photo <br<>
          <input type="file" id="myFile" name="profile">
      <p>
        <div class="field">
          <input type="submit" value="Sign Up" name="create"> 
          <div class="content">
            <a style="color: #617470;font-size: large;" href="Login Form.html">Back</a>
         </div>

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
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $profile =$_POST['profile'];

                $query = "INSERT INTO owner VALUES('$email','$password','$gender','$phone','$profile','$FName','$LName')";
                $result = mysqli_query($database, $query);
                if ($result) {
                    header('Location: Owner homepage.html');
                } else {
                    echo "Error: can not create new user!";
                    echo  $database->error;
                    exit();
                }
            }
            ?>




    </div>

    <?php
    if (isset($_POST['create'])) {
        if ($_POST['Password'] != $_POST['re_password']) {
            echo ("Oops! Password did not match! Try again. ");
        }
    }
    ?>

  </body>
</html>