<?php
session_start();
if(isset($_SESSION['unique_id'])){// if user is logged in then come to this page otherwise go to login page
    include_once 'config.php';
    $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
    if(isset($logout_id)){// if logout id is set
        
        // once user logout we'll update this status to offline an in the login form 
        // well again update the status to active now if user logged in successfully
        $sql = "UPDATE `users` SET status = 'offline' WHERE unique_id = {$_SESSION['unique_id']} "; 
        $query = mysqli_query($con,$sql );

        if($query){
            //session_unset();
            session_destroy();
            header("location:../login.php");

        }else{
            echo "not updated".mysqli_error($con);


        }

    }else{
        header('location:../user.php');
    }

}else{
    header('location:../login.php');
}

?>