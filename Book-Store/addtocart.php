<?php
    session_start();
 
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $code = isset($_POST['code']) ? $_POST['code'] : '';
    $qnt = isset($_POST['qnt']) ? $_POST['qnt'] : '';
    $qnt2 = isset($_POST['qnt2']) ? $_POST['qnt2'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $img = isset($_POST['img']) ? $_POST['img'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';

    //echo $name.$code.$qnt.$price.$img.$total;

    $cartArray = array(
     $code=>array(
     'name'=>$name,
     'code'=>$code,
     'price'=>$price,
     'qnt'=>$qnt,
     'qnt2'=>$qnt2,
     'img'=>$img,
     'total'=>$total)
    );
     
    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        echo "Book is added to your cart!";

    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
     echo "Book is already added to your cart!"; 
        } else {
        $_SESSION["shopping_cart"] = array_merge(
        $_SESSION["shopping_cart"],
        $cartArray
        );
      
       echo "Book is added to your cart!";
     }
     
     }
    
    
?>