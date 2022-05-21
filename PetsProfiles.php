<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");
                

  // $emaill = $_SESSION['email'];
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pets Profiles</title>
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


    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th> Pet Name </th>
                <th>Gender </th>
                <th> Manage </th>
            </tr>
        </thead>

        <tbody>
     <?php

     $emaill = $_SESSION['email'];

   $query="SELECT * FROM `pet` WHERE emailO='$emaill'";
   $result = mysqli_query($database, $query);

   if ($result) {
    if(mysqli_num_rows($result)>0){ 
       while(  $row= mysqli_fetch_assoc($result)){
        $id=$row['Id'];
        $name=$row['name'];
        $gender=$row['gender'];


          echo  ' <tr>
          <td> '.$id.'</td>
          <td> '.$name.'</button></a> </td>
          <td> '.$gender.'</td>
          <td> <a href="PET1Profile.php?Viewid='.$id.'">  <button>View</button></a> 
          <a href="UpdatePetProfile.php?Updateid='.$id.'">  <button> Edit</button> </a>
           <a href="Delete.php?deleteid='.$id.'">   <button> Delete</button></a></td> 
          

      </tr>';}
}
else echo '<tr>
<td colspan="4">No record found...</td>
</tr>';

   } else {
       echo "<script>alert('Error: Cannot get profiles!')</script>";
       echo  $database->error;
       exit();
   }   
     ?>       
        </tbody> 
    </table>
    <br>

</body>
</html>
