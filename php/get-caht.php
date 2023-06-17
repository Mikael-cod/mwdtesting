<?php 
session_start();
if(isset( $_SESSION['unique_id'])){
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);

    

 

    $output = "";
   $sql = "SELECT*FROM `message` where (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id') OR (incoming_msg_id = '$outgoing_id' and outgoing_msg_id = '$incoming_id') ORDER BY `message_id` asc";
   $query = mysqli_query($con, $sql);
   if(mysqli_num_rows($query)> 0){
    while($row = mysqli_fetch_assoc($query)){
        if($row['outgoing_msg_id'] === $outgoing_id){
            $message = $row['msg'];
           
            $messag_id = $row["message_id"];
            $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>  <br>'.$message.'<br><span style=" color:orange;font-size:10px;float:right; ">'.$row['mtime'].'</span>  </p>
                              </div>                                         
                           </div>';
                                               
        }else{//incoming message
         
       $output .= '<div class="chat incoming">   
                       <div  class="details">
                        <p ><span id="edit_mess" style="float:right;font-size:25px;" > ... </span> <br>    '  .$row['msg'].' <br><span style="font-size:12px;float:right; ">'.$row['mtime']. '</span></p>
                       </div>
                  </div>';
                  /*<img src="php/images/'. $row2['img'].'" alt="">*/
        }

    }
   }else{
    $output = '<div class="no-message"><p> Welcom to techenical support this is Dagi <br> what can I help you!....  </p></div>';
   }
   echo $output;
    
}else{
    header("../login.php");
}


?>
