<?php
include('dbconn.php');
	$product = $_GET['iid'];
if(isset($_POST['edititem'])){

	if($_FILES["itemimg_upload"]["name"] == ""){
	
		$itemtype = mysqli_real_escape_string ($dbconn,$_POST['itemtype']);
		$looptype = mysqli_real_escape_string ($dbconn,$_POST['looptype']);
		$itemqty = mysqli_real_escape_string ($dbconn,$_POST['itemqty']);
		$retail = mysqli_real_escape_string ($dbconn,$_POST['retail']);
		$sell = mysqli_real_escape_string ($dbconn,$_POST['sell']);
		$itemname = mysqli_real_escape_string ($dbconn,$_POST['itemname']);
		$categories = mysqli_real_escape_string ($dbconn,$_POST['categories']);
		$status = mysqli_real_escape_string ($dbconn,$_POST['status']);

	$sql2="UPDATE items SET item_Type = '$itemtype',
	loop_Type = '$looptype',
	itemQtyInStock = '$itemqty',
	retail_Price = '$retail',
	selling_Price = '$sell',
	item_Name = '$itemname',
	categories = '$categories',
	item_Status = '$status'
	WHERE item_ID ="."'".$_GET['iid']."'";

	$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
	}else{
	$target_dir = "../../Hidden Smile User/img/hs-img/";
	$target_file = $target_dir . basename($_FILES["itemimg_upload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["itemimg_upload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo  "<script type='text/javascript'>alert('File is not an image')</script>";
			$uploadOk = 0;
		}

	// Check file size
	if ($_FILES["itemimg_upload"]["size"] > 20000000) {
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
		if (move_uploaded_file($_FILES["itemimg_upload"]["tmp_name"], $target_file)) {
	//query
	$sql=" SELECT * FROM items WHERE item_ID =" ."'".$_GET['iid']."'";

	$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$r = mysqli_fetch_assoc($query);
		$itemtype = mysqli_real_escape_string ($dbconn,$_POST['itemtype']);
		$looptype = mysqli_real_escape_string ($dbconn,$_POST['looptype']);
		$itemqty = mysqli_real_escape_string ($dbconn,$_POST['itemqty']);
		$retail = mysqli_real_escape_string ($dbconn,$_POST['retail']);
		$sell = mysqli_real_escape_string ($dbconn,$_POST['sell']);
		$itemname = mysqli_real_escape_string ($dbconn,$_POST['itemname']);
		$categories = mysqli_real_escape_string ($dbconn,$_POST['categories']);
		$status = mysqli_real_escape_string ($dbconn,$_POST['status']);
		$itemimg_upload = htmlspecialchars( basename( $_FILES["itemimg_upload"]["name"]));

	$sql2="UPDATE items SET item_Type = '$itemtype',
	loop_Type = '$looptype',
	itemQtyInStock = '$itemqty',
	retail_Price = '$retail',
	selling_Price = '$sell',
	item_Name = '$itemname',
	categories = '$categories',
	item_Img = '$itemimg_upload',
	item_Status = '$status'
	WHERE item_ID ="."'".$_GET['iid']."'";

	$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
	}else{
		echo  "<script type='text/javascript'>alert('Sorry, there was an error updating your profile.')</script>";
	}
	}
}
}
else{
	echo"error";
}

?>