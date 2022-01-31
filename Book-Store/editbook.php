
<?php 
include_once('config.php');
session_start();
if(isset($_SESSION['admin'])){
   
}else{
    header("Location: adminlogin.php");
    die();
}

if(isset($_POST['submit'])){
    $upimg ="0";
    $code = isset($_POST['book-code']) ? $_POST['book-code'] : '';
    $name = isset($_POST['book-name']) ? $_POST['book-name'] : '';
    $price = isset($_POST['book-price']) ? $_POST['book-price'] : '';
    $quantity = isset($_POST['book-quantity']) ? $_POST['book-quantity'] : '';
    $author = isset($_POST['book-author']) ? $_POST['book-author'] : '';
    $publisher = isset($_POST['book-publisher']) ? $_POST['book-publisher'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $isbn = isset($_POST['book-isbn']) ? $_POST['book-isbn'] : '';
    $edition = isset($_POST['book-edition']) ? $_POST['book-edition'] : '';
    if(empty($_FILES['book-img']['error'])){
        $img = isset($_FILES['book-img']['name']) ? $_FILES['book-img']['name'] : '';
        $upimg ="1";
    }else{ $upimg = "0"; }
    $description = isset($_POST['description']) ? $_POST['description'] : '';
   
        //upload image

        $file_name = $_FILES['book-img']['name'];
        $file_tmp =$_FILES['book-img']['tmp_name'];
        if(move_uploaded_file($file_tmp,"uploads/".$file_name)){ 
        }


        // insert book details

        if($upimg =="1"){
          

            try {
                  
                $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql =  "UPDATE `book`   
        SET `book_name` = :book_name,
            `book_price` = :book_price,
            `book_quantity` = :book_quantity,
            `book_author` = :book_author,
            `book_publisher` = :book_publisher,
            `book_category` = :book_category,
            `book_img` = :book_img ,
            `book_isbn` = :book_isbn,
            `book_edition` = :book_edition ,
            `book_description` = :book_description 
            WHERE `book_code` = :book_code";
                
                $statement = $con->prepare($sql);
                $statement->bindValue(":book_name", $name);
                $statement->bindValue(":book_price", $price);
                $statement->bindValue(":book_quantity", $quantity);
                $statement->bindValue(":book_author", $author);
                $statement->bindValue(":book_publisher", $publisher);
                $statement->bindValue(":book_category", $category);
                $statement->bindValue(":book_img", $img);
                $statement->bindValue(":book_isbn", $isbn);
                $statement->bindValue(":book_edition", $edition);
                $statement->bindValue(":book_description", $description);
                $statement->bindValue(":book_code", $code);
                $cont = $statement->execute();
                echo("<script>alert('Book updated successfully');</script>");
                header("Location: booktable.php");

               }catch(PDOException $e) {echo $e->getMessage();}
               
        }else{

            try {
                  
                $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql =  "UPDATE `book`   
        SET `book_name` = :book_name,
            `book_price` = :book_price,
            `book_quantity` = :book_quantity,
            `book_author` = :book_author,
            `book_publisher` = :book_publisher,
            `book_category` = :book_category,
            `book_isbn` = :book_isbn,
            `book_edition` = :book_edition ,
            `book_description` = :book_description 
            WHERE `book_code` = :book_code";
                
                $statement = $con->prepare($sql);
                $statement->bindValue(":book_name", $name);
                $statement->bindValue(":book_price", $price);
                $statement->bindValue(":book_quantity", $quantity);
                $statement->bindValue(":book_author", $author);
                $statement->bindValue(":book_publisher", $publisher);
                $statement->bindValue(":book_category", $category);
                $statement->bindValue(":book_isbn", $isbn);
                $statement->bindValue(":book_edition", $edition);
                $statement->bindValue(":book_description", $description);
                $statement->bindValue(":book_code", $code);
                $cont = $statement->execute();
                echo("<script>alert('Book updated successfully');</script>");
                header("Location: booktable.php");

               }catch(PDOException $e) {echo $e->getMessage();}
           
        }
    

}


?>

<?php 
    $id = $_REQUEST['id'];
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

    $con = null;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/adminindex.css">
    <script src="./js/editbook.js"></script> 
    
   
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
                <h1>2</h1>
                <h2>Edit Book</h2>
            </div>

            <div class="main-content">
                <h4>Book Details :</h4>
                <hr class='line'>
                <form name="details-form" id="details-form" action="editbook.php" method="POST" onsubmit="return validateForm();"  enctype="multipart/form-data">
                    <input type="hidden" id="book-code" name="book-code" placeholder="Book Code" value="<?php echo isset($code2) ? $code2 : ''; ?>">  
                   
                    <label for="book-name">Book Name :-<span id="errorname"></span></label>
                    <input type="text" id="book-name" name="book-name" placeholder="Book Name" value="<?php echo isset($name2) ? $name2 : ''; ?>" required>  
                   
                    <label for="book-isbn">ISBN No. :-<span id="errorisbn"></span></label>
                    <input type="text" id="book-isbn" name="book-isbn" placeholder="Book ISBN No." value="<?php echo isset($isbn2) ? $isbn2 : ''; ?>" required>  
                   
                    <label for="book-edition">Edition :-<span id="erroredition"></span></label>
                    <input type="text" id="book-edition" name="book-edition" placeholder="Book Edition" value="<?php echo isset($edition2) ? $edition2 : ''; ?>" required>  
                   


                    <label for="book-price">Book Price :-<span id="errorprice"></span></label>
                    <input type="number" id="book-price" name="book-price" placeholder="Book price" value="<?php echo isset($price2) ? $price2 : ''; ?>" required >  
                    
                    <label for="book-quantity">Book Quantity :-<span id="errorquantity"></span></label>
                    <input type="number" id="book-quantity" name="book-quantity" placeholder="Book Quantity" value="<?php echo isset($quantity2) ? $quantity2 : ''; ?>" required> 

                    <label for="book-author">Book Author:-<span id="errorauthor"></span></label>
                    <input type="text" id="book-author" name="book-author" placeholder="Book Author" value="<?php echo isset($author2) ? $author2 : ''; ?>" required>  
                    
                    <label for="book-publiher">Book Publisher :-<span id="errorpublisher"></span></label>
                    <input type="text" id="book-publisher" name="book-publisher" placeholder="Book Publisher" value="<?php echo isset($publisher2) ? $publisher2 : ''; ?>" required>  
                    
                    <label for="category">Book Category :-<span id="errorcategory"></span></label>
                    <select name="category" id="category" required>
                    
                    <option value="<?php echo isset($category2) ? $category2 : ''; ?> " selected > <?php echo isset($category2) ? $category2 : ''; ?></option>
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
                    <input type="file" id="book-img" name="book-img" placeholder="Book img" >  
                  
                   
                    <label for="description">Book Description :-<span id="errordescription"></span></label>
                    <textarea name="description" id="" cols="65" rows="6" form="details-form" required><?php echo isset($description2) ? $description2 : ''; ?></textarea>
                   
                    
                    <input id="submit" name="submit" type="submit" value="UPDATE BOOK">
                    <input id="reset" type="reset" value="RESET">
                </form>
            </div>

        </div>
    </div>
</body>
</html>