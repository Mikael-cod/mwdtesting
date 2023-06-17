<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    
    header('location:login.php');
}else{
    $uniquid = $_SESSION['unique_id'];
?>


<body>
<?php
include_once 'html/header.html';

?>

<main>
<div class="wrapper">
    <header style="text-align:center ; font-size:25px;  " ><span style="color:green;box-shadow: 0 3px 3px 0px green;">Ethio</span> <span style="color:yellow; box-shadow: 0 3px 3px 0px green;">in</span> <span style="color:red; box-shadow: 0 3px 3px 0px green;">One</span> </header>
    <section class="users">
        <header >
            <?php
            include_once 'php/config.php';
            $sql = mysqli_query($con, "SELECT * FROM users where unique_id = '$uniquid'");
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            }else{
                echo "someting went wrong".mysqli_error($con);
            }
            ?>
            <div class="content">
                <img id="profile" src="php/images/<?php echo $row['img']; ?>" alt="pp">
                <div class="details">
                    <span><?php echo $row['fname'] ,' ' , $row['lname']; ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id='<?php echo $row['unique_id'] ?>'" class="logout">Logout</a>
        </header>

        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name ot search....">
            <button ><img  style="width:25px; height:25px;" src="icons/icons8-search-48.png" alt=""></button>
            
        </div>
        <div class="user-list">
                   
            
        

        </div>
    </section>
</div>

</main>

<script src="javascript/home.js"></script>
<script src="javascript/users.js"></script>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
    </script>

<footer>
    <section>
        <p>All right reserved copyright 2023 G.c </p>
    </section>
</footer>
</body>
</html>
<?php
}

?>