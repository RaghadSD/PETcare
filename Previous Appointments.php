<?php
if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

session_start();
$ID = $_SESSION['ID'];

if (!isset($_SESSION['email']) ) { 
    header("location: manager.php");
    exit();
}

$today = date("Y-m-d");
$today_time = strtotime($today);
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <title>Previous Appointments</title>
    <link rel="stylesheet" href="table-style.css" type="text/css">
    </head>

    <body>
        <section class="header">
            <nav> 
                <a href="Owner homepage.php"> <img id=logo src="Image (2).jpeg"></a>
            <div>
    
                <div class="header-links">
    
                <ul>
                    <li > <a href="#ABOUTUS"> About </a> </li>
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
                                <a href="OwnerProfile.php"> View My Profile </a>
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
        
            <h1 style = "text-alignment = center;" >My Previous Appointments</h1>
            <?php
echo "<div class='main'>";



$result = mysqli_query($database,"SELECT * FROM appointment where idO= '$ID'");

echo "<table>
<thead>
<tr>
<th> Pet Name </th>
<th>Service</th>
<th> Date </th>
<th> Time </th>
<th> Review </th>
</tr>
</thead> ";


while($row = mysqli_fetch_array($result)) {
$isPrev = $row['date'];
$expire_time = strtotime($isPrev);

if ($expire_time < $today_time) { 

    $petid = $row['petId'];
    $records = mysqli_query($database, "SELECT name From pet where Id = '$petid';");
    $query_executed = mysqli_fetch_assoc ($records);
    $petName = $query_executed['name'];
    $id = $row['id'];
    $serviceName = $row['serviceName'];
    $date = $row['date'];
    $time = $row['time'];


    echo "</tr>";
    echo '<tr>
    <td> '.$petName.' </td>
    <td> '.$serviceName.' </td>
    <td> '.$date.' </td>
    <td> '.$time.' </td>
    <td> <a href="WriteReview.php?review='.$id.'"><button> Review </button></a></td> 
 
    </tr>';
}
}
echo "</table>";


?>
            
  </body>
</html>
