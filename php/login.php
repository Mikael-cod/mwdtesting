<?php

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($con, $_POST["email"]);
$pass = mysqli_real_escape_string($con, $_POST["pass"]);  
$pwd = md5($pass);
$error = "";

if(!empty($email) && !empty($pass)){
    $sql = mysqli_query($con, "SELECT * FROM `users` where email = '$email' and password = '$pwd'");
           $row = mysqli_fetch_assoc($sql); 
    if(mysqli_num_rows($sql) > 0 and $row['role']== 'customer'){     
          $sql2 = "UPDATE `users` SET status = 'Active' WHERE unique_id = {$row['unique_id']} ";
          $query = mysqli_query($con,$sql2);
             if($query){
               $_SESSION['unique_id'] = $row['unique_id'];//using this session we used user unique_id
               echo "success";    
                }else{
                    echo "somthing want wrong";
                }
       }else if(mysqli_num_rows($sql) > 0 and $row['role']== 'owner'){
        $sql2 = "UPDATE `users` SET status = 'Active' WHERE unique_id = {$row['unique_id']} ";
        $query = mysqli_query($con,$sql2);
        if($query){
         $_SESSION['unique_id'] = $row['unique_id'];//using this session we used user unique_id
         echo "success2";    
        } else{
            echo "somthing want wrong";
        }

       }else{
        $error .=  '<div class ="mess">
        User name or password not mauch!
     </div> ';
       }
      
   
}else{
    $error .= '<div class ="mess">    
                 All input field are required
              </div> ';
}


echo $error;


?>