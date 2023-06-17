
<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    
        header('location: chat.php');
    
}

?>


<!DOCTYPE html>
<html lang="en">

<body>
    <?php 

     include_once 'html/header.html';
    ?>
<main>
    <section class="login" id="hero">
        <h3>Log-in</h3>
        <div class="container-login">
        <form action="#" enctype = "multipart/form-data" autocomplete ="off">
            <div class="error-tex">   
            </div>
                <div class="field input">           
                    <label for="">Email Address <span style="color:red;">*</span></label>
                    <input type="text " name="email" placeholder="Enter Email" required>
                </div>
                <div class="field input">
                    <label for="">Password <span style="color:red;">*</span></label>
                    <input type="password" name="pass" placeholder="Enter strong password" required>
                </div>
                <div id="singup-btn" class="field button">
                    <input type="submit" name="submit" value="login" >
                </div>

                <div class="account-exi">
                    If you haven't an account <a id="exi" href="signup.php">Sign-up here</a>
                </div>
            
        </form>

        </div>
    </section>
    <div class="texts">
    <div class="words1">
       </div>
    <div class="words">
       </div>
    </div>   
</main>
<footer>
    <section>
        <p>All right reserved copyright 2023 G.c </p>
    </section>
</footer>
<script src="javascript/home.js"></script>

<script src="javascript/login.js"></script>
</body>
</html>
<!-- to get fontawesame icons the link is here   {https://cdnjs.com/libraries/font-awesome} by using this link search on browser-->