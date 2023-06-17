<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
    
<style>
    li a{
        text-decoration:none;
        color:#fff;
    }
    .card:hover{
        opacity: 0.8;
    }
</style>

<section class="p-3">
      <div class="container" style="display:flex;">
        <div class="row text-center g-2 ">
 <?php 

include_once '../html/chathead.html';

include_once "../php/config.php";
$sql2 = "SELECT * FROM `post`";
$query = mysqli_query($con,$sql2);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)){  
 $title = $row['title'];      
 $discription = $row['discription'];  
 $price = $row['price'];
 $poutput = "";  
                
 ?>
          <div class="col-md">
            <div class="card bg-light" id="hov" style="width: 20rem; height:30rem">
              <img src="post_img/<?php echo  $row['image']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
              <h4><?php echo $title;  ?></h4>
              <p class="card-text"><?php echo  $discription;  ?>  <br>
              <?php echo $price;  ?> <br> min.order 1 piece</p>
              </div>   
            </div>
          </div>
<?php
}
}
?>
        </div>
      </div>
  </section> 


     



<div class="post-cont">


   <div class="form post">

    <form action="#" enctype = "multipart/form-data" autocomplete ="off">
    <div class="error-tex">  

    </div>
      <div class="container-post">
      <div class="field input">
        <input type="text" name="title" placeholder="Type the title of Design"> 
      </div>
      <div class="field input">
      <input type="text" name="discription" placeholder="Discription">
      </div>
      <div class="field input">
      <input type="text" name="price"placeholder="Price ">
      </div>
      <div class="field image">
        <input type="file" name ="image" requeired>
      </div>
     <div class="field button">
       <button>Post</button>
     </div>
        
         </div>
    </form>
    </div>
    </div>   

<footer>
    <section>
        <p>All right reserved copyright 2023  dagia </p>
    </section>

    


</footer>


<script src="../javascript/home.js"></script>

<script src="../javascript/post.js"></script>



</body>
</html>
<!-- to get fontawesame icons the link is here   {https://cdnjs.com/libraries/font-awesome} by using this link search on browser-->