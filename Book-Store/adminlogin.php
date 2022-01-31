<?php
    include_once("config.php");

    if (isset($_POST['login'])){

        $email = isset($_POST['email-id']) ? $_POST['email-id'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $query = "select * from `admin` where `email`=:email and `password` = :password";
        $stmt = $con->prepare($query);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count= $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
        if($count==1){
            session_start();
            $_SESSION['admin'] = "admin";

			echo "<script>alert('Login_succeed');</script>";
			header("Location: adminhome.php"); 
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
   

    <!-- Start Main -->

    <div class="body-container">
       
        <div class="book-container">
        <div class="book-container3">
            <div class="login-div">
                <h2>Admin Login</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="email-id" placeholder="Email ID" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" class="button" name="login"value="Login">
                </form>

            </div>
           
        </div>
     
    </div>


    <!-- End Main -->

      
</body>
</html>
