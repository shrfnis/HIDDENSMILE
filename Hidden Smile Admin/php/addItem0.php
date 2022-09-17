<?php
session_start();
include('dbconn.php');
if(isset($_POST['additem'])){
	/* include db connection file */
	include("..\php\dbconn.php");
	
	$target_dir = "../../Hidden Smile User/img/hs-img";
	$target_file = $target_dir . basename($_FILES["itemimg"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["itemimg"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "<script type='text/javascript>alert('File is not an image!)</script>'";
			$uploadOk = 0;
		}


	/*Check if file already exists
	if (file_exists($target_file)) {
		unlink($target_file);
		$uploadOk = 1;
	}*/

	// Check file size
	if ($_FILES["itemimg"]["size"] > 20000000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	if (move_uploaded_file($_FILES["itemimg"]["tmp_name"], $target_file)) {
		//query
	$itemid = mysqli_real_escape_string ($dbconn,$_POST['itemid']);
	$itemtype = mysqli_real_escape_string ($dbconn,$_POST['itemtype']);
	$looptype = mysqli_real_escape_string ($dbconn,$_POST['looptype']);
	$itemqty = mysqli_real_escape_string ($dbconn,$_POST['itemqty']);
	$retail = mysqli_real_escape_string ($dbconn,$_POST['retail']);
	$sell = mysqli_real_escape_string ($dbconn,$_POST['sell']);
	$itemname = mysqli_real_escape_string ($dbconn,$_POST['itemname']);
	$categories = mysqli_real_escape_string ($dbconn,$_POST['categories']);
	$itemimg = htmlspecialchars( basename( $_FILES["itemimg"]["name"]));
	

	$sql0 = "SELECT item_ID
	FROM items WHERE item_ID = '$itemid'";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	
	$row0 = mysqli_num_rows($query0);
	if($row0 != 0){
		echo "<script type='text/javascript'>alert('Item ID Existed')</script>";
		return false;
	}
	else {
		$sql2 = "INSERT INTO items (item_ID, item_Type, loop_Type, itemQtyInStock, retail_Price, selling_Price, item_Name, categories, item_Status, item_Img)
		VALUES ('".$itemid."','" . $itemtype. "', '" .$looptype. "','" .$itemqty. "','" .$retail. "','" .$sell. "','".$itemname."', '".$categories."', 'Instock', '".$itemimg."')";

		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		echo  "<script type='text/javascript'>alert('Item Add Successfully!')</script>";
		echo "<script> history.go(-2); </script>";
	}
	}else{
		echo  "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
	}
	
	
	}
}
else{
	echo"error";
}

?>