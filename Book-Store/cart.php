<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Document</title>
</head>
<body>
<h2>Your Shopping Cart</h2>
<div class="cart">

<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<tbody>
<tr id="heading_tr" >
<td></td>
<td id="hname">BOOK NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='./uploads/<?php echo $product["img"]; ?>' width="50" height="60" />
</td>
<td id="name_td"><?php echo $product["name"]; ?><br />
</td>
<td><?php echo $product["qnt"]; ?><br /></td>
<td><?php echo "Rs. ".$product["price"]; ?></td>
<td><?php echo "Rs. ".$product["total"]; ?></td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'><img src="./icons/remove.png" alt=""></button>
</form>
</td>
</tr>
<?php
$total_price += ($product["price"]*$product["qnt"]);
}
?>
<tr>
<td colspan="5">
<strong>TOTAL: <?php echo "Rs. ".$total_price; ?></strong>
</td>

</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="div_button">
    <a href="displaybook.php"><button class="button cunt">Continue Shopping</button></a>
    <a href="checkout.php"><button class="button check">Checkout</button></a>
</div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</body>
</html>