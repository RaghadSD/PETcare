<?php
if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");

                session_start();

if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $who = $_POST['OnOrMa'];
  if($who == "owner"){
    $query="select * from owner where email='$email' AND password='$password' ";
  }
  else if ($who == "manager"){
    $query="select * from manager where email='$email' AND password='$password' ";
  }


$result=mysqli_query($database, $query);
$query_executed = mysqli_fetch_assoc ($result);
$_SESSION['ID']= $query_executed['id'];
 
  if(mysqli_num_rows($result)>0){
    $_SESSION['email'] = $email;
    if($who == "owner")
    header('Location: Owner homepage.php');

    else if ($who == "manager")
    header('Location: Manger homepage.php');

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    exit();
  }

  else{
    function_alert( "You have entered incorrect Password/Email");
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
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Login Form</div>
      <form action="login-manager.php" method="POST">


        <div id=cont>
        <label id = "qq">Are you?</label> <br>
        
        <input type="radio" id="Owner" name="OnOrMa" value="owner" required>
        <label id="OnOrMa">Owner</label>

        <input type="radio" id="Manager" name="OnOrMa" value="manager">
        <label id="OnOrMa">Manager</label><br>
        </div>

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
          <div class="pass-link"><a href="UpdatePassword.php">Forgot password?</a></div>
        </div>
        <!-- <div class="field">
          <input type="submit" value="Login" >
        </div>-->

        <div class="field">
          <button  id="loginbtn" name="login" >  Login</a> </button>
         </div>
         <div class="content" id ="content1">
          <a style="color: #617470;font-size: large;" href="Home.PHP">Back</a>
       </div>
      </form>
    </div>
  </body>
</html>
