<?php
/* include db connection file */
include("..\Hidden Smile Admin\php\dbconn.php");

if(isset($_POST['submit'])){
	/* capture values from HTML form */
	$username =mysqli_real_escape_string($dbconn,$_POST['username']);
	$name=mysqli_real_escape_string ($dbconn,$_POST['name']);
	$phoneno=mysqli_real_escape_string($dbconn,$_POST['phoneno']);
	$email =mysqli_real_escape_string ($dbconn,$_POST['email']);
	$password =mysqli_real_escape_string ($dbconn,$_POST['password']);

	$sql0 = "SELECT cust_ID
	FROM customers WHERE cust_ID = '$username'";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	
	$row0 = mysqli_num_rows($query0);
	if($row0 != 0){
		echo"<script language='javascript'>alert('Username Existed');history.go(-1);</script>";
	}
	else{
		/* execute SQL INSERT command */
		$sql2 = "INSERT INTO customers (cust_ID, cust_Name, cust_PhoneNo, cust_Email, cust_Password)
		VALUES ('".$username."','" . $name . "', '" . $phoneno . "','" . $email . "','".md5($password)."')";
		
		mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
		echo"<script language='javascript'>alert('Account succesfully registered');history.go(-1);</script>";
	}
}// close if isset()

/* close db connection */
mysqli_close($dbconn);
?>