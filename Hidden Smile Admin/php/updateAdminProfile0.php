<?php
 session_start();
 // database connection 
 include("dbconn.php");

 if(isset($_POST['editprofile'])){

	$admin = $_SESSION['admin'];
	$name = mysqli_real_escape_string ($dbconn,$_POST['name']);
	$email = mysqli_real_escape_string ($dbconn,$_POST['email']);
	$phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);
	$oldpw = mysqli_real_escape_string ($dbconn,$_POST['oldpassword']);
	$newpw = mysqli_real_escape_string ($dbconn,$_POST['newpassword']);

	$sql="SELECT * FROM admins WHERE admin_ID = '$admin'
	AND admin_Password = '$oldpw'";
	$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$row= mysqli_num_rows($query);
	if($row == 0){
		echo  "<script type='text/javascript'>alert('Incorrect Password!')</script>";
		echo "<script> history.go(-1); </script>";
	}else{
		/* execute SQL command */
		$sql1 = "UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno',
		admin_Password = '".md5($newpw)."'
		WHERE admin_ID = '$admin'";

		$sql2 =" SELECT * FROM admins WHERE admin_ID = '$admin'";

		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query2);
			$_SESSION['name'] = $r['admin_Name'];
			$_SESSION['email'] = $r['admin_Email'];
			$_SESSION['phoneno'] = $r['admin_PhoneNo'];

		header("Location: ..\pages\pages-account-settings-account.php");
		
	}
 }
 else{
	echo"error";
}
?>