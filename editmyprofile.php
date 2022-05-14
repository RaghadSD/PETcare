<?php 
session_start();

if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "petcare1"))
                die("<p>Could not open URL database</p>");
                
/*$q="SELECT  `profilePic`  FROM `owner` WHERE `id`=1";
        $r_update = mysqli_query($database, $q);

        $ReqSTATresult = mysqli_fetch_assoc($r_update);
               echo '<img src="' . $ReqSTATresult['profilePic'] . '">';*/
        
if (isset($_POST['update'])) {
    echo "dalal";
    $phoneNumber = $_POST['phoneNumber'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $id = $_POST['id'];
    $uploadDir = 'uploads';
    $file1 = false;

 /*if (!is_dir($uploadDir)) { // check if Directory exist or no
        umask(mask: 0);
        mkdir($uploadDir, 0775);
    }*/

    function canupload($fileType) {
        $allowedFile = ['jpg',
            'jpeg',
            'png',
            'pdf'];

        if (in_array($fileType, $allowedFile))
            return true;
        else
            return false;
    }

// end of function
    if (isset($_FILES['fileToUpload1']) && $_FILES['fileToUpload1']['error'] == 0) {   // check filled in the form without error
        $fi = $_FILES['fileToUpload1']['name'];
        $ext = pathinfo($fi, PATHINFO_EXTENSION);

        $canupload1 = canupload($ext);
        if ($canupload1) {
            // find file name, location, and move it to server
            $FileName1 = $_FILES['fileToUpload1']['name'];
            $file_location1 = $uploadDir . '/' . $FileName1;
            $movFile1 = move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $file_location1);
            $file1 = true;
        }
    }


    if (true) {

        

        //only file 1 updated
       // $query = "UPDATE `owner` SET `phoneNumber`='$phoneNumber',`Fname`='$Fname',`Lname`='$Lname', `profilePic`='$file_location1' WHERE `id`= '1'";
       $query= "UPDATE `owner` SET `phoneNumber`='$phoneNumber',`profilePic`='$file_location1' ,`Fname`='$Fname',`Lname`='$Lname',  WHERE 'id'= '1';";

        echo $query;
        $r_update = mysqli_query($database, $query);

        $query = "SELECT * FROM `owner` WHERE id=1";
        $r_update = mysqli_query($database, $query);

        $ReqSTATresult = mysqli_fetch_assoc($r_update);
        foreach ($ReqSTATresult as $key => $value) 
            echo $key . $value ."<br>";
 
    }
}
/*
  $_SESSION['id']=1;
  $id=1;

  if(isset($_POST['Update']))
  {

  $phoneNumber =  $_POST['phoneNumber'];
  $profilePic = $_POST['profilePic'];
  $Fname =  $_POST['Fname'];
  $Lname =  $_POST['Lname'];

  $query= "UPDATE `owner` SET `phoneNumber`='$phoneNumber',`Fname`='$Fname',`Lname`='$Lname' WHERE `id`= '$id';"

  echo $query;


  $query_run= mysqli_query($database, $query );

  if($query_run){
  echo '<script type ="text/javascript"> alert ("data updated")</script>';
  // header('Location:  Pet profiles .html');
  }
  else{
  echo '<script type ="text/javascript"> alert ("data not updated")</script>';
  echo  $database->error;
  exit();
  }

  }
 */
?> 

<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title>Edit My Profile </title>
  </head> 

    <body >
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


        <div class="wrapper" style="margin-top:-48% ;">
        <div class="title"> Edit My Profile</div>

                <form id="addform" action="EditOprofile.php?id=<?php echo $row1['id'] ?>" method="POST" enctype="multipart/form-data">
                   
                        <div class="field">
                            <input type="text" name ="Fname">
                            <label>First Name</label>
                        </div>

                        <div class="field">
                            <input type="text" name ="Lname">
                            <label>Last Name </label>
                        </div>


                        <div class="field">
                            <input type="tel" name ="phoneNumber">
                            <label> Phone Number </label>
                        </div>					

                        
                        <lable style="color: #617470;" for="myfile">Change Profile photo?</label>
                        <input type="file" id="fileToUpload1" name="fileToUpload1"  > 

                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                        <br><br>
                        <div class="field">
                        <input type="submit" value="update" name="update" onclick="check();" />
                        </div>
                   

                </form>
            </div>

        </main>

    </body>
</html>