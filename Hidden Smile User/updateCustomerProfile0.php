<?php
 session_start();
 // database connection 
 include("..\Hidden Smile Admin\php\dbconn.php");

 if(isset($_POST['editprofile'])){

	$username = $_SESSION['username'];
	$name = mysqli_real_escape_string($dbconn,$_POST['name']);
	$email = mysqli_real_escape_string($dbconn,$_POST['email']);
	$phoneno = mysqli_real_escape_string($dbconn,$_POST['phoneno']);
	$oldpw = mysqli_real_escape_string($dbconn,$_POST['opassword']);
	$newpw = mysqli_real_escape_string($dbconn,$_POST['npassword']);

	if($oldpw != "" && $newpw != ""){

		$sql="SELECT * FROM customers WHERE cust_ID = '$username'
		AND cust_Password = '".md5($oldpw)."'";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$row= mysqli_num_rows($query);
		if($row == 0){
			echo  "<script type='text/javascript'>alert('Incorrect Password!')</script>";
			echo "<script> history.go(-1); </script>";
		}else{
		/* execute SQL command */
		$sql = "UPDATE customers SET cust_Name = '$name',
		cust_Email = '$email',
		cust_PhoneNo = '$phoneno',
		cust_Password = '".md5($newpw)."'
		WHERE cust_ID = '$username'";

		$sql2 =" SELECT * FROM customers WHERE cust_ID = '$username'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query2);
			$_SESSION['name'] = $r['cust_Name'];
			$_SESSION['email'] = $r['cust_Email'];
			$_SESSION['phoneno'] = $r['cust_PhoneNo'];
			echo"<script language='javascript'>alert('Profile updated');history.go(-1);</script>";
		}
		
	}else{
		$sql = "UPDATE customers SET cust_Name = '$name',
		cust_Email = '$email',
		cust_PhoneNo = '$phoneno'
		WHERE cust_ID = '$username'";

		$sql2 =" SELECT * FROM customers WHERE cust_ID = '$username'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query2);
			$_SESSION['name'] = $r['cust_Name'];
			$_SESSION['email'] = $r['cust_Email'];
			$_SESSION['phoneno'] = $r['cust_PhoneNo'];
			echo"<script language='javascript'>alert('Profile updated');history.go(-1);</script>";
	}
 }

 else{
	echo"error";
}
?>