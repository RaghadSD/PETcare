<?php


session_start();

if(isset($_GET['Updateid'])){
    if(!isset($_SESSION['Updateid'])){
        $_SESSION['Updateid']=$_GET['Updateid'];
    }
}

if (!isset($_SESSION['email']) ) { 
    header("location: login-manager.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "petcare1"))
die("<p>Could not open URL database</p>");


$id = $_SESSION['Updateid'];
$email = $_SESSION['email'];
$query2 = "select * from appointment where id='$id'";
$result2 = mysqli_query($database,$query2);



if(isset($_POST['Update'])){

    $petID = $_POST['pet'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];


$query = "UPDATE appointment SET  petId='$petID', date='$date', time='$time', serviceName='$service' WHERE id='$id'";
$result=mysqli_query($database, $query);
if ($result){

    echo "<script>
    alert('Appointment has been updated successfully');
    window.location.href='Appointment requests.php';
    </script>";

}else{
    echo "<script>
    alert('Appointment Cannot be updated, Try again');
    </script>";

}


}


    	
?>

<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Edit Appointment Request </title>
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

    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Edit Request</div>
       
        <div class="field">
            <form method = "post" action = "EditAppointmentReq.php">

            <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 

           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="pet" id="pet">
           <option selected> Choose your pet </option>
           <?php
           $records = mysqli_query($database, "SELECT * From pet where emailO='$email'");
       
           while ($data = mysqli_fetch_array($records)) {
            ?>
            <option value="<?php echo $data['Id']; ?>"> <?php echo $data['name']; ?></option>
            <?php
           }
            ?>

           </select>
           </div>
        </div> 
  
           <div class="field"> 
            <div style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;"> 

           <select style="height: 100%;width: 100%;border: 1px solid;border-radius: 25px;color: #617470;" name="service" id="service">
           <option selected> Choose a service </option>
           <?php
           $records = mysqli_query($database, "SELECT name From service");
       
           while ($data = mysqli_fetch_array($records)) {
            ?>
            <option value="<?php echo $data['name']; ?>"> <?php echo $data['name']; ?></option>
            <?php
           }
            ?>

           </select>
           </div>
        </div> 
           
           <div class="field">
            <input type="date" name ="date" value="<?php echo $row['date']; ?>">
            <label>Date </label>
          </div>

          <div class="field">
            <input type="time" name ="time"  value="<?php echo $row['time']; ?>">
            <label>Time </label>
          </div>


   


        <div class="field">
            <input name= "Update" type="submit" value="Update">
          </div>

     
        </form>
</div> 


  </body>

</html>
