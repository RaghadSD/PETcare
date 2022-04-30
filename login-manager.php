<?php 


if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");


if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $query="select * from manager where email='$email' AND password='$password' ";

  $result=mysqli_query($database, $query);

  if(mysqli_num_rows($result)>0){
    $_SESSION['email'] = $email;
    header('Location: Manger homepage.html');
    exit();
  }

  else{
    echo "You have entered incorrect Password/Email";
  }

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
      <div class="title">Login Form</div>
      <form action="login-manager.php" method="POST">
        <div class="field">
          <input type="email" name ="email" required>
          <label>Email Address</label>
        </div>
        <div class="field">
          <input type="password" name ="password" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link"><a href="Update Password -manger.html">Forgot password?</a></div>
        </div>
        <!-- <div class="field">
          <input type="submit" value="Login" >
        </div>-->

        <div class="field">
          <button  id="loginbtn" name="login" >  Login</a> </button>
         </div>
         <div class="content" id ="content1">
          <a style="color: #617470;font-size: large;" href="Home.html">Back</a>
       </div>
      </form>
    </div>
  </body>
</html>