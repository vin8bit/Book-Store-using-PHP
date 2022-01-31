<?php
	include_once 'config.php';

	$bookCode=$_POST['bookCode'];
		
	
	$query = "select * from `book` where `book_code`=:book_code";
	$stmt = $con->prepare($query);
	$stmt->bindParam('book_code', $bookCode, PDO::PARAM_STR);
	$stmt->execute();
	$count= $stmt->rowCount();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if($count == 1 && !empty($row)){ 
		echo ('201');
	}
	
?>
  