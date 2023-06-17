<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname =mysqli_real_escape_string($con, $_POST["lname"]);
$email =mysqli_real_escape_string($con, $_POST["email"]);
$pass =mysqli_real_escape_string($con, $_POST["password"]);
$pwd = md5($pass);

$fullname = $fname.' '.$lname;


$random_id = time();

$error = '';  

if(!empty($fname)&& !empty($lname)&& !empty($email) && !empty($pass)){
    // let's chech user email is valid or not 
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // let's check that email already exist in the databse or 
            $sql = mysqli_query($con, "SELECT * from `users` where email = '$email'");
            if(mysqli_num_rows($sql)>0){   
                $error = '<div class ="mess"> 
                '.$email.' - this email already exists in the databse! 
                </div>';        
            }else{ 
        
                            $sql2 = mysqli_query($con, "INSERT INTO `users` (unique_id,fname,lname,email,password, role) 
                                                                    values ('$random_id','$fname','$lname','$email','$pwd','customer')");
                                    if($sql2){ 
                                            $error = '<div class ="mess-sucess">
                                                         Signup successful! 
                                                      </div>';    
                                        
                                    }else{
                                        $error ='<div class ="mess">
                                                     somthing went wrong !'.mysqli_error($con).'
                                                 </div> ';
                                    } 
            }
    }else{
        $error = '<div class ="mess">
        This email is not valied
     </div> ';
    }
}else{
    $error .= '<div class ="mess">
         '.$fullname.' All input field are required 
              </div> ';
}

echo $error;
?>