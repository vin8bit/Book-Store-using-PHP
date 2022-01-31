<?php 
include_once('config.php');

session_start();;
if(isset($_SESSION['admin'])){
   
}else{
    header("Location: adminlogin.php");
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/adminindex.css">
    <link rel="stylesheet" href="./css/orderstable.css">
    <link rel="stylesheet" href="./css/home.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
   
</head>
<body>
    <div class="container">
        <div class="side-menus">
            <img src="./icons/logo.png" alt="">
            <ul class="menus">
            <a href="adminhome.php"><li>Home</li></a>
                <a href="adminindex.php"><li>Add Book</li></a>
                <a href="booktable.php"><li>Book Table</li></a>
                <a href="orderstable.php"><li>Orders</li></a>
                <a href="customertable.php"><li>Customer</li></a>
                <a href="adminlogout.php"><li>Log Out</li></a>
            
            </ul>

        </div>
     <div class="main">
           
            <div class="box0"><a href="neworders.php"><div class="box"><img src="./icons/order.png" alt=""><h3>New Orders</h3></div></a></div>
            <div class="box0"><a href="recievedorders.php"><div class="box"><img src="./icons/recieved.png" alt=""><h3>Recieved Orders</h3></div></a></div>
            <div class="box0"><a href="packedorders.php"><div class="box"><img src="./icons/packed.png" alt=""><h3>Packed Orders</h3></div></a></div>
            <div class="box0"> <a href="deliveredorders.php"><div class="box"><img src="./icons/delivered.png" alt=""><h3>Delivered Orders</h3></div></a></div>

               
            <div id="img2"> <img src="./icons/slider1.jpg" alt=""></div>
    
     </div>
   
    </div>

  

</body>
</html>