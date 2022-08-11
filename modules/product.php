<?php

$sql = "SELECT * FROM products WHERE product_id = ".$_GET['product_id'];
$result = $mysqli -> query($sql);

// Fetch  product info
$product = $result -> fetch_array(MYSQLI_ASSOC);

// Free result set
$result -> free_result();

// $mysqli -> close();

// print_r($product);

$body->assign("product", $product);