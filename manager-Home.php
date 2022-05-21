<?php
session_start();


if(!isset($_SESSION['email'])) {
    header("location: login-manager.php");
    // The exit() function prints a message and exits the current script. It is an alias of the die() function.
    exit();
}	

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    
$query3 = "SELECT * FROM aboutus";
$result3 = mysqli_query($database,$query3);


$rows2 = mysqli_fetch_array($result3);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Pet care</title>
    <meta charset="utf-8">
    <meta neme="viewport" contenet="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home page style.css">
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
              <button class="dropbtn"> Appointments </button>
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



        <div class="description">
            <h1>
                Your Pet Deserves the Best.
            </h1>
            <p>
                ​We chase the absolute highest standards of safety in everything we do!
                <br> Our goal is to make sure all pets in our care are happy, safe and comfortable.
            </p>
            <a id="mabs" href="#ABOUTUS" class="more"> More about us!</a>
          
        </div>

    </section>
    
    <section class="Services" id="services">
        <br>
        <h1> Our services <a href="services.php?role=manager" class="show">SHOW MORE</a></h1> 
        <br>

        

        <div class = "row" style="align:center;"> 
           <?php
                $service= "select * from service limit 3";
                $res = mysqli_query($database,$service);
                if(mysqli_num_rows($res)>0)
                 {

                 while($serRow = mysqli_fetch_array($res))
                 {
                ?>
            <div class = "Services-column"> 

            <img  style = "width:70px; height:70px;"alt="service picture" src="data:image/jpeg;base64, <?php echo base64_encode($serRow['photo']) ;?>">
                
    
                <h3> <?php echo $serRow['name']; ?> </h3>
                <p>
                <?php echo $serRow['description']; ?><br>
                price: <?php echo $serRow['price']; ?> SR
                      <br>
                      
                </p>
            </div><br>
         
            <?php
                 }
                }
            ?>
            </div> 
            
       </section>


    <section class="about-section" id="ABOUTUS">
        <div class="box">

            <?php if(mysqli_num_rows($result3)>0){?>
            <h1><?php echo $rows2['title'];?> </h1>
            <p class="about-content">
            <img  class="aboutimg" style="height: 230px; width: 230px;" alt="about us picture" src="data:image/jpeg;base64, <?php echo base64_encode($rows2['picture']) ;?>">
            <?php echo $rows2['description'];?> 
            </p>
            <div class="words">
                   
            <span class="active"><?php echo $rows2['location'];?></span>
                <span ><a  href="tel:<?php echo $rows2['phoneNumber']; ?>" style="text-decoration: none; color: #617470; background-color: transparent ;"> <?php echo $rows2['phoneNumber']; ?></a></span>
                <span ><a id ="words" href="mailto:<?php echo $rows2['email'];?>" style="text-decoration: none; color: #617470; background-color: transparent ;"><?php echo $rows2['email'];?> </a></span>
            </div>
            <?php }?>
            <br> <br>
            <a href="editAboutUs.php" class="editAbout"> Edit About us </a>

        </div>
    </section>

    

</body>

</html>
