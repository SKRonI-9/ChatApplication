<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoning_id= mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $incoming_id= mysqli_real_escape_string($conn,$_POST['incoming_id']);
    
    $output="";

    $sql="SELECT * FROM msg 
          LEFT JOIN users ON users.unique_id = msg.inc_msg_id
          WHERE (out_msg_id={$outgoning_id} AND inc_msg_id={$incoming_id})
          OR (out_msg_id={$incoming_id} AND inc_msg_id={$outgoning_id}) ORDER BY msg_id";

    $query=mysqli_query($conn, $sql);

    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            if($row['out_msg_id']===$outgoning_id){
                $output.='<div class="chat outgoing">
                          <div class="details">
                               <p>'.$row['msg'].'</p>
                          </div>
                          </div>';
            }else{
                $output.='<div class="chat incoming">
                          <img src="images/'.$row['img'].'" alt="">
                          <div class="details">
                               <p>'.$row['msg'].'</p>
                          </div>
                          </div>';
            }
        }
        echo $output;
    }
}else{
    header("login.php");
}
?>
