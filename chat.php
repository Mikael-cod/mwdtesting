<!DOCTYPE html>
<html lang="en">

<body>
<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    
    header('location:login.php');
}
?>
    <?php 
     include_once 'header.html';
    ?>
<main>
<div class="chat-logout">
    
    </div>
    <section id="hero">
        <h4 style="color:orange">Techenical support from DagiA </h4>

    </section>
  
<!-- this chat box starting -->
<div class="chat-cont">
<div class="chat-wrapper">

<section class= "chat-users">
     <div class="chat-head">
        <?php
            include_once 'php/config.php';
            $owner_id = '1681452408';
            $user_id = $_SESSION['unique_id'];

            $output= ""; 
            $sql = mysqli_query($con, "SELECT * FROM `users` where unique_id = '$owner_id'");
            if(mysqli_num_rows($sql)>0){          
                $row = mysqli_fetch_assoc($sql);                
            }else{
                echo "someting went wrong"; 
            }
        echo $output;
            ?>
            
            <div  class="content">
              
                  <div style="display:flex;" class="prof-cont">
                  <img id="profile" src="images/tsi.jpg" alt="">

                  </div>
                     
                     <div style="display:flex; position:relative; top:-40px; margin-left: 13%; ">
                        <div class="<?php echo $row['status'] ?>"><span class="dot"></span> <p  ></div> 
                     </div>
                        
        
                  <div style="position:relative; top: -75px; box-sizing:border-box;" class="details">
                    <span style="color:green;"><?php echo $row['fname'] ,' ' , $row['lname']; ?> <br> Techenical support assistant</span>
                    <div class="user-list">
                           
                    </div>
                  </div>

            </div>

            
        </div>    
        <div class="chat-box">  

        </div>
       <form action="#" class="typing-area" autocompelet = "off">
        <input type="text" name="outgoing_id" value = "<?php echo $_SESSION['unique_id'] ;  ?>" hidden>
        <input type="text" name="incoming_id"  value = "<?php echo $owner_id; ?>" hidden>
        
        
        <input type="text" name= "message" class="input-field" autocompelet="off" placeholder="Type a message here.....">
        <button ><i class="fab fa-telegram-plane">Send</i></button>

       </form>
        

    </section>
    </div>
</div>









    
</main>

<footer>
    <section>
        <p>All right reserved copyright 2023 G.c </p>
    </section>
</footer>


<script src="javascript/home.js"></script>
<script src ="javascript/chat.js"></script>

</body>
</html>
<!-- to get fontawesame icons the link is here   {https://cdnjs.com/libraries/font-awesome} by using this link search on browser-->