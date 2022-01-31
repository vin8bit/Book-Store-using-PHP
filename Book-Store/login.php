<?php
    include_once("config.php");
    if(isset($_POST['register'])){
        $name = isset($_POST['name2']) ? $_POST['name2'] : '';
        $email = isset($_POST['email-id2']) ? $_POST['email-id2'] : '';
        $password = isset($_POST['password2']) ? $_POST['password2'] : '';

        $query = "select * from `customer` where `email`=:email";
        $stmt = $con->prepare($query);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $count= $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1){ 
            echo("<script>alert('Sorry email id already exist');</script>");
        
        }else{
        $sql = "INSERT INTO customer (name, email, password) VALUES (?,?,?)";
        $stmt= $con->prepare($sql);
        $stmt->execute([$name, $email , $password]);
        echo("<script>alert('Registration successfully');</script>");
        }       
    }


    //****login****//

    if (isset($_POST['login'])){

        $email = isset($_POST['email-id']) ? $_POST['email-id'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $query = "select * from `customer` where `email`=:email and `password` = :password";
        $stmt = $con->prepare($query);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count= $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
        if($count==1){
            session_start();
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['customer_name'] = $row['name'];
			echo "<script>alert('Login_succeed');</script>";
			header("Location: displaybook.php"); 
        }else{
			echo "<script>alert('Incorrect email id or password');</script>";
		}
    }    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
    <script src="./js/register.js"></script> 

   
   
    
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
       
       </div>
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
        <div class="book-container3">
            <div class="login-div">
                <h3>Login</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="email-id" placeholder="Email ID" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" class="button" name="login"value="Login">
                </form>

            </div>
            <div class="register-div">
            <h3>Register</h3>
            <form name="details-form" id="details-form" action="" method="POST" onsubmit="return validation();"  enctype="multipart/form-data">

                    <input type="text" name="name2" placeholder="Full Name" ><span id="error2"></span>
                    <input type="email" name="email-id2" id="email-id" placeholder="Email ID" ><span id="error"></span>
                    <input type="password" name="password2" placeholder="New Password" ><span id="error3" ></span>
                    <input class="button" type="submit" name="register"value="Register">
                </form>
            </div>
     
            </div>
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
