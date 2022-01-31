<?php
include('config.php'); //Database Connection
  
   
    $h5 =0;
    $h6 =0;

    $name = isset($_POST['searchValue']) ? $_POST['searchValue'] : '';
     
        $uresult = $con->query("SELECT * FROM book");
 if ($uresult) {
    if($name !== ''){ 

            while ($row = $uresult->fetch(PDO::FETCH_ASSOC)) {
                    if(strpos(strtoupper($row["book_name"]), strtoupper($name)) !== false){
                    
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
                        $h5++;     
                    }  else {
                            $h6++;} 
             }  
             if($h5 == 0 && $h6 != 0){
                echo '<img id="notfoundimg" width= "200px" src="./icons/notfound.jpg" alt="">
                <h2 id="notfoundheading">Book not found. Thank you!</h2>';
           
            }   
             
     } else{ $uresult = $con->query("SELECT * FROM book limit 30");
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


 }

   
   
?>
