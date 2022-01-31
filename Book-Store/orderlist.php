<?php
    include_once('config.php');

    session_start();;
if(isset($_SESSION['admin'])){
   
}else{
    header("Location: adminlogin.php");
    die();
}


    if(isset($_GET['id'])){   

        $value =explode("-",$_GET['id']);
        $customer_id = $value[1];
        $order_id = $value[0];

        if(isset($_POST['track'])){
            $change = $_POST['status'];
            try {
                      
                $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql =  "UPDATE `orders`   
        SET `order_id` = :order_id,
            `customer_id` = :customer_id,
            `status` = :status
            WHERE `order_id` = :order_id and `customer_id` = :customer_id";
                
                $statement = $con->prepare($sql);
                $statement->bindValue(":order_id", $order_id);
                $statement->bindValue(":customer_id", $customer_id);
                $statement->bindValue(":status", $change);
                $cont = $statement->execute();
                echo("<script>alert('Status updated successfully');</script>");
        
    
               }catch(PDOException $e) {echo $e->getMessage();}
            
    
        }

      
        
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

    }


 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/track.css">
    <link rel="stylesheet" href="./css/orderlist.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
   

    <title>Udit Book Store</title>

</head>
<body>
    <!-- Start Main -->

    <div class="body-container">
        <div class="sidebar">
            <h2>Change Status :</h2>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">

            <select name="status" id="status" required>
                    
                    <option value=""></option>
                    <option value="received">received</option>
                    <option value="packed">packed</option>
                    <option value="delivered">delivered</option>
                    </select>
                  <input type="submit" id="track" value="UPDATE" name="track">

            </form>
            <a href="orderstable.php"><button id="back">BACK</button></a>
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
            <th>Book Code</th>
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
                 echo "<td id='name'>".$res['book_code']."</td>";
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
    <button id="print">Print Bill</button>            
                
            </div>
        </div>
    </div>

  
    <!-- End Main -->


</body>
</html>