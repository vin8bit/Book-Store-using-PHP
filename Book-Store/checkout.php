<?php
include_once('config.php');

session_start();
if(isset($_SESSION["shopping_cart"]) && isset($_SESSION["customer_id"])) {
    
    if(!empty($_SESSION["shopping_cart"]) && !empty($_SESSION["customer_id"])) {
       
    }else{ header("location:login.php");
      die();
    }

}else{header("location:login.php");
    die();
}


    if(isset($_POST['order'])){
    
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $customer_id = $_SESSION["customer_id"];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $date = date("Y-m-d");
        $status = "order";
        $mode = isset($_POST['mode']) ? $_POST['mode'] : '';
        $card_no = !empty($_POST['card-no']) ? $_POST['card-no'] : 0;
        $security_code = !empty($_POST['security-code']) ? $_POST['security-code'] : 'null  ';
        $card_name = !empty($_POST['card-name']) ? $_POST['card-name'] : 'null';
  
        $sql = "INSERT INTO orders (customer_id, name, phone, address, date1, status, mode, card_no, security_code, card_name) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt= $con->prepare($sql);
        $stmt->execute([$customer_id, $name, $phone , $address, $date, $status, $mode, $card_no, $security_code, $card_name]);
        $order_id = $con->lastInsertId();
        if($order_id != 0){

            foreach ($_SESSION["shopping_cart"] as $product){   
  
                $sql = "INSERT INTO cart (order_id, customer_id, book_name, book_code, quantity, price) VALUES (?,?,?,?,?,?)";
                $stmt= $con->prepare($sql);
                $stmt->execute([$order_id, $customer_id, $product["name"], $product["code"], $product["qnt"], $product["price"]]);

                try {
                  
                    $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql2 =  "UPDATE `book` SET 
                    `book_code` = :book_code, 
                    `book_quantity` = :book_quantity
                    WHERE `book_code` = :book_code";
                    $statement = $con->prepare($sql2);
                    $qm = ((int)$product["qnt2"])-((int)$product["qnt"]);
                    $statement->bindValue(":book_code", $product["code"]);
                    $statement->bindValue(":book_quantity", $qm);
                    $cont = $statement->execute();
            
                   }catch(PDOException $e) {echo $e->getMessage();}
         
            }
        
            $reciept = "<h1>Order Reciept</h1> <h5>Order id :  $order_id</h5><h5>Customer id :  $customer_id</h5><h5>Phone No. :  $phone</h5><h5>Address :  $address</h5> <h5>Order Date :  $date</h5><button>Print & Save</button><a href='index.php'><button>Home Page</button>";
            echo("<script>alert('Order successfully');</script>");
            $_SESSION["shopping_cart"] = "";
        }
    

    } 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/checkout.css">
    <script src="./js/checkout.js"></script> 
    <title>Order Details</title>
</head>
<body>
    <div id="reciept">
    <?php echo isset($reciept) ? $reciept : ''; ?>
    <?php if (isset($reciept)){ die(); } ?>

    </div>
    <div class="order_form">
   
        <h4>Order Details</h4>
        <hr>
        <form name="details-form" id="details-form" action="" method="POST" onsubmit="return validateForm();"  enctype="multipart/form-data">
            <label for="name">Name : <span id="error1"></span></label>
            <input type="text" name="name">
            <label for="phone">Phone No. :<span id="error2"></span></label>
            <input type="number" name="phone" >
             <label for="address">Delivert Address :<span id="error3"></span></label>
            <input type="text" name="address">
            <label for="mode">Payment Mode :<span id="error4"></span></label>
            <select name="mode" id="mode">
                <option value=""></option>
                <option value="Debit Card">Debit Card</option>
                <option value="Case On Delivery">Case On Delivery</option>
            </select>
            <h4>Debit Card Details</h4>
            <hr>
            <label for="card-no">Card Number. :<span id="error5"></span></label>
            <input type="number" name="card-no">
            <label for="security-code">Security Code. :<span id="error6"></span></label>
            <input type="text" name="security-code">
            <label for="card-name">Name on card. :<span id="error7"></span></label>
            <input type="text" name="card-name">
            

            <input class="button submit" type="submit" name="order" value="Order">
        </form>
        <a href="index.php"><button class="button cancel">Cancel</button></a>
    </div>
    
</body>
</html>