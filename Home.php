<?php
include_once 'header.php';
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
        <div class = "Services-column"> 

            <h3> Classic Bath, Brush & Nails </h3>
            <p>
                Teethbrushing, facial mask naturally exfoliates and hydrates leaving your pets 
                face with a brighter, fresh smelling complexion, nail trim, and nail filing.  <br>
                <img src = "pet-shampoo.png" />
            </p>
        </div>
        <div class = "Services-column"> 
            <h3> Delux Bath, Brush & Nails </h3>
            <p>
                Professional groomers start each cut and style experience with a moisturizing 
                massage and bath before cutting, drying, and styling your pet. 
                <img src = "bathtub.png" />

            </p>
        </div>
        <div class = "Services-column"> 
            <h3> Shaving & Haircut </h3>
            <p>
                Create the perfect look for your pet! We offer full haircuts, bath and neaten, 
                and maintenance brushing from our list of pet grooming services. <br>
                <img src = "beauty-saloon.png" />
            </p>
        </div>
    </div>
    <div class = "row2"> 
        <div class = "Services-column"> 
            <h3> Spaying Surgery </h3>
            <p>
             Our surgical suite is supplied with professional surgical tables, anesthesia monitors, 
              and other equipment to keep your pet as safe as possible during the procedure.  <br>
             <img src = "medicine.png" />
            </p>
        </div>

        <div class = "Services-column"> 
            <h3> Exams & Consultations </h3>
            <p>
              Our vets provide physical examination services to check for potential health problems and recommend 
              proper treatment and work-up if needed.  
                <img src = "medicine (1).png" />

            </p>
        </div>
        <div class = "Services-column"> 
            <h3> Dentistry </h3>
            <p>
            Dental care is a critical part of your pet’s overall health regimen to prevent oral disease. One of the most 
             common conditions of small animals is Periodontal Gum Disease.      <br>       
              <img src = "surgery.png" />
            </p>
        </div>
    </div>
</section>


<section class="about-section" id = "ABOUTUS">
  <div class="box">
    <h1>About Us!</h1>
    <p class="about-content">
      Our caring team creates a relaxing environment for your pet in our modern spa
      facilities, which are designed to cater to the comfort of our furry guests. 
      Our pet spa is fully stocked with hypoallergenic shampoos, conditioners and 
      products designed specifically to be safe and gentle on a pet’s skin and coat. 
      Our place attendants are highly trained at handling pets of all sizes and breeds, 
      and know how to put your pup at ease during any treatment.          
      </p>
      <div class="words">
        <span class="active">Thalassotherapy</span>
        <span>Balneotherapy</span>
        <span>Aromatherapy</span>
      </div>
 </div>
</section>

<section id="contact">
  
  <h1 class="contact-header">Contact us!</h1>
  
  <div class="contact-wrapper">
  
  <!-- Left contact page --> 
    
    <form id="contact-form" class="form-horizontal" role="form">
       
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="feilds" id="name" name="name" placeholder="NAME" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" class="feilds" id="email" name="email" placeholder="EMAIL" required>
        </div>
      </div>
      
      <textarea class="feilds" id="message" rows="5" placeholder="MESSAGE" name="message" required></textarea>
        
      <button class="send-button" id="submit" type="submit"> SEND </button>
      
    </form>
    
  <!-- Left contact page --> 
    
  <div class="contact-information"> <BR><BR> <BR><BR><BR><BR>
    <hr>
        <ul class="contact-list">
          <li class="list-item"><span class="contact-text place"> Riyadh, Hitten</span></li>
          
          <li class="list-item"><span class="contact-text phone"><a href="tel:1-212-555-5555"> (212) 555-2368 </a></span></li>
          
          <li class="list-item"><span class="contact-text email"><a href="mailto:PetCare@gmail.com"> PetCare@gmail.com </span></li>
        </ul>

        <hr>

      </div>
    
  </div>
  
</section>  

</body>
</html>
