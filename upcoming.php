<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");
	


if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();
    	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Upcoming Appointments</title>
<link rel="stylesheet" href="table-style.css" type="text/css">
</head>
<body>
<<section class="header">
  <nav> <a href="manager-home.php"> <img id=logo src="Image (2).jpeg"></a>
    <div>
      <div class="header-links">
        <ul>
          <li> <a href="addService.php"> Add Service </a> </li>
          <li>
            <div class="dropdown">
              <button style = "font-family: 'Gill Sans', sans-serif" class="dropbtn"> Appointments </button>
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
<h1>Upcoming Appointments</h1>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Pet Name</th>
      <th>Service</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  $query="select * from appointment where status='Accept' and  date>='".date("Y-m-d")."'";
  $result=mysqli_query($database, $query);
  if(mysqli_num_rows($result)>0){ 
  while($iAppointRow = mysqli_fetch_assoc($result)) {
   $petresult=mysqli_query($database, "select * from pet where id='".$iAppointRow['petId']."'");
   $iPetDet = mysqli_fetch_assoc($petresult);  
	?>
    <tr>
      <td><?php echo $iAppointRow['id']; ?></td>
      <td><a href ="pet-detail.php?id=<?php echo $iAppointRow['petId']; ?>">
        <button><?php echo $iPetDet['name']; ?></button>
        </a></td>
      <td><?php echo $iAppointRow['serviceName']; ?></td>
      <td><?php echo $iAppointRow['date']; ?></td>
      <td><?php echo $iAppointRow['time']; ?></td>
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
