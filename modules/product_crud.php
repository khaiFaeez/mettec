<?php
	

if($_POST['action'] == "AddProduct")
{
	// echo "<pre>"; print_r($_POST); echo "</pre>"; 	

	// exit();	

	// echo "<pre>"; print_r($_FILES); echo "</pre>";

	$unrelated_info = array("action","product_id");

	// $file_input = array("product_image","brochure","image_1");

	$column_data = "";	

	foreach ($_POST as $key => $value) {

		// echo $key." - ".$value."<br>";

		if(strpos($key, "_path") !== false) //image and file path
		{			
			if(in_array($key, array("brochure_path")))
			{
				$from_dir = "./brochure/temp_brochure/".$value;
				$target_dir = "./brochure/";
				$target_file = $target_dir.$value;
			}
			elseif(in_array($key, array("product_image_path","image_1_path","product_bg_image_path")))
			{
				$from_dir = "./images/temp_images/".$value;
				$target_dir = "./images/";
				$target_file = $target_dir.$value;
			}
			
			if(file_exists($from_dir) && $value != '')
			{
				if (copy($from_dir, $target_file)) {
				    // echo "The file ". $value. " has been uploaded.<br>";

					unlink($from_dir); //remove because using copy

					if($column_data != "")
					{
						$column_data .= ", ";
					}

				    $data = $mysqli -> real_escape_string($value);
					$column_data .= str_replace("_path", "", $key)." = '".$data."'";

				} else {
				    // echo "Sorry, there was an error uploading your file.<br>";
				    echo json_encode(array("status" => false));
				    exit();
				}
			}
		}
		else //other input
		{
			if(!in_array($key, $unrelated_info) && !empty($value))
			{
				if($column_data != "")
				{
					$column_data .= ", ";
				}

				if($key == "product_name")
				{
					$value = str_replace("<p>&nbsp;</p>", "", $value);
				}

				$data = $mysqli -> real_escape_string($value);
				$column_data .= $key." = '".$data."'";
			}
		}

	}

	

	$query = "INSERT INTO products SET ".$column_data.", created_by = ".$_SESSION['user_details']['user_id'];

	// echo $query; exit();

	if ($mysqli->query($query) === TRUE) {
	  // header("Location: ./index.php?module=product_crud&message_type=1");
	  $go_page = "./index.php?module=product_crud";
	  $status = true;		  
	  $_SESSION['message_type'] = 1;
	} else {
	   //header("Location: ./index.php?module=product_crud&message_type=2");	
		$status = false;
	}

	echo json_encode(array("status" => $status, "go_page" => $go_page));

	exit();
}
if($_POST['action'] == "EditProduct")
{
	// echo "<pre>"; print_r($_POST); echo "</pre>";

	// echo "<pre>"; print_r($_FILES); echo "</pre>";

	$unrelated_info = array("action","product_id");

	// $file_input = array("product_image","brochure","image_1");

	$column_data = "";	

	foreach ($_POST as $key => $value) {

		// echo $key." - ".$value."<br>";

		if(strpos($key, "_path") !== false) //image and file path
		{			
			if(in_array($key, array("brochure_path")))
			{
				$from_dir = "./brochure/temp_brochure/".$value;
				$target_dir = "./brochure/";
				$target_file = $target_dir.$value;
			}
			elseif(in_array($key, array("product_bg_image_path","product_image_path","image_1_path")))
			{
				$from_dir = "./images/temp_images/".$value;
				$target_dir = "./images/";
				$target_file = $target_dir.$value;
			}
			
			if(file_exists($from_dir) && $value != '')
			{
				if (copy($from_dir, $target_file)) {
				    // echo "The file ". $value. " has been uploaded.<br>";

					unlink($from_dir); //remove because using copy

					if($column_data != "")
					{
						$column_data .= ", ";
					}

				    $data = $mysqli -> real_escape_string($value);
					$column_data .= str_replace("_path", "", $key)." = '".$data."'";

				} else {
				    // echo "Sorry, there was an error uploading your file.<br>";
				    echo json_encode(array("status" => false));
				    exit();
				}
			}
		}
		else //other input
		{
			if(!in_array($key, $unrelated_info) && !empty($value)) // && !empty($value)
			{
				if($column_data != "")
				{
					$column_data .= ", ";
				}

				if($key == "product_name")
				{
					$value = str_replace("<p>&nbsp;</p>", "", $value);
				}

				$data = $mysqli -> real_escape_string($value);
				$column_data .= $key." = '".$data."'";
			}
		}

	}

	$query = "UPDATE products SET ".$column_data.", created_by = ".$_SESSION['user_details']['user_id']." WHERE product_id = ".$_POST['product_id'];

	// echo $query;

	// exit();

	if ($mysqli->query($query) === TRUE) {
	  	// header("Location: ./index.php?module=product_crud&message_type=1");
	  	$go_page = "./index.php?module=product_crud";
	  	$status = true;		  
		$_SESSION['message_type'] = 3;
	} else {
	  // header("Location: ./index.php?module=product_crud&message_type=2");	
		$status = false;
	}

	echo json_encode(array("status" => $status, "go_page" => $go_page));

	exit();
}
elseif ($_GET['action'] == "delete") {
	
	$sql = "DELETE FROM `products` WHERE `product_id` = ".$_GET['product_id'];
	
	if ($mysqli->query($sql) === TRUE) {
	  
	  $_SESSION['message_type'] = 5;	
	  header("Location: ./index.php?module=product_crud");
	} else {
		$_SESSION['message_type'] = 6;	
	  header("Location: ./index.php?module=product_crud");	
	}

	exit();
}
elseif($_GET['action'] == "UploadFileOrImage")
{	
	// echo "<pre>"; print_r($_FILES); echo "</pre>"; 
	// exit();

	$file_name = "";

	foreach ($_FILES as $key => $value) {
		if(in_array($_GET['input_name'], array("brochure")))
		{
			$target_dir = "./brochure/temp_brochure/";
			$target_file = $target_dir.basename($value["name"]);
		}
		elseif(in_array($_GET['input_name'], array("product_bg_image","product_image","image_1")))
		{
			$target_dir = "./images/temp_images/";
			$target_file = $target_dir.basename($value["name"]);
		}

		if (move_uploaded_file($value["tmp_name"], $target_file)) {
		    // echo "The file ". htmlspecialchars( basename( $_FILES[$key]["name"])). " has been uploaded.<br>";

			if($file_name != "")
			{
				$file_name .= ", ";
			}

		    $data = basename($_FILES[$key]["name"]);
			$file_name .= $data;

			$status = true;
		} else {
		    // echo "Sorry, there was an error uploading your file.<br>";
		    $status = false;
		}
	}	

	echo json_encode(array("status" => $status, "file_name" => $file_name));

	exit();
}

if(isset($_SESSION['message_type']))
{
	$message_type = $_SESSION['message_type'];
	unset($_SESSION['message_type']);
}

//edit product
if(isset($_GET['product_id']))
{
	$sql = "SELECT * FROM products WHERE product_id = ".$_GET['product_id'];
	$result = $mysqli -> query($sql);

	// Fetch  product info
	$product = $result -> fetch_array(MYSQLI_ASSOC);

	// Free result set
	$result -> free_result();

	// $mysqli -> close();

	// print_r($product);

	$body->assign("product", $product);
}
else{	
	$body->assign("open", $_GET['open']);//$_GET['open']
	$body->assign("message_type", $message_type);
}

$body->assign("products", $products);

?>