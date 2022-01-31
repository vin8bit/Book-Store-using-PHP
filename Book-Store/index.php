<?php
    include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/displaybook.css">
    <script src="./js/jquery.js"></script> 
   
   <script src="./js/ajex.js"></script> 
    <title>Book Store</title>

</head>
<body>
    <!-- Start Main Navbar -->
    <nav class='nav-container'>
        <div class="logo">
            <a href="index.php"> <img src="./icons/logo.png" alt=""> </a>
        </div>   
        <div class="menu1">
          <ul>
          <a href="index.php"><li>Home</li></a>
              <a href="displaybook.php"><li>Books</li></a>
              <a href="trackorder.php"><li>Track Order</li></a>
              <a href="about.php"><li>About & Help</li></a>
              
          </ul>

        </div>
        <div class="cart">
            <div id="login-div">
       
           </div> <a href="cart.php">
           <div class="cart_div">
           <img src="./icons/cart_icon.png" />
            </div></a>
        </div>
    </nav>
    <!-- End Main Navbar -->

    <!-- Start Main -->

    <div class="body-container">
        <div class="sidebar">
            <img src="./icons/banner2.jpg" alt="" class="banner2">
        </div>
        <div class="book-container">
        <div class="slider">
            <div id="img">
                <img src="./icons/slider1.jpg" alt="">
            </div>
        </div>
        <h1>I LOVE BOOKS</h1><hr>
        <?php
            $uresult = $con->query("SELECT * FROM book LIMIT 30");
            if ($uresult) {
                while ($row = $uresult->fetch(PDO::FETCH_ASSOC)) {
                    $quantity = $row['book_quantity'];
                    echo "<div class='product_wrapper' id='product_wrapper'>
                        <form method='GET' action='bookdetails.php'>
                        <input type='hidden' name='book-code' value=".$row['book_code']." />
                        <div class='image'><a href='./bookdetails.php?book-code=".$row['book_code']."'><img src='uploads/".$row['book_img']."' /></a></div>
                        <div class='book-name'>".$row['book_name']."</div>
                        <div class='book-price'>Rs ".$row['book_price']."</div>
                        <div class='book-author'>Author:&nbsp;&nbsp;".$row['book_author']."</div>"
                        ;
                        if($quantity>0){
                        echo "<button type='submit' id='submit' name='submit' class='buy'>Buy & View</button>
                        </form>
                        </div>";}else{
                            echo "<button  disabled name='submit' class='unavailable'>Unavailable</button>
                            </form>
                            </div>";
                            }
                }
            }
        ?>
        </div>
    </div>

  
    <!-- End Main -->


    <!-- Start Footer -->

        <footer>
     
        <img class="l" src="./icons/logo.png" alt="">
        <p>© Copyright 2013-2020 - ® All rights reserved by vin8bit </p>
        <div><a href=""><img src="./icons/fb.png" alt=""></a>
        <a href=""><img src="./icons/in.png" alt=""></a>
        <a href=""><img src="./icons/tw.png" alt=""></a>
        </div>
       
        </footer>

       
    <!-- End Footer -->

    <script src="./js/slider.js"></script>
    <script src="./js/checklogin.js"></script> 
</body>
</html>
