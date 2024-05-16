<?php
$product = (int)$_GET['id'];

session_start();

if (isset($_SESSION['busket'])){
    array_push($_SESSION['busket'], $product);
}
else{
    $_SESSION['busket'] = [$product];
}

header ('Location: ../cart.php');

?>