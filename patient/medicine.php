


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">


    <title></title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../connection.php");

    $sqlmain= "select * from patient where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();

    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
               
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home  menu-icon-home-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text">All Doctors</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Scheduled Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>

                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-doctor">
                        <a href="medicine.php" class="non-style-link-menu"><div><p class="menu-text">Medicines</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home">
                        <a href="ngo.php" class="non-style-link-menu"><div><p class="menu-text">NGOS</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="check.php" class="non-style-link-menu"><div><p class="menu-text">Health Check</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="schemes.php" class="non-style-link-menu"><div><p class="menu-text">Schemes</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Medicines</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                
                    <td  width="100%" style="border:0; display: flex;justify-content: center;align-items: center;">
      
</td>
    

  







                            
            </table> 
           <center> <h3> Nearby Government Medical Stores</h3>  </center>     
  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d50984.24635117487!2d77.20207982172222!3d28.686640092364062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sjan%20aushadhi!5e0!3m2!1snl!2sin!4v1709403108906!5m2!1snl!2sin" width="100%" height="550" style="border:0; display: flex;justify-content: center;align-items: center;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     <br/>
     <br/>
     <center> <h3> Inexpensive Medicine Alternatives </h3>  </center>
     

<div style="background-color: white; padding: 20px;">
    
    <input type="text" id="searchBox"   class="input-text " onkeyup="searchMedicine()" placeholder="Search for an expensive medicine...">
</div>

<div id="medicineList" style="background-color: white; color: black; padding: 20px; margin-top: 20px;">
  
</div>

<script>

// Medicine data
var medicines = [
{
expensive: "Herceptin",
inexpensive: "Trastuzumab Biosimilars"
},
{
expensive: "Glivec",
inexpensive: "Imatinib Mesylate (Generic)"
},
{
expensive: "Crestor",
inexpensive: "Rosuvastatin (Generic)"
},
{
expensive: "Enbrel",
inexpensive: "Etanercept Biosimilars"
},
{
expensive: "Tykerb",
inexpensive: "Lapatinib (Generic)"
},
{
expensive: "Nexavar",
inexpensive: "Sorafenib (Generic)"
},
{
expensive: "Gleevec (US brand name for Glivec)",
inexpensive: "Imatinib Mesylate (Generic)"
},
{
expensive: "Revlimid",
inexpensive: "Lenalidomide (Generic)"
},
{
expensive: "Actemra",
inexpensive: "Tocilizumab Biosimilars"
},
{
expensive: "Erbitux",
inexpensive: "Cetuximab Biosimilars"
},
{
expensive: "Avastin",
inexpensive: "Bevacizumab Biosimilars"
},
{
expensive: "Sutent",
inexpensive: "Sunitinib (Generic)"
},
{
expensive: "Torisel",
inexpensive: "Temsirolimus (Generic)"
},
{
expensive: "Afinitor",
inexpensive: "Everolimus (Generic)"
},
{
expensive: "Imbruvica",
inexpensive: "Ibrutinib (Generic)"
},
{
expensive: "Zytiga",
inexpensive: "Abiraterone (Generic)"
},
{
expensive: "Xeloda",
inexpensive: "Capecitabine (Generic)"
},
{
expensive: "Tarceva",
inexpensive: "Erlotinib (Generic)"
},
{
expensive: "Iressa",
inexpensive: "Gefitinib (Generic)"
},
];

function generateMedicineList() {
    var tableHTML = "<table style='width: 100%; border-collapse: collapse;' id='medicineTable'>";
    tableHTML += "<tr><th style='border: 1px solid white; padding: 8px;'>Expensive Medicine</th><th style='border: 1px solid white; padding: 8px;'>Inexpensive Alternative</th></tr>";

    medicines.forEach(function(medicine) {
        tableHTML += "<tr>";
        tableHTML += "<td style='border: 1px solid white; padding: 8px;'>" + medicine.expensive + "</td>";
        tableHTML += "<td style='border: 1px solid white; padding: 8px;'>" + medicine.inexpensive + "</td>";
        tableHTML += "</tr>";
    });

    tableHTML += "</table>";

    document.getElementById("medicineList").innerHTML = tableHTML;
}

// Search medicine
function searchMedicine() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBox");
    filter = input.value.toUpperCase();
    table = document.getElementById("medicineTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

window.onload = function() {
    generateMedicineList();
}
</script>

        </div>
    </div>

    <a href="../chatbot"> <button style="background-color: #0A76D8;
    color: white;
    padding: 14px;;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    border-radius: 190px;
    bottom: 23px;
    right: 28px;
    width: 90px;" >ASK</button></a>
  

</body>
</html>
