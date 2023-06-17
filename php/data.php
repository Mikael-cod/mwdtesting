<?php

while($row = mysqli_fetch_assoc($sql)){ 
  $sql2 = "SELECT * FROM `message` WHERE (incoming_msg_id = {$row['unique_id']} or outgoing_msg_id = {$row['unique_id']}) 
                                     AND 
  (outgoing_msg_id = {$outgoing_id} or incoming_msg_id = {$outgoing_id}) ORDER BY `message_id` DESC LIMIT 1";

  $query2 = mysqli_query($con, $sql2);
  if(mysqli_num_rows($query2) > 0 ){
    $row2 = mysqli_fetch_assoc($query2);
    $ou_you_id= $row2['outgoing_msg_id'];
    $result = $row2['msg']; 
    (strlen($result)> 28) ? $msg = substr($result, 0, 28).'.....': $msg = $result;
    // separete outgoing message from incoming message 
    ( $outgoing_id == $ou_you_id ) ? $you = '<img id="out_message"  src="icons/icons8-send-30.png"  alt=""> ': $you = "";
  }else{
    $result = "<font color= red> No message available...</font>"; 
    $you ="";
    $msg ="no message available";
  }

  // trimming message if word are more than 28
     ($row['status'] == "offline")? $offline = "offline": $offline = "";
  $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                      <div  class="content">
                        <img id="profile" src="php/images/'. $row['img'].'"  alt="pp"> 
                            <div class="details">
                              <span>  ' .$row['fname']. " " .$row['lname'].'</span> 
                              <p>'. $you .$msg.'</p>
                            </div>
                       </div>
                           <div class="status-dot '.$offline.'"><span class="dot"></span></div>
                    </a>' ;
    }
?>