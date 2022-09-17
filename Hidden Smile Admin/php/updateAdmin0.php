<?php
session_start();
include('dbconn.php');

if(isset($_SESSION['admin'])){
	$admin = $_SESSION['admin'];
	if(isset($_POST['editprofile'])){

	if($_FILES["img_upload"]["name"] == ""){

		$name = mysqli_real_escape_string ($dbconn,$_POST['name']);
		$email = mysqli_real_escape_string ($dbconn,$_POST['email']);
		$phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);
		$oldpw = mysqli_real_escape_string($dbconn,$_POST['opassword']);
		$newpw = mysqli_real_escape_string($dbconn,$_POST['npassword']);

		if($oldpw != "" && $newpw != ""){

		$sql="SELECT * FROM admins WHERE admin_ID = '$admin'
		AND admin_Password = '".md5($oldpw)."'";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$row= mysqli_num_rows($query);
		if($row == 0){
			echo  "<script type='text/javascript'>alert('Incorrect Password!')</script>";
			echo "<script> history.go(-1); </script>";
		}else{

		$sql="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno',
		admin_Password = '".md5($newpw)."'
		WHERE admin_ID = '$admin'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		$sql1="SELECT * FROM admins WHERE admin_ID = '$admin'";
		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query1);
		$_SESSION['name'] = $r['admin_Name'];
		$_SESSION['email'] = $r['admin_Email'];
		$_SESSION['phoneno'] = $r['admin_PhoneNo'];

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
		}
	}
	else{

		$sql="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno'
		WHERE admin_ID = '$admin'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		$sql1="SELECT * FROM admins WHERE admin_ID = '$admin'";
		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query1);
		$_SESSION['name'] = $r['admin_Name'];
		$_SESSION['email'] = $r['admin_Email'];
		$_SESSION['phoneno'] = $r['admin_PhoneNo'];

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
	}

	}else{
		$target_dir = "../assets/img/avatars/";
		$target_file = $target_dir . basename($_FILES["img_upload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["img_upload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo  "<script type='text/javascript'>alert('File is not an image')</script>";
			$uploadOk = 0;
		}

	// Check file size
	if ($_FILES["img_upload"]["size"] > 20000000) {
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
		if (move_uploaded_file($_FILES["img_upload"]["tmp_name"], $target_file)) {
	//query
	$sql=" SELECT * FROM admins WHERE admin_ID = '$admin'";

	$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$r = mysqli_fetch_assoc($query);
		$name = mysqli_real_escape_string ($dbconn,$_POST['name']);
		$email = mysqli_real_escape_string ($dbconn,$_POST['email']);
		$phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);
		$oldpw = mysqli_real_escape_string($dbconn,$_POST['opassword']);
		$newpw = mysqli_real_escape_string($dbconn,$_POST['npassword']);
		$img_upload = htmlspecialchars( basename( $_FILES["img_upload"]["name"]));

		if($oldpw != "" && $newpw != ""){

		$sql="SELECT * FROM admins WHERE admin_ID = '$admin'
		AND admin_Password = '".md5($oldpw)."'";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$row= mysqli_num_rows($query);
		if($row == 0){
			echo  "<script type='text/javascript'>alert('Incorrect Password!')</script>";
			echo "<script> history.go(-1); </script>";
		}else{

		$sql2="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno',
		admin_Img = '$img_upload',
		admin_Password = '".md5($newpw)."'
		WHERE admin_ID = '$admin'";

		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));

		$sql1="SELECT * FROM admins WHERE admin_ID = '$admin'";
		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
		$r1 = mysqli_fetch_assoc($query1);
		$_SESSION['name'] = $r1['admin_Name'];
		$_SESSION['email'] = $r1['admin_Email'];
		$_SESSION['phoneno'] = $r1['admin_PhoneNo'];
		$_SESSION['admindp'] = $r1['admin_Img'];
		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
		}
	} 
	else{
		$sql2="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno',
		admin_Img = '$img_upload'
		WHERE admin_ID = '$admin'";

		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));

		$sql1="SELECT * FROM admins WHERE admin_ID = '$admin'";
		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
		$r1 = mysqli_fetch_assoc($query1);
		$_SESSION['name'] = $r1['admin_Name'];
		$_SESSION['email'] = $r1['admin_Email'];
		$_SESSION['phoneno'] = $r1['admin_PhoneNo'];
		$_SESSION['admindp'] = $r1['admin_Img'];
		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
	}
	}else{
		echo  "<script type='text/javascript'>alert('Sorry, there was an error updating your profile.')</script>";
	}
	}
	}

}
}
else{
	echo"error";
}

?>