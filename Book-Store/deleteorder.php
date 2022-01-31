<?php
include_once("config.php");
$value =explode("-",$_GET['id']);
$customer_id = $value[1];
$order_id = $value[0];

$sql = "DELETE FROM `cart` WHERE order_id = ? and customer_id = ?";        
$q = $con->prepare($sql);
$response = $q->execute(array($order_id,$customer_id)); 

$sql2 = "DELETE FROM `orders` WHERE order_id = ? and customer_id = ?";        
$q2 = $con->prepare($sql2);
$response = $q2->execute(array($order_id,$customer_id)); 

header("Location: orderstable.php");

?>