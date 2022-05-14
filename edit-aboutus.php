<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reviews-style.css">
    <meta charset="utf-8">
    <title>edit</title>
</head>

<body>
    <section class="header">
        <nav> 
            <a href="Manger homepage.html"> <img id=logo src="Image (2).jpeg"></a>
            <div>

                <div class="header-links">
    
                    <ul>
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
    <section class="edit-about-section" id="ABOUTUS">
        
    <div>
        <form action="#">
            <label for="label">Label</label> <br>

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="feilds" id="email" name="email" placeholder="About us!" required>
                </div>
            </div>
            <br>
            <label for="label">Text</label> <br>
            <textarea class="feilds" id="message" rows="5" placeholder=" Our caring team creates a relaxing environment for your pet in our modern spa facilities, which are designed to cater to the comfort of our furry guests. Our pet spa is fully stocked with hypoallergenic shampoos, conditioners and products designed specifically to be safe and gentle on a pet’s skin and coat. Our place attendants are highly trained at handling pets of all sizes and breeds, and know how to put your pup at ease during any treatment." name="Textt" required></textarea>
            <br>
            <label for="location">Location</label><br>
            <input type="text" class="feilds" placeholder="Riyadh, Hitten">
            <br>
            <label for="Phone">Phone Number</label><br>
            <input type="text" class = "feilds" placeholder="(212) 555-2368">
            <br>
            <label for="email">Email</label><br>
            <input type="email" class="feilds"  placeholder="PetCare@gmail.com">
            <br>

            <a href="Manger homepage.html" class="editAboutt"> Submit </a>
              <a href="Manger homepage.html" class="editAboutt"> Cancel </a>
            </section>
        </form>
    </div>

    </section>


</html>
