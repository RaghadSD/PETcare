<?php


session_start();

if(isset($_GET['id'])){
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=$_GET['id'];
    }
}

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");


$id = $_SESSION['id'];
$query2 = "select * from appointment where id='$id'";
$result2 = mysqli_query($database,$query2);
$row = mysqli_fetch_array($result2);



if(isset($_POST['Update'])){

    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];


$query = "UPDATE appointment SET  date='$date', time='$time', serviceName='$service' WHERE id='$id'";
$result=mysqli_query($database, $query);
if ($result){

    echo "<script>
    alert('Appointment has been updated successfully');
    window.location.href='page7viewappoitment.php';
    </script>";

}else{
    echo "<script>
    alert('Appointment Cannot be updated, Try again');
    </script>";

}


}


    	
?>

<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Edit Appointment Request </title>
  </head> 

  <body>
  <section class="header">
  <nav> <a href="manager-home.php"> <img id=logo src="Image (2).jpeg"></a>
    <div>
      <div class="header-links">
        <ul>
          <li> <a href="addService.php"> Add Service </a> </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"> Appointments </button>
              <div class="dropdown-content"> 
              <a href="setAppointment.php"> Set Appointment </a> 
              <a href="page7ViewAppoitment.php"> All Appointments </a> 
              <a href="page6AcceptDecline.php"> Appointment Requests </a> 
              <a href="previous.php"> Previous Appointments </a> 
              <a href="upcoming.php"> Upcoming Appointments </a> </div>
            </div>
          </li>
          <li> <a href="Reviews.php"> Owners Review </a> </li>
          <li> <a href="Home.php"> Logout </a> </li>

        </ul>
      </div>
    </div>
  </nav>
</section>

    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Edit Request</div>
       
        <div class="field">
            <form method = "post" action = "editAppointment-manager.php">
  
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 

           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="service" id="service">
           <option selected> Choose a service </option>
           <?php
           $records = mysqli_query($database, "SELECT name From service");
       
           while ($data = mysqli_fetch_array($records)) {
            ?>
            <option value="<?php echo $data['name']; ?>"> <?php echo $data['name']; ?></option>
            <?php
           }
            ?>

           </select>
           </div>
        </div> 
           
           <div class="field">
            <input type="date" name ="date" value="<?php echo $row['date']; ?>">
            <label>Date </label>
          </div>

          <div class="field">
            <input type="time" name ="time"  value="<?php echo $row['time']; ?>">
            <label>Time </label>
          </div>


   


        <div class="field">
            <input name= "Update" type="submit" value="Update">
          </div>

     
        </form>
</div> 


  </body>

</html>

