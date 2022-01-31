<?php 
include_once('config.php');
session_start();;
if(isset($_SESSION['admin'])){
   
}else{
    header("Location: adminlogin.php");
    die();
}
if(isset($_POST['submit'])){

    $code = isset($_POST['book-code']) ? $_POST['book-code'] : '';
    $name = isset($_POST['book-name']) ? $_POST['book-name'] : '';
    $price = isset($_POST['book-price']) ? $_POST['book-price'] : '';
    $quantity = isset($_POST['book-quantity']) ? $_POST['book-quantity'] : '';
    $author = isset($_POST['book-author']) ? $_POST['book-author'] : '';
    $publisher = isset($_POST['book-publisher']) ? $_POST['book-publisher'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $img = isset($_FILES['book-img']['name']) ? $_FILES['book-img']['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $isbn = isset($_POST['book-isbn']) ? $_POST['book-isbn'] : '';
    $edition = isset($_POST['book-edition']) ? $_POST['book-edition'] : '';
    
        //upload image

        $file_name = $_FILES['book-img']['name'];
        $file_tmp =$_FILES['book-img']['tmp_name'];
        $uploadOk = 1;
        if(move_uploaded_file($file_tmp,"uploads/".$file_name)){ 
         $uploadOk = 1;
        }else{ $uploadOk = 0;}


        // insert book details

        if($uploadOk == 1){

            $sql = "INSERT INTO book (book_code, book_name, book_price, book_quantity, book_author, book_publisher, book_category, book_img, book_description, book_isbn, book_edition) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt= $con->prepare($sql);
            $stmt->execute([$code, $name, $price , $quantity, $author, $publisher, $category, $img, $description, $isbn, $edition]);
            $err = $stmt->errorInfo();
                if (isset($err[1])){
                    // 1062 - Duplicate entry
                    if ($err[1] == 1062)
                    echo("<script>alert('Sorry book code is already exist!');</script>");
                   }else{
                    echo("<script>alert('Book add successfully');</script>");
                   }
            
        }


}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/adminindex.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/adminindex.js"></script> 
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
            <div class="title">
                <h1>1</h1>
                <h2>Add Book</h2>
            </div>

            <div class="main-content">
                <h4>Book Details :</h4>
                <hr class='line'>
                <form name="details-form" id="details-form" action="adminindex.php" method="POST" onsubmit="return validateForm();"  enctype="multipart/form-data">
                    <label for="book-code">Book Code : must contain one charactor :-<span id="error"></span></label>
                    <input type="text" id="book-code" name="book-code" placeholder="Book Code" required onfocusout="bookCode()">  
                   
                    <label for="book-name">Book Name :-<span id="errorname"></span></label>
                    <input type="text" id="book-name" name="book-name" placeholder="Book Name" required>  

                    <label for="book-isbn">ISBN No. :-<span id="errorisbn"></span></label>
                    <input type="text" id="book-isbn" name="book-isbn" placeholder="Book ISBN No." required>  
                   
                    <label for="book-edition">Edition :-<span id="erroredition"></span></label>
                    <input type="text" id="book-edition" name="book-edition" placeholder="Book Edition" required>  
                   

                    <label for="book-price">Book Price :-<span id="errorprice"></span></label>
                    <input type="number" id="book-price" name="book-price" placeholder="Book price" required >  
                    
                    <label for="book-quantity">Book Quantity :-<span id="errorquantity"></span></label>
                    <input type="number" id="book-quantity" name="book-quantity" placeholder="Book Quantity" required> 

                    <label for="book-author">Book Author:-<span id="errorauthor"></span></label>
                    <input type="text" id="book-author" name="book-author" placeholder="Book Author" required>  
                    
                    <label for="book-publiher">Book Publisher :-<span id="errorpublisher"></span></label>
                    <input type="text" id="book-publisher" name="book-publisher" placeholder="Book Publisher" required>  
                    
                    <label for="category">Book Category :-<span id="errorcategory"></span></label>
                    <select name="category" id="category" required>
                    
                    <option value=""></option>
                    <option value="Action and Adventure">Action and Adventure</option>
                    <option value="Classics">Classics</option>
                    <option value="Comic Book or Graphic Novel">Comic Book or Graphic Novel</option>
                    <option value="Detective and Mystery">Detective and Mystery</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Historical Fiction">Historical Fiction</option>
                    <option value="Horror">Horror</option>
                    <option value="Literary Fiction">Literary Fiction</option>
                    <option value="Romance">Romance</option>
                    <option value="Science Fiction (Sci-Fi)">Science Fiction (Sci-Fi)</option>
                    <option value="Short Stories">Short Stories</option>
                   </select>

                    <label for="book-img">Book Image :-<span id="errorimg"></span></label>
                    <input type="file" id="book-img" name="book-img" placeholder="Book img" required>  
                    
                    <label for="description">Book Description :-<span id="errordescription"></span></label>
                    <textarea name="description" id="" cols="65" rows="6" form="details-form" required></textarea>
                   

                    <input id="submit" name="submit" type="submit" value="ADD BOOK">
                    <input id="reset" type="reset" value="RESET">
                </form>
            </div>

        </div>
    </div>
</body>
</html>