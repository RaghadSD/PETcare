<?php

 
if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");
	


if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");
    session_start();

    if(isset($_GET['id']) && $_GET['action']=='delete'){
      $sql_query="DELETE FROM appointment WHERE id=".$_GET['id'];
      if($result22 = mysqli_query($database, $sql_query))
      {header("location: page7viewappoitment.php");}
    }
    	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Available Appointments</title>
<link rel = "stylesheet" href = "table-style.css">
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

<h1>View Available Appointments</h1>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th> Service</th>
      <th> Date</th>
      <th> Time </th>
      <th> Manage </th>
    </tr>
  </thead>
  <tbody>
    <?php 
  $query="select * from appointment where status='Accept' ";
  $result=mysqli_query($database, $query);
  if(mysqli_num_rows($result)>0){ 
  while($iAppointRow = mysqli_fetch_assoc($result)) {
	?>
    <tr>
      <td> <?php echo $iAppointRow['id']; ?></td>
      <td><?php echo $iAppointRow['serviceName']; ?></td>
      <td><?php echo $iAppointRow['date']; ?></td>
      <td><?php echo $iAppointRow['time']; ?></td>
      <td><a href ="editAppointment-manager.php?id=<?php echo $iAppointRow['id']; ?>">
        <button>Edit</button> </a>
        <button onclick="javascript:delete_id(<?php echo $iAppointRow['id'];?>)">Delete</button></td>
    </tr>
    <?php  } }  else { ?>
    <tr>
      <td colspan="6">No record found...</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<script type="text/javascript">
function delete_id(id){
  if(confirm('Are you sure?')){
    window.location.href='page7viewappoitment.php?action=delete&id='+id;
  }
}

</script>

</body>
</html>
