<?php
include_once 'header.php'; 
        
    require "mail.php";

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");


  if (!mysqli_select_db($database, "petcare1"))
    die("<p>Could not open URL database</p>");

    if(isset($_POST['sendM'])) {
       $email = $_POST['Email'];
       $message = $_POST['message'];
       $Subject = $_POST['title'];
       send_mail($email,$Subject,$message);
       function_alert("Email has been sent successfully");
    }

    function function_alert($message) {
        // Display the alert box
        echo "<script>alert('$message');</script>";
    }

$query3 = "SELECT * FROM aboutus";
$result3 = mysqli_query($database,$query3);


$rows2 = mysqli_fetch_array($result3);

?>

<div class = "description"> 
<h1>
    Your Pet Deserves the Best.
</h1>
<p> 
    ​We chase the absolute highest standards of safety in everything we do! 
    <br> Our goal is to make sure all pets in our care are happy, safe and comfortable.
</p>
<a id = "mabs" href= "#ABOUTUS" class = "more"> More about us!</a>
<div class = "OwnerOrManger">
  <p >
    Are you: 
    <br> <br>
    <a href="register.php"> <button id = "LoginOP" class = "LoginOP" type="button" > <img src = "signup.png" /> <br>Register </button></a>
    <a href="login-manager.php"> <button class = "LoginOP" type="button" > <img src = "signin.png" /> <br>Login </button> </a>
</p>
</div>

</section>
<section class ="Services" id="services">
<br> 
    <h1> Our services </h1>
    <br>
       <div class = "row"> 
        <?php
                $service= "select * from service";
                $res = mysqli_query($database,$service);
                if(mysqli_num_rows($res)>0)
                 {

                 while($serRow = mysqli_fetch_array($res))
                 {
                ?>
            <div class = "Services-column"> 
                
    
                <h3> <?php echo $serRow['name']; ?> </h3>
                <p>
                <?php echo $serRow['description']; ?><br>
                price: <?php echo $serRow['price']; ?> SR
                      <br>
                      <img  style = "width:75px; height:75px;"alt="service picture" src="data:image/jpeg;base64, <?php echo base64_encode($serRow['photo']) ;?>">
                </p>
            </div><br>
            <?php
                 }
                }
            ?>
    </section>

   <section class="about-section" id="ABOUTUS">
        <div class="box">
            <h1><?php echo $rows2['title'];?> </h1>
            <p class="about-content">
            <?php echo $rows2['description'];?> 
            </p>
            <div class="words">
                   
            <span class="active"><?php echo $rows2['location'];?></span>
                <span ><a  href="tel:<?php echo $rows2['phoneNumber']; ?>" style="text-decoration: none; color: #617470; background-color: transparent ;"> <?php echo $rows2['phoneNumber']; ?></a></span>
                <span ><a id ="words" href="mailto:<?php echo $rows2['email'];?>" style="text-decoration: none; color: #617470; background-color: transparent ;"><?php echo $rows2['email'];?> </a></span>
            </div>
            <br> <br>
        </div>
    </section>
    <section id="contact">

        <h1 class="contact-header">Contact us!</h1>

        <div class="contact-wrapper">

            <!-- Left contact page -->

            <form id="contact-form" class="form-horizontal" role="form" method = "post" action = "Owner homepage.php">

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="feilds" id="name" name="title" placeholder="TITLE" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="feilds" id="email" name="Email" placeholder="EMAIL" required>
                    </div>
                </div>

                <textarea class="feilds" id="message" rows="5" placeholder="MESSAGE" name="message" required></textarea>

                <button class="send-button" name = "sendM" id="submit" type="submit"> SEND </button>

            </form>

            <!-- Left contact page -->

            <div class="contact-information"> <BR><BR> <BR><BR><BR><BR>
                <hr>
                <ul class="contact-list">
                    <li class="list-item"><span class="contact-text place"> <?php echo $rows2['location'];?></span></li>

                    <li class="list-item"><span class="contact-text phone"><a href="tel:<?php echo $rows2['phoneNumber']; ?>"> <?php echo $rows2['phoneNumber']; ?>
                            </a></span></li>

                    <li class="list-item"><span class="contact-text email"><a href="mailto:<?php echo $rows2['email'];?>">
                                <?php echo $rows2['email'];?> </a></span></li>
                </ul>

                <hr>

            </div>

        </div>

    </section>

</body>

</html>
