<?php
include_once("config.php");
$id=$_REQUEST['id'];
$sql = "DELETE FROM `book` WHERE book_code = ?";        
$q = $con->prepare($sql);
$response = $q->execute(array($id)); 
header("Location: booktable.php");

?>