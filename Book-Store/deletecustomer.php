<?php
include_once("config.php");
$id=$_GET['id'];
$sql = "DELETE FROM `customer` WHERE customer_id = ?";        
$q = $con->prepare($sql);
$response = $q->execute(array($id)); 
header("Location: customertable.php");

?>