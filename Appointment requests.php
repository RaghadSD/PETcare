<?php
if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

session_start();
$ID = $_SESSION['ID'];

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

$today = date("Y-m-d");
$today_time = strtotime($today);
                       




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Requests</title>
    <link rel = "stylesheet" href = "table-style.css">
</head>
<body>
<section class="header">
        <nav> 
            <a href="Owner homepage.php"> <img id=logo src="Image (2).jpeg"></a>
        <div>

            <div class="header-links">

                <ul>
                    <li> <a href="#ABOUTUS"> About </a> </li>
                    <!-- <li> <a href="#LoginOP"> Login </a> </li> -->
                    <li> <a href="#services"> Services </a> </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My pets </button>
                            <div class="dropdown-content">
                                <a href="AddPet.php"> Add Pet </a>
                                <a href="PetsProfiles.php"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book Appointment.php"> Book Appointment </a>
                                <a href="Appointment requests.php"> Appointment Requests </a>
                                <a href="Upcoming appointments.php"> Upcoming Appointment </a>
                                <a href="Previous Appointments.php"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="ownerprofile.php"> View My Profile </a>
                                <a href="UpdateOwnerProfile.php"> Edit My Profile </a>
                            </div>
                        </div>
                    </li>
                    <li> <a href="logout.php"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
                </ul>


            </div>

        </div>
        </nav>
       

    </section>

    
    
        <h1>My Appointment Request</h1>
  
        <?php


echo "<div class='main'>";



$result = mysqli_query($database,"SELECT * FROM appointment where idO= '$ID'");

echo " 
<table>
<thead>
    <tr>
    <th> Appointment Id </th>
        <th> Pet Name </th>
        <th> Service</th>
        <th> Date</th>
        <th> Time </th>
        <th> Manage </th>
    </tr>
</thead> ";

while($row = mysqli_fetch_array($result)) {
    $status = $row['status'];
    if ($status == "requested"){
        $id = $row['id'];
        $id = $row['date'];
        $ThatTime = $row['time'];
        

    $petid = $row['petId'];
    $records = mysqli_query($database, "SELECT name From pet where Id = '$petid';");
    
    $query_executed = mysqli_fetch_assoc ($records);
    $petName = $query_executed['name'];
$serviceName = $row['serviceName'];
$date = $row['date'];
$time = $row['time'];
$AppointmentId = $row['id'];

    echo '<tr>
    <td> '.$AppointmentId.' </td>
     <td> '.$petName.' </td>
     <td> '.$serviceName.' </td>
     <td> '.$date.' </td>
     <td> '.$time.' </td>
     <td> <a href="/.php?Viewid='.$id.'">  <button> View </button></a> 
     <a href="EditAppointmentReq.php?Updateid='.$AppointmentId.'">  <button> Edit </button> </a>
      <a href="Cancel Appointment.php?deleteid='.$id.'">   <button> Cancel </button></a></td> 
     </tr>';
     
}
}

echo "</table>";


?>   
   
    
    

</body>
</html>
