<?php

session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login.php");
    exit();
}
$ID = $_SESSION['ID'];

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");
          
  
// printing column name above the data
  $email = $_SESSION['email'];
$query="select * from owner where email='$email' ";


// mysql_query will execute the query to fetch data
if ($is_query_run =  mysqli_query($database, $query)) {
    $query_executed = mysqli_fetch_assoc ($is_query_run);
$_SESSION['ID']= $query_executed['id'];
$IS = $_SESSION['ID'];
 }


if(isset($_POST['book'])){

    $petID = $_POST['type_select'];
    $service = $_POST['type_selzect'];
    echo $service;
    echo $petID;
    $petID = "SELECT id From pet where idO = $ID " ;
    $result = mysqli_query($database, $petID);
    $query_executed = mysqli_fetch_assoc ($result);
    $petID = $query_executed['id'];
    echo $petID;


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

  <body>
  <form method = "post" action = "try.php">

       <select name="type_select" id="searchinput">
        <option disabled selected>Choose your pet</option>
        <?php

        $records = mysqli_query($database, "SELECT name From pet where idO = '$ID'; ");

        while ($data = mysqli_fetch_array($records)) {
            echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['name']) . "</option>";
        }
        ?>
    </select>

    <select name="type_selzect" id="searchinput">
        <option disabled selected>Choose service</option>
        <?php

        $records = mysqli_query($database, "SELECT name From service");

        while ($data = mysqli_fetch_array($records)) {
            echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['name']) . "</option>";
        }
        ?>
    </select>
    
    <input name= "book" type="submit" value="Book">

    </form>



  </body>

</html>
