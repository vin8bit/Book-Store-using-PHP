<?php
include('config.php'); //Database Connection
  
    $h =0;
    $h2 =0;
    $h3 =0;
    $h4 =0;
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $mini = isset($_POST['mini']) ? $_POST['mini'] : '';
    $maxi = isset($_POST['maxi']) ? $_POST['maxi'] : '';
    $notfound = 0;
    if (isset($_POST["category"]) && $category !=="") {
    
        $query = $con->prepare('SELECT * FROM book WHERE book_category = :id');
        if (!$query) return false;
        if (!$query->execute(array(':id' => $category))) return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)){
            echo '<img id="notfoundimg" width= "200px" src="./icons/notfound.jpg" alt="">
            <h2 id="notfoundheading">Book not found on this price range. Thank you!</h2>';
        }
        if (empty($results)) return false;
        foreach ($results as $row){
            if($mini <= $row['book_price'] && $maxi >= $row['book_price'] ){
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
                        $h++;     
                }  else {
                        $h2++;}
                    
            }
            if($h == 0 && $h2 != 0){
                echo '<img id="notfoundimg" width= "200px" src="./icons/notfound.jpg" alt="">
                <h2 id="notfoundheading">Book not found on this price range. Thank you!</h2>';
           
            }
            

    }else{   $query = $con->prepare('SELECT * FROM book limit 30');
        if (!$query) return false;
        if(!$query->execute())return false;
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)) return false;
        foreach ($results as $row){
            if($mini <= $row['book_price'] && $maxi >= $row['book_price'] ){
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
                        $h3++;     
                    }  else {
                            $h4++;} 
            }

            if($h3 == 0 && $h4 != 0){
                echo '<img id="notfoundimg" width= "200px" src="./icons/notfound.jpg" alt="">
                <h2 id="notfoundheading">Book not found on this price range. Thank you!</h2>';
           
            }
    }
   
?>
