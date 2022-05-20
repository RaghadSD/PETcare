<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");
	


if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();
   
    function function_alert($message) {
      
        // Display the alert box
        echo "<script>alert('$message');</script>";
    } 
if((isset($_GET['action'])) && $_GET['action']=='acceptappoint')
	{
				$sqlregUpdate= "update appointment set status = 'Accept'  where id = '".$_GET['id']."'";	
				mysqli_query($database,$sqlregUpdate);
				header('Location: page6AcceptDecline.php');
				exit;
               
	} 
if((isset($_GET['action'])) && $_GET['action']=='rejectappoint')	
	{
				$sqlregUpdate= "update appointment set status = 'Reject'  where id = '".$_GET['id']."'";	
				mysqli_query($database,$sqlregUpdate);
				header('Location: page6AcceptDecline.php');
					exit;
               	
	} 	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Appointment Requests</title>
<link rel = "stylesheet" href = "table-style.css">
<script type="text/javascript">
function acceptapp(url)
	{  
	if(	confirm('Really want to accept this.') )
		{
			window.location=url;
		}
	}
function rejectapp(url)
	{  
	if(	confirm('Really want to reject this.') )
		{
			window.location=url;
		}
	}	
</script>
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
<h1> Appointment Requests</h1>
<table>
  <thead>
    <tr>
      <th> Id</th>
      <th> Pet Name </th>
      <th>Service Name </th>
      <th> Note</th>
      <th> Date </th>
      <th> Time </th>
      <th> Manage </th>
    </tr>
  </thead>
  <tbody>
    <?php 
  $query="select * from appointment where status='Pending' ";
  $result=mysqli_query($database, $query);
  if(mysqli_num_rows($result)>0){ 
  while($iAppointRow = mysqli_fetch_assoc($result)) {
  $petresult=mysqli_query($database, "select * from pet where id='".$iAppointRow['petId']."'");
   $iPetDet = mysqli_fetch_assoc($petresult);  
	?>
    <tr>
      <td> <?php echo $iAppointRow['id']; ?></td>
      <td><a href ="pet-detail.php?id=<?php echo $iAppointRow['petId']; ?>">
        <button><?php echo $iPetDet['name']; ?></button>
        </a></td>
      <td><?php echo $iAppointRow['serviceName']; ?></td>
      <td><?php echo $iAppointRow['note']; ?></td>
      <td><?php echo $iAppointRow['date']; ?></td>
      <td><?php echo $iAppointRow['time']; ?></td>
      <td><button onClick="javascript:acceptapp('page6AcceptDecline.php?action=acceptappoint&id=<?php echo $iAppointRow['id']; ?>')">Accept</button>
        <button  onClick="javascript:rejectapp('page6AcceptDecline.php?action=rejectappoint&id=<?php echo $iAppointRow['id']; ?>')">Decline</button></td>
    </tr>
    <?php  } }  else { ?>
    <tr>
      <td colspan="6">No record found...</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<br>
</body>
</html>
