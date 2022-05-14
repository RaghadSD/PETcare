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
                <a href="Owner homepage.html"> <img id=logo src="Image (2).jpeg"></a>
            <div>
    
                <div class="header-links">
    
                    <ul>
                       
    
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn"> My pets </button>
                                <div class="dropdown-content">
                                    <a href="add Pet.html"> Add Pet </a>
                                    <a href="Pet Profiles .html"> View My Pets </a>
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
                                    <a href="MyProfile.php"> View My Profile </a>
                                    <a href="Edit My Profile.php"> Edit My Profile </a>
                                </div>
                            </div>
                        </li>
                        <li> <a href="logout.php"> Logout </a> </li>
                    </ul>
    
    
                </div>
    
            </div>
            </nav>
            
    
        </section>
        
            <h1 style = "text-alignment = center;" >My Previous Appointments</h1>
            <?php
echo "<div class='main'>";



$result = mysqli_query($database,"SELECT * FROM appointment where status ='previous' && idO= '$ID'");

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
    $today = date("Y-m-d");
$today_time = strtotime($today);
                       
$result = mysqli_query($database, "SELECT * From appointment");
while($row = mysqli_fetch_array($result)) {
$isPrev = $row['date'];
$id = $row['id'];

$expire_time = strtotime($isPrev);

if ($expire_time < $today_time) { 

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['serviceName'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";    
    echo "<td> <button onclick='location.href='WriteReview.php'' class='edit' type='button'>Review</button> </td>";

    //echo "<td>" . $row['review'] . "</td>";

    echo "</tr>";
}       

}
}
echo "</table>";


?>
      <!--  
           
        <table>
           <thead>
               <tr>
                <th> Pet Name </th>
                <th>Service</th>
                <th> Date </th>
                <th> Time </th>
                <th> Review </th>
               </tr>
           </thead> 
           
           <tbody>
               <tr>
               <td>Leo</td>
               <td>Spaying Surgery</td>
               <td>09/12/2021</td>
               <td><time>16:30</time></td>
               <td><button onclick="location.href='Write review.html'">Review</button> 
               </tr>
               
               <tr>
                <td>Leo</td>
                <td>Shaving & Haircut</td>
                <td>08/12/2021</td>
                <td><time>12:30</time></td>
                <td><button onclick="location.href='Write review.html'">Review</button> 
                    

               </tr>
           </tbody>

        </table>
       
-->  
            
  </body>
</html>
