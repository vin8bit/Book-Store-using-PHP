<?php
    include_once('config.php');

    session_start();
    if(isset($_POST['track'])){

    if(isset($_SESSION["customer_id"])){

        $customer_id = $_SESSION["customer_id"];
        $order_id = isset($_POST['order-id']) ? $_POST['order-id'] : '';
        $query = $con->prepare('SELECT * FROM orders WHERE order_id = :order_id and customer_id = :customer_id');
      

        if (!$query->execute(array(':order_id' => $order_id, ':customer_id' => $customer_id))) return false;
        $count= $query->rowCount();
        if ($count == 0){
            echo("<script>alert('ORDER NOT FOUND !');</script>");
        
    
        }else{

        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)) return false;
        
        foreach ($results as $row){
            $status = $row['status'];
            $name = $row['name'];
            $address = $row['address'];
            $phone = $row['phone'];
            $mode = $row['mode'];
            $date = $row['date1'];
        }

    }

    }else{
        echo("<script>alert('Please First Login !');</script>");
    } 

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/track.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
   

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
            <h2>Track Order :</h2>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">

                <input type="number" name="order-id" placeholder="Order ID" required>
                <input type="submit" id="track" value="Track" name="track">

            </form>
        </div>
        <div class="book-container">
            <div><h2>Order Status : <span id="tk"><?php echo isset($status) ? $status : ''; ?></span></h2>
            <h2>Customer Name : <span><?php echo isset($name) ? $name : ''; ?></span></h2>
            <h2>Delivery Address : <span><?php echo isset($address) ? $address : ''; ?></span></h2>
            <h2>Phone No. : <span><?php echo isset($phone) ? $phone : ''; ?></span></h2>
            <h2>Payment Mode : <span><?php echo isset($mode) ? $mode : ''; ?></span></h2>
            <h2>Oreder Date : <span><?php echo isset($date) ? $date : ''; ?></span></h2>
            </div>
            <div>
               

            <table id="myTable">
            <tr>
            <th>Book Name</th>
            <th>Price</th>
            <th>Quantity</th>
			<th>ITEM TOTAL</th>
        </tr>
        <?php
            $sub_total = 0;
            if(isset($order_id) && isset($customer_id)){
                $query = $con->prepare('SELECT * FROM cart WHERE order_id = :order_id and customer_id = :customer_id');
      

                if (!$query->execute(array(':order_id' => $order_id, ':customer_id' => $customer_id))) return false;
                $results = $query->fetchAll(\PDO::FETCH_ASSOC);
                $count2= $query->rowCount();
                if($count2 != 0){
                if (empty($results)) return false;
                foreach ($results as $res){ 
                 echo "<tr>";
                 echo "<td id='code'>".$res['book_name']."</td>";
                 echo "<td id='name'>".$res['price']."</td>";

                 echo "<td id='price'>".$res['quantity']."</td>";
                 $sub_total +=$res['price']*$res['quantity'];
			     echo "<td id='quantity'>".$res['price']*$res['quantity']."</td>";
             
        	    echo "</tr>";
            }
        }
         }
        ?>
    </table>

    <h1>Total Amount : Rs. <span><?php echo isset($sub_total) ? $sub_total : ''; ?></span></h1>            
                
                
            </div>
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