<?php

session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");

$today = date("Y-m-d");
$today_time = strtotime($today);
                       
$result = mysqli_query($database, "SELECT * From appointment");
while($row = mysqli_fetch_array($result)) {
$isPrev = $row['date'];
$id = $row['id'];

$expire_time = strtotime($isPrev);

if ($expire_time < $today_time) { 

    $query = "UPDATE appointment SET status = 'previous' WHERE id = '$id' ;";

    mysqli_query($database, $query);
}       

}




?>

<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Book Appointment</title>
  </head> 

  <body>  </body>

</html>