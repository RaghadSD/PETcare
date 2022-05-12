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
                                <a href="add Pet.html"> Add Pet </a>
                                <a href="Pet Profiles .html"> View My Pets </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Appointments </button>
                            <div class="dropdown-content">
                                <a href="Book Appointment.html"> Book Appointment </a>
                                <a href="Appointment requests.html"> Appointment Requests </a>
                                <a href="Upcoming appointments.html"> Upcoming Appointment </a>
                                <a href="Previous Appointments.html"> Previous Appointment </a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> My Profile </button>
                            <div class="dropdown-content">
                                <a href="MyProfile.html"> View My Profile </a>
                                <a href="Edit My Profile.html"> Edit My Profile </a>
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

   $query="SELECT * FROM `pet` ";
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
          <td><button> <a href="add Pet.html"> View </a> </button> 
           <button><a href="add Pet.html"> Edit </a></button>
            <button><a href="Delete.php?deleteid='.$id.'"> Delete </a></button></td> 
          

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