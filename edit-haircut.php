<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit request</title>
        <link rel="stylesheet" href="edit-style.css">
    </head>

    <body>
        <div class="header">
            <p class="button"><a href="Manger homepage.html">Home page</a> </p> 
            <h1>Edit appointment</h1>
        </div>

            <form action="#" method="post">
                <img src="images/haircut.jpg" alt="haircut" width="300" height="300">
                <div class="info">
                <label>Service <br> <select name="Service" id="service"> 
                    <option>Exams & Consultations</option>
                    <option>Spaying Surgery </option>
                    <option> Dentistry </option>
                    <option>Classic BATH, BRUSH & NAILS</option>
                    <option>DELUXE BATH, BRUSH & NAILS</option>
                    <option selected>Shaving & Haircut</option>
                    <option>Spaying Surgery</option>
                </select></label><br><br>
                <label>Date <input name= "Date" type="date" placeholder="Date" value="2021-2-11" class="edit"></label><br>
                <label>Time <input name= "time" type="time" placeholder="Time" value="20:00" class="edit"></label><br><br></div>
                <div class="buttons">
                    <input type="submit" value="Submit" class="submit">
                    <button onclick="location.href='page7ViewAppoitment.html'" class="cancel" type="button">Cancel</button><br>
                    </div>
            </form>
           
            


    </body>
</html>