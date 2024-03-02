<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){
        include("../connection.php");
        $title=$_POST["title"];
        $docid=$_POST["docid"];
        $nop=$_POST["nop"];
        $date=$_POST["date"];
        $time=$_POST["time"];
        $sql="insert into schedule (docid,title,scheduledate,scheduletime,nop) values ($docid,'$title','$date','$time',$nop);";
        $result= $database->query($sql);
        header("location: schedule.php?action=session-added&title=$title");
        
    }


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
  
?>
