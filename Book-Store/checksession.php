<?php
    session_start();
    if(isset($_SESSION['customer_id'])){
        echo $_SESSION['customer_id'];
    }else{ echo "201";}
?>