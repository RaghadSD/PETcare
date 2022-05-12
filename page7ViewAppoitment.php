<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Available Appointments</title>
    <link rel = "stylesheet" href = "table-style.css">
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
 
        <h1>View Available Appointments</h1>
    
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
                <td><button onclick="location.href='edit-request.html'" class="edit" type="button">Edit</button> <button>Delete</button></td>
            </tr>
            <tr>
                <td> Shaving & Haircut </td>
                <td> 11/2/2020</td>
                <td> 20:00 </td>
                <td><button onclick="location.href='edit-haircut.html'" class="edit" type="button">Edit</button> <button>Delete</button></td>
            </tr>
        </tbody>
        
       
    </table>
    

</body>
</html>
