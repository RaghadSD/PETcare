<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title>Edit My Profile </title>
  </head> 

  <body>
    <section class="header">
        <nav> 
            <a href="Manger homepage.html"> <img id=logo src="Image (2).jpeg"></a>
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
                    <li> <a href="Home.html"> Logout </a> </li>
                    <li> <a href="#contact"> Contact </a> </li>
                </ul>


            </div>

        </div>
        </nav>
       

    </section>
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title"> Edit My Profile</div>
       
  
        <div class="field">
            <form method = "post" action = "#">
            
            <div class="field"  >
              <input type="email" name ="Email">
              <label>Email Address</label>
            </div>
      
            <div class="field">
              <input type="text" name ="FName">
              <label>First Name</label>
            </div>
      
            <div class="field">
              <input type="text" name ="LName">
              <label>Last Name </label>
            </div>
       
        
            <div class="field">
              <input type="tel" name ="Phone Number">
              <label> Phone Number </label>
            </div>
      
           <br>
            
            
             <lable style="color: #617470;"> Change Profile photo?<br<>
                <input type="file" id="myFile" name="filename">
             
    
              <div class="field">
                  <input type="submit" value="Update">
                </div>
            </p>
    
            </form>
            
              <a style="color: #617470;font-size: large;padding-left: 45%;" href="MyProfile.html">Back</a>
            
            
    
        </div>


  </body>

</html>