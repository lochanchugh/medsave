


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
                
                    <td  width="100%" style="border:0; display: flex;justify-content: center;align-items: center;">
      
</td>
    

  







                            
            </table>
    
<div style="background-color: white; padding: 20px;">
 
    <input type="text" id="searchBox" class="input-text " onkeyup="searchScheme()" placeholder="Search for a scheme...">
</div>

<div id="schemeCards" style="background-color white; color: black; padding: 20px; margin-top: 20px;">
   
</div>

<script>
function searchScheme() {
    var input, filter, div, h2, p, i, txtValue;
    input = document.getElementById("searchBox");
    filter = input.value.toUpperCase();
    div = document.getElementById("schemeCards");
    h2 = div.getElementsByTagName("h2");
    p = div.getElementsByTagName("p");
    h2.style.color = "#0A76D8";

    for (i = 0; i < h2.length; i++) {
        txtValue = h2[i].textContent || h2[i].innerText;
        
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            h2[i].style.display = "";
            p[i].style.display = "";
        } else {
            h2[i].style.display = "none";
            p[i].style.display = "none";
        }
    }
}

function generateSchemeCards() {
    var schemes = [
        {
        name: "Ayushman Bharat",
        description: "This scheme came into existence because of recommendations made by the National Health Policy. Ayushman Bharat Yojana is designed keeping in mind Universal Health Coverage (UHC). Health services in India are largely segmented and Ayushman Bharat aims to make them comprehensive. It is about looking at the health sector as a whole and ensure continuous care for the people of India. There are two components related to Ayushman Bharat: Health and Wellness Centres (HWC) and Pradhan Mantri Jan Arogya Yojana (PM-JAY). 150000 HWCs have been created in order to ensure better healthcare for the people. These HWCs are transformed versions of earlier initiatives like Sub Centres and Primary Health Centres. The PM-JAY is a health insurance scheme for the poor. It offers a health cover of Rs. 5 lakhs per family on an annual basis, and the payable premium is Rs. 30."
    },
    {
        name: "Awaz Health Insurance Scheme",
        description: "This is a health insurance cover for migrant workers and is initiated by the Government of Kerala. It also offers insurance for death by accident for labourers. The scheme was launched in the year 2017 and targeted 5 lakh inter-state migrant labourers working in Kerala. The health insurance coverage offered under Awaz Health Insurance is Rs.15000, while the cover for death is Rs.2 lakh. This policy can be obtained by labourers falling in the age group of 18 to 60. They shall be provided with an Awaz Health Insurance card, post submitting and processing of enrolment details pertaining to biometric information and other work-related documents."
    },
    {
        name: "Aam Aadmi Bima Yojana",
        description: "The Aam Aadmi Bima Yojana (AABY) is meant for people involved in certain vocations such as Carpentry, Fishing, Handloom weaving, etc. There are 48 such defined vocations. Before 2013, there were two policies of similar nature, AABY and Janashree Bima Yojana (JBY). After 2013, JBY was merged with AABY. The premium for a Rs.30000 insurance policy is Rs. 200 for a year. The eligibility criteria for this policy is that one should be a family head or an earning member of one’s family (around the poverty line) and should be performing one of the 48 mentioned vocations."
    },
    {
        name: "Bhamashah Swasthya Bima Yojana",
        description: "The Rajasthan Government supports insurance initiatives towards its citizens under the Bhamashah Swasthya Bima Yojana. This is a cashless claims scheme for rural people of Rajasthan. There is no prescribed age limit for availing the benefits of this scheme. Those who are a part of the National Food Security Act (NFSA) and the Rashtriya Swasthya Bima Yojana (RSBY) are also qualified for this insurance policy. This scheme covers hospitalization expenses for general illness as well as critical illnesses as per the terms and conditions. It covers both in-patient as well as out-patient expenses."
    },
    {
        name: "Central Government Health Scheme (CGHS)",
        description: "As the name suggests, this policy is initiated by India’s Central Government. Central Government employees are eligible for this policy. For example, Supreme Court judges, Certain Railway Board employees, etc. This policy has been active for six decades and has covered more than 35 lakh employees and pensioners. Hospitalisation, as well as domiciliary care, are covered as per this plan’s terms and conditions. The Central Government Health Insurance Scheme covers Allopathy and Homeopathy as well. It is available in 71 cities and the plan is to expand the scope to more areas."
    },
    {
        name: "Chief Minister’s Comprehensive Insurance Scheme",
        description: "This is a state government scheme. It is promoted by the Tamil Nadu Government in association with United India Insurance Company Ltd. The Chief Minister’s Comprehensive Insurance Scheme is a family floater plan designed for quality health care. One can claim for hospitalisation expenses up to Rs. 5 lakhs under this policy. Select government and private hospitals are a part of this scheme. People residing in Tamil Nadu earning less than Rs. 75000 annually are eligible for this scheme. More than a thousand procedures are covered under the Chief Minister’s Comprehensive Insurance Scheme."
    },
    {
        name: "Employees’ State Insurance Scheme",
        description: "A huge number of people worked in factories post-independence in India. The working conditions were such that there were injuries and deaths as well. This is where the concept of insurance proved beneficial. Employees’ State Insurance Scheme was launched in 1952 to offer a financial cover in case of illness, disability or death faced by insured workers/employees. Initially, only Kanpur and Delhi were considered, but the scope of the scheme expanded with time. This policy got an upgrade in the year 2015. Now, more than 7 lakh factories are a part of this scheme."
    },
    {
        name: "Karunya Health Scheme",
        description: "Kerala Government had launched this initiative in the year 2012. Karunya Health Scheme is directed towards providing Health Insurance for listed chronic illnesses. It is a Critical Illness plan for the poor and covers major diseases such as Cancer, Kidney Ailments, Heart-related medical issues, etc. Those below or near the poverty line can enrol themselves for this cover. Aadhaar Card and appropriate Income Certificate are needed for this scheme. There were rumours that this scheme has been abolished, however, they were just rumours as this scheme is still active."
    },
    {
        name: "Mahatma Jyotiba Phule Jan Arogya Yojana",
        description: "This policy is initiated by the Government of Maharashtra, for the betterment of its downtrodden people. Rajiv Gandhi Jeevandayee Arogya Yojana was renamed as Mahatma Jyotiba Phule Jan Arogya Yojana in the year 2017. Farmers from select districts and people below and around the poverty line across all districts are eligible for this scheme. It is a family cover with a benefit of Rs. 150000. The diseases mentioned as inclusions in the scheme shall be covered from day one, without any waiting period unless specified."
    },
    {
        name: "Mukhyamantri Amrutum Yojana",
        description: "The Government of Gujarat launched the Mukhyamantri Amrutum Yojana in the year 2012 for the benefit of the state’s poor people. Lower middle-class families and those living below the poverty line are eligible for this cover. This scheme offers a cover of Rs. 3 lakhs for a year on a family floater basis. Treatment can be availed in different types of hospitals such as public hospitals, private hospitals, trust-based hospitals, Grant-in-Aid hospitals, etc."
    },
    {
        name: "Pradhan Mantri Suraksha Bima Yojana",
        description: "This scheme came into existence to offer accident insurance to the people of India. In 2016, it was observed that only 20% of the Indian citizens had an insurance cover. However, Pradhan Mantri Suraksha Bima Yojana aspires to change this statistic in a positive manner. People aged 18 to 70 and having a bank account can avail of the benefits of this scheme. This policy offers an annual cover of Rs. 1 lakh for partial disability and Rs. 2 lakhs for total disability/death for a premium of Rs. 12. The premium gets debited automatically from the insured person’s bank account."
    },
    {
        name: "Dr YSR Aarogyasri Health Care Trust Andhra Pradesh State Government",
        description: "The Andhra Pradesh Government along with the Dr YSR Aarogyasri Trust, which works for health care, has come up with four beneficial welfare schemes. These schemes cater to different people and assist them in time of need. Here are the four schemes: 1. Dr YSR Aarogyasri – This scheme is dedicated to the welfare of the poor. 2. Aarogya Raksha – This scheme is designed to benefit people Above Poverty Line (APL). 3. Working Journalist Health Scheme – This scheme is for journalists and it offers cashless treatment in case of listed procedures. 4. Employee Health Scheme – This scheme is for the benefit of state government employees."
    },
    {
        name: "Telangana State Government – Employees and Journalists Health Scheme",
        description: "This health scheme is offered by the Telangana Government for its employees and journalists. It is beneficial for those who are currently working as well as those who have retired and are pensioners. The highlight of this scheme is the cashless treatment. Beneficiaries can approach hospitals that are a part of this scheme and avail cashless treatment for certain treatments as per the terms and conditions. This helps the beneficiaries as they do not have to rush to gather funds for medical expenses in an emergency."
    },
    {
        name: "Rashtriya Swasthya Bima Yojana",
        description: "This scheme is directed towards people working in the unorganised sector. Often, they are not covered under any insurance policy. And in such a scenario, if they fall ill – which happens frequently – their savings get exhausted. Thus, they are never able to ensure they have savings in the bank. This is where health insurance can prove helpful to them. Rashtriya Swasthya Bima Yojana is initiated by the Indian Government’s Ministry of Labour and Employment. Individual workers in the unorganised sector and below the poverty line are covered under this scheme. The cover also extends to their family (maximum of five members)."
    },
    {
        name: "Universal Health Insurance Scheme",
        description: "Globally, a lot of developed and developing nations have some sort of health care schemes for the benefit of their poor people. In India, the Universal Health Insurance Scheme aspires to do that and much more. This scheme can be availed by the poorest of the poor in the age group of 5 to 70 years. Universal Health Insurance Scheme offers individual as well as group health insurance. It covers hospitalisation, accident, and disability. The premium varies as per the size of the family. Those falling under the poverty line need to show proper documentation to avail the policy."
    },
    {
        name: "Yeshasvini Health Insurance Scheme",
        description: "The Yeshasvini Health Insurance Scheme is promoted by the Karnataka State Government. It is meant for farmers and peasants associated with a co-operative society. More than 800 procedures (Orthopaedic, Neurology, Angioplasty, etc.) are covered as per this insurance policy. Co-operative societies help the peasants and farmers to get enrolled in the Yeshasvini Health Insurance Scheme. The beneficiaries can avail health care through network hospitals. The scheme extends its benefits to the family members of the main beneficiary as well."
    },
    {
        name: "West Bengal Health Scheme",
        description: "This scheme was launched by the Government of West Bengal for its employees in the year 2008. It is also applicable for pensioners. It received an update in the year 2014 and was called West Bengal Health for All Employees and Pensioners Cashless Medical Treatment Scheme."
    }

    ];

    var schemeCardsHTML = "";
    schemes.forEach(function(scheme) {
        schemeCardsHTML += "<div><h2>" + scheme.name + "</h2><p>" + scheme.description + "</p></div>";
    });

    document.getElementById("schemeCards").innerHTML = schemeCardsHTML;
}

window.onload = function() {
    generateSchemeCards();
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
