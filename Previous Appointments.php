<?php
if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

session_start();
$emaill = $_SESSION['email'];

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
                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My pets </button>
                            <div class="dropdown-content">
                                <a href="AddPet.php"> Add Pet </a>
                                <a href="PetsProfiles.php"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book-table.php"> Book Appointment </a>
                                <a href="Appointment requests.php"> Appointment Requests </a>
                                <a href="Upcoming appointments.php"> Upcoming Appointment </a>
                                <a href="Previous Appointments.php"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="ownerprofile.php"> View My Profile </a>
                                <a href="UpdateOwnerProfile.php"> Edit My Profile </a>
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
            <table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Pet Name</th>
      <th>Service</th>
      <th>Date</th>
      <th>Time</th>
      <th>Review</th>
    </tr>
  </thead>
  <tbody>
    <?php 
$query="select * from appointment where emailOwner = '$emaill'AND status='Accept' and  date<'".date("Y-m-d")."'";
  $result=mysqli_query($database, $query);
  if(mysqli_num_rows($result)>0){ 
  while($iAppointRow = mysqli_fetch_assoc($result)) {
   $petresult=mysqli_query($database, "select * from pet where id='".$iAppointRow['petId']."'");
   $iPetDet = mysqli_fetch_assoc($petresult); 
    
	?>
    <tr>
      <td><?php echo $iAppointRow['id']; ?></td>
      <td><?php echo $iPetDet['name']; ?></td>
      <td><?php echo $iAppointRow['serviceName']; ?></td>
      <td><?php echo $iAppointRow['date']; ?></td>
      <td><?php echo $iAppointRow['time']; ?></td>

      <td> <a href="WriteReview.php?id=<?php echo $iAppointRow['id']; ?>"><button> Review </button></a></td> 

    </tr>
    <?php  } }  else { ?>
    <tr>
      <td colspan="6">No record found...</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
 
           
        </body>
</html>
