

<!DOCTYPE html>
<html lang="en">

<body>
    <?php 

     include_once 'html/header.html';
    ?>
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
      <div class="container">
    
        <div class="row text-center g-2 ">

        <?php 



include_once "php/config.php";
$sql2 = "SELECT * FROM `post`";
$query = mysqli_query($con,$sql2);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)) {
 $title = $row['title'];
 $discription = $row['discription'];
 $price = $row['price'];
 $poutput = "";

 ?>    
          <div class="col-md">
    
            <div class="card bg-light" id="hov" style="width: 20rem; height:30rem">
              <img src="admin/post_img/<?php echo  $row['image']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
              <h4><?php echo $title; ?></h4>
              <p class="card-text"><?php echo  $discription; ?> <br>
                 US$ <?php echo $price; ?>/Piece <br> min.order 1 piece</p>
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

  
    

<footer>
    <section>
        <p>All right reserved copyright 2023 G.c </p>
    </section>

    


</footer>


<script src="javascript/home.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
 integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" 
integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" 
crossorigin="anonymous"></script>

</body>
</html>
<!-- to get fontawesame icons the link is here   {https://cdnjs.com/libraries/font-awesome} by using this link search on browser-->