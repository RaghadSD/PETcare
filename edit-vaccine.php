<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit request</title>
        <link rel="stylesheet" href="edit-style.css">
    </head>

    <body>
        <div class="header">
            <p class="logout"><a href="Home.html">Logout</a> </p> 
            <p class="button"><a href="Manger homepage.html">Home page</a> </p> 
            <h1>Edit appointment</h1>
        </div>

            <form action="#" method="post">
                <img src="images/checkup.jpg" alt="Checkup" width="300" height="300">
                <div class="info">
                <label>Pet name <input name= "name" type="text" placeholder="Name" value="Cloudy" class="edit"></label><br>
                <label>Service <br> <select name="Service" id="service">
                    <option >Exams & Consultations</option>
                    <option selected>Spaying Surgery </option>
                    <option> Dentistry </option>
                    <option>Classic BATH, BRUSH & NAILS</option>
                    <option>DELUXE BATH, BRUSH & NAILS</option>
                    <option >Shaving & Haircut</option>
                </select></label><br><br>
                <label>Date <input name= "Date" type="date" placeholder="Date" value="2021-12-09" class="edit"></label><br>
                <label>Time <input name= "time" type="time" placeholder="Time" value="14:00" class="edit" min="10" max="12"></label><br><br></div>
                <div class="buttons">
                    <input type="submit" value="Submit" class="submit">
                    <button onclick="location.href='previous.html'" class="cancel" type="button">Cancel</button><br>
                    </div>
            </form>
           
            


    </body>
</html>
