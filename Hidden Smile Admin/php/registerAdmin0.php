<?php
/* include db connection file */
include("dbconn.php");

if(isset($_POST['addadmin'])){
	/* capture values from HTML form */
	$admin = $_POST['admin'];
	$password = $_POST['password'];

	$sql0 = "SELECT admin_ID
	FROM admins WHERE admin_ID = '$admin'";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	
	$row0 = mysqli_num_rows($query0);
	if($row0 != 0){
		echo "<script type='text/javascript'>alert('Admin ID Existed!')</script>";
		echo "<script> history.go(-1); </script>";

	}
	else{
		/* execute SQL INSERT command */
		$sql2 = "INSERT INTO admins (admin_ID, admin_Password,admin_Img)
		VALUES ('".$admin."','".md5($password)."','NULL.png')";
		
		mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
		
		/* display a message */
		echo "<script type='text/javascript'>alert('Account Successfully Registered')</script>";
		
	}
	header("Location: ../pages/tables-admin.php?page=1&count=1");
}else{
	echo "error";
}
?>