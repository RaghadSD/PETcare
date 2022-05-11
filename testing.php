<?php
if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");

session_start();
 $q="SELECT  `profilePic`  FROM `owner` WHERE `id`=1";
        $r_update = mysqli_query($database, $q);

        $ReqSTATresult = mysqli_fetch_assoc($r_update);
               echo '<img src="' . $ReqSTATresult['profilePic'] . '">';
        
if (isset($_POST['update'])) {
    $phoneNumber = $_POST['phoneNumber'];

    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $id = $_POST['id'];
    $uploadDir = 'uploads';
    $file1 = false;

   /* if (!is_dir($uploadDir)) { // check if Directory exist or no
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
        $query = "UPDATE `owner` SET `phoneNumber`='$phoneNumber',`Fname`='$Fname',`Lname`='$Lname', `profilePic`='$file_location1' WHERE `id`= '$id'";

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

/*<?php
$id = 1;
$q1 = "SELECT * FROM `owner` WHERE `id`=$id";
echo $q1;
$r1 = mysqli_query($database, $q1);
$row1 = mysqli_fetch_assoc($r1);
$_SESSION['id'] = $row1['id'];
?>*/
?> 



<!DOCTYPE html>
<html>
    <head>
        <title> Edit Request page</title>
    </head>

    <body >
        <main>

            <div class="formInfo2">
                <form id="addform" action="EditOprofile.php?id=<?php echo $row1['id'] ?>" method="POST" enctype="multipart/form-data">
                    <fieldset>
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

                        <label for="myfile">Select a file:</label>
                        <input type="file" id="fileToUpload1" name="fileToUpload1"  > 

                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                        <br><br>
                        <input type="submit" value="update" name="update" onclick="check();" />
                </form>
            </div>
        </main>

    </body>
</html>