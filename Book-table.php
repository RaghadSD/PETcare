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
<meta charset="UTF-8">
<title>Book Appointment</title>
<link rel = "stylesheet" href = "table-style.css">
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

<h1>Book appointment</h1>
<table>
  <thead>
    <tr>
      <th> Service</th>
      <th> Date</th>
      <th> Time </th>
      <th> Book </th>
    </tr>
  </thead>
  <tbody>
    <?php 
  $query="select * from appointment where status='new' ";
  $result=mysqli_query($database, $query);
  if(mysqli_num_rows($result)>0){ 
  while($iAppointRow = mysqli_fetch_assoc($result)) {
	?>
    <tr>

      <td><?php echo $iAppointRow['serviceName']; ?></td>
      <td><?php echo $iAppointRow['date']; ?></td>
      <td><?php echo $iAppointRow['time']; ?></td>
      <td><a href ="book-appointment.php?id=<?php echo $iAppointRow['id']; ?>">
        <button>Book</button> </a>
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
