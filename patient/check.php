


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
        
    <link rel="stylesheet" href="../CSS/home-style.css">
    <link rel="stylesheet" type="text/css" href="symptom_selector/selector.css?v=1">
    <link rel="stylesheet" type="text/css" href="symptom_selector/fontawesome/assets/css/font-awesome.min.css" />
    <script src="libs/jquery-1.12.2.min.js"></script>
    <script src="libs/json2.js"></script><!-- json for ie7 -->
    <script src="libs/jquery.imagemapster.min.js?v=1.1"></script>
    <script src="libs/typeahead.bundle.js"></script>

    <script src="symptom_selector/selector.js?v=3.3"></script>

    <?php

    

    if (!isset($_SESSION['userToken']) || !isset($_SESSION['tokenExpireTime']) || time() >= $_SESSION['tokenExpireTime']) {
        require 'token_generator.php';
        $tokenGenerator = new TokenGenerator("a6NXo_GMAIL_COM_AUT", "o2KEb94YiWw83Dyq5", "https://authservice.priaid.ch/login");
        $token = $tokenGenerator->loadToken();
        $_SESSION['userToken'] = $token->{'Token'};
        $_SESSION['tokenExpireTime'] = time() + $token->{'ValidThrough'};
    }

    $token = $_SESSION['userToken'];
    ?>

    <script type="text/javascript">
        var userToken = <?php echo "'" . $token . "'" ?>;

        $(document).ready(function() {
            $("#symptomSelector").symptomSelector({
                mode: "diagnosis",
                webservice: "https://healthservice.priaid.ch",
                language: "en-gb",
                specUrl: "sample_specialisation_page",
                accessToken: userToken
            });
        });
    </script>

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
               
                    <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
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
                    <td class="menu-btn menu-icon-settings">
                        <a href="medicine.php" class="non-style-link-menu"><div><p class="menu-text">Medicines</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="ngo.php" class="non-style-link-menu"><div><p class="menu-text">NGOS</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="check.php" class="non-style-link-menu"><div><p class="menu-text">Health Check</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="schemes.php" class="non-style-link-menu"><div><p class="menu-text">Schemes</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>
                          
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
                <tr>
                    <td>
        <tr>
            <td valign="middle" colspan="2" class="td-header box-white bordered-box width50">
                <h4 class="header" id="selectSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">1</span></h4>
            </td>
            <td valign="middle" class="td-header bordered-box box-white width25">
                <h4 class="header" id="selectedSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">2</span></h4>
            </td>
            <td valign="middle" class="td-header bordered-box box-white width25">
                <h4 class="header" id="possibleDiseasesTitle"><span class="badge pull-left badge-primary visible-lg margin5R">3</span></h4>
            </td>
        </tr>
        <tr>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="symptomSelector"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="symptomList"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="selectedSymptomList"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="diagnosisList"></div>
            </td>
        </tr>
    </table>
    <br/>
    


  </td>
  </tr>          
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>







                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
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
