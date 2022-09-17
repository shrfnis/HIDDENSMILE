<?php
session_start();
/* include db connection file */
include("dbconn.php");

/* capture values from HTML form */
$admin = mysqli_real_escape_string ($dbconn,$_POST['admin']);
$password = mysqli_real_escape_string($dbconn,$_POST['password']);

if(isset($_POST['submit'])){
		/* execute SQL command */
		$sql = "SELECT * FROM admins WHERE admin_ID = '$admin'
				AND admin_Password = '".md5($password)."'";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$row = mysqli_num_rows($query);
		if($row == 0){
			echo  "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
			echo "<script> history.go(-1); </script>";
		}
		else{
			$r = mysqli_fetch_assoc($query);
			$_SESSION['admin'] = $r['admin_ID'];
			$_SESSION['name'] = $r['admin_Name'];
			$_SESSION['email'] = $r['admin_Email'];
			$_SESSION['phoneno'] = $r['admin_PhoneNo'];
			$_SESSION['password'] = $r['admin_Password'];
			$_SESSION['admindp'] = $r['admin_Img'];
			header("Location: ..\..\wp-admin.php");
		}
}
 else {
	echo "hello";
}

mysqli_close($dbconn);
?>