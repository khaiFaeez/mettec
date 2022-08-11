<?php 

require 'vendor/autoload.php';
$smarty = new Smarty();

$debug = 1; //tukar jadi 1 kalau nk tgk error

//error display setting
if($debug == 1)
{
	ini_set('display_errors',$debug);
	error_reporting(E_ALL ^ E_NOTICE);	
}
else
{
	// ini_set(display_errors,$debug);
	error_reporting($debug);
}

$module = $_GET['module'];

session_start();

//set default module
if(!isset($module) || $module == "")
{
	$module = "home";
}elseif ($module == "product_crud" && (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)) {
	header("Location: ./index.php?module=login");
}
elseif ($module == "login" && (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)) {
	header("Location: ./index.php?module=product_crud");
	//
}

// echo $module;

/*start set header*/
$header = new Smarty;

require_once("configs/db_config.php");

$sql = "SELECT * FROM products ORDER BY product_id";
$result = $mysqli -> query($sql);

// Fetch all products
$products = $result -> fetch_all(MYSQLI_ASSOC);

// Free result set
$result -> free_result();

foreach ($products as $key => $value) {
	$pname = str_replace('<h1>', '', $value['product_name']);
	$products[$key]['product_name'] = str_replace('</h1>', '', $pname);
}

// $mysqli -> close();

$header->assign("module", $module);	
$header->assign("product_id", $_GET['product_id']);	
$header->assign("products", $products);

$header = $header->fetch("tpl_header.php");
/*end set header*/

$footer = new Smarty;
$footer = $footer->fetch("tpl_footer.php");

$body = new Smarty;

$body->assign("header", $header);
$body->assign("footer", $footer);	

//get template file
if(file_exists("modules/$module.php"))
{
	require_once("modules/$module.php");

	$body = $body->fetch("tpl_{$module}.php");
}
else{	
	$body = $body->fetch("tpl_{$module}.php");
}


$smarty->assign("body", $body);	
$smarty->display("tpl_mainlayout.php");
