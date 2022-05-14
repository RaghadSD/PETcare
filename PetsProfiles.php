<?php 
session_start();

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
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
            <a href="Manger homepage.php"> <img id=logo src="Image (2).jpeg"></a>
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
                                <a href="add Pet.php"> Add Pet </a>
                                <a href="Pet Profiles .php"> View My Pets </a>
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
                    <li> <a href="#contact"> Contact </a> </li>
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
       while(  $row= mysqli_fetch_assoc($result)){
        $id=$row['Id'];
        $name=$row['name'];
        $gender=$row['gender'];
        

          echo  ' <tr>
          <td> '.$id.'</td>
          <td> <a href ="coco-manager.html"> <button>'.$name.'</button></a> </td>
          <td> '.$gender.'</td>

          <td> <a href="PET1Profile.php?Viewid='.$id.'">  <button>View</button></a> 
          <a href="UpdatePetProfile.php?Updateid='.$id.'">  <button> Edit</button> </a>
           <a href="Delete.php?deleteid='.$id.'"><button> Delete</button></a></td> 
          

      </tr>';
}

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