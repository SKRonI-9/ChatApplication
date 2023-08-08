<?php
$outgoing_id=$_SESSION['unique_id'];
 while($row= mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM msg WHERE (inc_msg_id= {$row['unique_id']}
             OR out_msg_id={$row['unique_id']}) AND (out_msg_id={$outgoing_id}
             OR inc_msg_id={$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        $result=$row2['msg'];
    }else{
        $result="No message available.";
    }

    (strlen($result) > 28) ? $msg= substr($result,0,28). '...' :$msg=$result;

    //($outgoing_id == $row2['out_msg_id'])? $you = "You: " : $you="";

    ($row['status']=="offline now")? $offline="offline": $offline="";

    $output .='<a href="chatPage.php?user_id='.$row['unique_id'].'">
               <div class="content">
               <img src="images/' .$row['img'] .'" alt="">
               <div class="details">
                    <span>'.$row['fname'] ." ".$row['lname'].'</span>
                    <p>'. $msg .'</p>
                </div>
                </div>
                <div class="status-dot'.$offline .'"><i class="fas fa-circle"></i></div>
                </a>';
} 
?>