<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Requests</title>
    <link rel = "stylesheet" href = "table-style.css">
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
                    <li> <a href="logout.php"> Logout </a> </li>
                </ul>


            </div>

        </div>
        </nav>
        

    </section>
    
    
        <h1>My Appointment Request</h1>
    
    
    <table>
        <thead>
            <tr>
                <th> Service</th>
                <th> Date</th>
                <th> Time </th>
                <th> Manage </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Spaying Surgery </td>
                <td> 1/2/2020</td>
                <td> 21:00 </td>
                <td><button onclick="location.href='edit-request.html'" class="edit" type="button">Edit</button> <button >Cancel</button></td>
            </tr>
            <tr>
                <td> Shaving & Haircut </td>
                <td> 11/2/2020</td>
                <td> 20:00 </td>
                <td><button onclick="location.href='edit-haircut.html'" class="edit" type="button">Edit</button> <button>Cancel</button></td>
            </tr>
        </tbody>
        
       
    </table>
    

</body>
</html>