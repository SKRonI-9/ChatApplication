<?php
    session_start();
    include_once "config.php";
    
    $outgoing_id=$_SESSION['unique_id'];
    $sTerm= mysqli_real_escape_string($conn, $_POST['sTerm']);
    $output="";
    $sql=mysqli_query($conn,"SELECT * FROM users WHERE fname LIKE '%{$sTerm}%' OR lname LIKE '%{$sTerm}%'");
    if(mysqli_num_rows($sql) >0){
        include "data.php";
    }else{
        $output .="No user found";
    }
    echo $output;
    
?>