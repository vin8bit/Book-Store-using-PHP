
<?php
    session_start();
    include_once("config.php");
    if(isset($_GET["book-code"]))
    {
        
$id = $_GET['book-code'];
$query = $con->prepare('SELECT * FROM book WHERE book_code = :id');
if (!$query) return false;
if (!$query->execute(array(':id' => $id))) return false;
$results = $query->fetchAll(\PDO::FETCH_ASSOC);
if (empty($results)) return false;
foreach ($results as $row){
$code2 = $row['book_code'];
$name2 = $row['book_name'];
$price2 = $row['book_price'];
$quantity2 = $row['book_quantity'];
$author2 = $row['book_author'];
$publisher2 = $row['book_publisher'];
$category2 = $row['book_category'];
$img = $img2 = $row['book_img'];
$isbn2 = $row['book_isbn'];
$edition2 = $row['book_edition'];
$description2 = $row['book_description'];
}




       
       
    }
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
  
    <link rel="stylesheet" href="./css/displaybook.css">
    <link rel="stylesheet" href="./css/bookdetails.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
    <script src="./js/bookdetails.js"></script> 
   
    
    <title>Udit Book Store</title>

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
            <div id="login-div"> </div>
            <a href="cart.php">
           <div class="cart_div">
           <img src="./icons/cart_icon.png" />
            </div></a>
        </div>
    </nav>
    <!-- End Main Navbar -->

    <!-- Start Main -->

    <div class="body-container">
       
        <div class="book-container">
            <div class="details-container">
                <div class="container1">
                    <div class="img">
                        <img id ="img" src="./uploads/<?php echo isset($img2) ? $img2 : ''; ?>" alt="">
                    </div>
                    <div class="details">
                        <label for="">Name : <span id="span_Id"><?php echo isset($name2) ? $name2 : ''; ?></span></label>
                        <label for="">Pricer : <span>Rs <?php echo isset($price2) ? $price2 : ''; ?></span></label>
                        <label for="">Author : <span><?php echo isset($author2) ? $author2 : ''; ?></span></label>
                        <label for="">Publisher : <span><?php echo isset($publisher2) ? $publisher2 : ''; ?></span></label>
                        <label for="">ISBN No. : <span><?php echo isset($isbn2) ? $isbn2 : ''; ?></span></label>
                        <label for="">Edition : <span><?php echo isset($edition2) ? $edition2 : ''; ?></span></label>
                       
                        <label id="qntl"for="qnt">Quantity : <span id="qntspan"></span></label>
                        <input id ="qnt" name="qnt" type="number" value=1  placeholder="Quantity">
                        <input id ="qnt2" name="qnt2" type="hidden" value=<?php echo isset($quantity2) ? $quantity2 : ''; ?>>
                        <input id ="code" name="code" type="hidden" value=<?php echo isset($code2) ? $code2 : ''; ?>>
                        <input id ="price" name="price" type="hidden" value=<?php echo isset($price2) ? $price2 : ''; ?>>
                        <input id ="img5" name="img5" type="hidden" value=<?php echo isset($img2) ? $img2 : ''; ?>>
                        <button id="add-cart"  onclick="checkQnt()">Add To Cart</button>
                    </div>
                </div>
                <div class="container2">
                    <h3>More About book :</h3>
                    <p><?php echo isset($description2) ? $description2 : ''; ?></p>
                </div>
            </div>
        
        <h1>Related Books</h1>
        <hr>
        <?php

        $query = $con->prepare('SELECT * FROM book WHERE book_category = :id');
        if (!$query) return false;
        if (!$query->execute(array(':id' => $category2))) return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)){
            echo '<img id="notfoundimg" width= "200px" src="./icons/notfound.jpg" alt="">
            <h2 id="notfoundheading">Book not found on this price range. Thank you!</h2>';
        }
        if (empty($results)) return false;
        foreach ($results as $row){
         
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
        ?>


        </div>
        <div class="sidebar">
            <img src="./icons/banner2.jpg" alt="" class="banner2">
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
 <script src="./js/checklogin.js"></script> 
</body>
</html>
