<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $incoming_id= mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $outgoning_id= mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $message= mysqli_real_escape_string($conn,$_POST['message']);

        if(!empty($message)){
            $sql=mysqli_query($conn,"INSERT INTO msg (inc_msg_id,out_msg_id,msg) 
                              VALUES ({$incoming_id},{$outgoning_id}, '{$message}')") or die();
        }
    }else{
        header("login.php");
    }

?>