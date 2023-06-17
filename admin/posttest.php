<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    this is all feched data from database
    <?php 

include_once '../html/chathead.html';

include_once "../php/config.php";
$sql2 = "SELECT * FROM `post`";
$query = mysqli_query($con,$sql2);
if(mysqli_num_rows($query) > 0){

   while($row = mysqli_fetch_assoc($query)) {
       
    $title = $row['title'];
    $discription = $row['discription'];
    $price = $row['price'];
    $poutput = "";
    $img = $row['image'];

    ?>
<p>if is postes</p>
<img src="post_img/<?php echo  $row['image']; ?>" width="50px" height="50px" alt=""><br>
<?php echo $row['title'];  ?><br>
<?php echo $row['price'];  ?><br>
<?php echo $row['discription'];  ?>
    <?php


   }

}
 
?>



</body>
</html>