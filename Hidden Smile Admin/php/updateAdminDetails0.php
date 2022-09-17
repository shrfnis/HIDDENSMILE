<?php
session_start();
include('dbconn.php');

if(isset($_SESSION['admin'])){
	$admin = $_GET['aid'];
	if(isset($_POST['admin-editprofile'])){

		$name = mysqli_real_escape_string ($dbconn,$_POST['name']);
		$email = mysqli_real_escape_string ($dbconn,$_POST['email']);
		$phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);
		$newpw = mysqli_real_escape_string($dbconn,$_POST['npassword']);

		if($newpw != ""){

		$sql="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno',
		admin_Password = '".md5($newpw)."'
		WHERE admin_ID = '$admin'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
		}
		else{

		$sql="UPDATE admins SET admin_Name = '$name',
		admin_Email = '$email',
		admin_PhoneNo = '$phoneno'
		WHERE admin_ID = '$admin'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";
		echo "<script> history.go(-1); </script>";
	}

}
}
else{
	echo"error";
}

?>