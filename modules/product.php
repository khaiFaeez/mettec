<?php

$sql = "SELECT * FROM products WHERE product_id = ".$_GET['product_id'];
$sql_productlines = "SELECT * FROM product_line WHERE product_id = ".$_GET['product_id']." ORDER BY product_id";

$result = $mysqli -> query($sql);
$result_productlines = $mysqli -> query($sql_productlines);
$num_rows = mysqli_num_rows($result_productlines);

// Fetch  product info
$product = $result -> fetch_array(MYSQLI_ASSOC);
//fetch all
$product_productlines = $result_productlines -> fetch_all(MYSQLI_ASSOC);

// Free result set
$result -> free_result();
$result_productlines -> free_result();


foreach ($product_productlines as $key => $value) {
	$pname = str_replace('<h1>', '', $value['product_line_name']);
	$products_line[$key]['product_line_name'] = str_replace('</h1>', '', $pname);
    $products_line[$key]['product_line_brief'] =$value['product_line_brief'];
    $products_line[$key]['product_line_desc'] =$value['product_line_desc'];
    $products_line[$key]['product_images'] =$value['product_images'];
    $products_line[$key]['product_brochure'] =$value['product_brochure'];
}


//print_r($products_line);


// $mysqli -> close();



$body->assign("product", $product);
$body->assign("product_lines", $products_line);
$body->assign("total_productlines", $num_rows);