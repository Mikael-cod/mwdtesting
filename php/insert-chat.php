<?php 
session_start();
if(isset( $_SESSION['unique_id'])){
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
   $time = date('D h:i A');
   
    if(!empty($message)){
        $sql = mysqli_query($con, "INSERT INTO `message` (incoming_msg_id, outgoing_msg_id, msg, mtime) 
                                                   VALUES('$incoming_id','$outgoing_id','$message', '$time') ");
    
    }
}else{  

    header("../login.php");
}


?>