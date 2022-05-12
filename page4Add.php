<!DOCTYPE html> 

<html>
    <head>
<meta charset="utf-8">
<link rel="stylesheet" href="Style1.css">
<link rel="stylesheet" href="home page style.css">
  <title> Add Service</title>
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
                        <li> <a href="page4Add.html"> Add Service </a> </li>
    
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn"> Appointments </button>
                                <div class="dropdown-content">
                                    <a href="page5set.html"> Set Appointment </a>
                                    <a href="page7ViewAppoitment.html"> All Appointments </a>
                                    <a href="page6AcceptDecline.html"> Appointment Requests </a>
                                    <a href="previous.html"> Previous Appointments </a>
                                    <a href="page 3Upcoming.html"> Upcoming Appointments </a>
                                </div>
                            </div>
                        </li>
                        <li> <a href="Reviews.html"> Owners Review </a> </li>
                        <li> <a href="Home.html"> Logout </a> </li>
                        <li> <a href="owners.html"> Contact </a> </li>
                    </ul>
    
    
                </div>
    
            </div>
        </nav>
    </section>
    <div class="wrapper" style="margin-top:-48% ;">
        <div class="title">Add Service</div>
       
  
        <div class="field">
            <form method = "post" action = "#">
  
                <div class="field">
                    <input type="text" name = "Service Name" id = "Service Name" placeholder = "checkup,grooming,...." >
                    <label>Service Name: </label>
                  </div>

                 <div style="padding-top: 4%;padding-left: 6%;"> 
                  <p> <lable style="color: #617470;">  photo <br<>
                    <input type = "file" name = "photo" id = "photo">
                <p>
                </div>
                   
           
          <div class="field">
                    <input type="number" name = "price" id = "Service price" placeholder = "price"  >
                    <label>Service Price: </label>
                  </div>

                
                  <div class="field">
                    <input type="text" name = "Service des" id = "Service des" placeholder = "Description about the Service" >
                    <label for = "des"> Description: </label>
                  </div>


        <div class="field" >
            <input type="submit" value="Add">
          </div>

     
        </form>
</div> 


  </body>

</html>