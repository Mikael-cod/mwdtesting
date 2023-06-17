<!DOCTYPE html>
<html lang="en">

<body>
    
    <?php 

     include_once 'html/header.html';
    ?>
<main>
    <section class="form signup" id="hero">
        <h3 style="color:white;">Sing-up Here First</h3>
        <div class="container-signup">
        <form action="#" enctype = "multipart/form-data" autocomplete ="off">
            <div class="error-tex"> 

            </div>
            <div class="name-details">
                <div class="field input">
                    <label for="">First Name <span style="color:red;">*</span></label>
                    <input type="text " name ="fname" placeholder="First Name" >
                </div>
                <div class="field input">
                    <label for="">Last Name <span style="color:red;">*</span></label>
                    <input type="text " name="lname" placeholder="Last Name" >
                </div>
            </div>
                <div class="field input">           
                    <label for="">Email Address <span style="color:red;">*</span></label>
                    <input type="text " name="email" placeholder="Enter Email" >
                </div>
                <div class="field input">
                    <label for="">Password <span style="color:red;">*</span></label>
                    <input type="password" name="password" placeholder="Enter strong password" >
                </div>
                <div id="singup-btn" class="field button">
                    <input type="submit" name="submit" value="Sign Up" >
                </div>

                <div style="color:orange; margin-left:-10%;" class="account-exi">
                    If you have an account <a id="exi" href="login.php">Sing-in here</a>
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
<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>

</body>
</html>
<!-- to get fontawesame icons the link is here   {https://cdnjs.com/libraries/font-awesome} by using this link search on browser-->