<?php
 session_start();
 // database connection 
 include("dbconn.php");

 if(isset($_POST['editshipping'])){

	$username = $_SESSION['username'];
	$addr1 = mysqli_real_escape_string ($dbconn,$_POST['addr1']);
	$addr2 = mysqli_real_escape_string ($dbconn,$_POST['addr2']);
	$postcode = mysqli_real_escape_string ($dbconn,$_POST['postcode']);
    $city = mysqli_real_escape_string ($dbconn,$_POST['city']);
    $state = mysqli_real_escape_string ($dbconn,$_POST['state']);
		/* execute SQL command */
		$sql = "UPDATE customers SET addr1 = '$addr1',
		addr2 = '$addr2',
		postcode = '$postcode',
        city = '$city',
        state = '$state'
		WHERE cust_ID = '$username'";

		$sql2 =" SELECT * FROM customers WHERE cust_ID = '$username'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
		$r = mysqli_fetch_assoc($query2);
			$_SESSION['addr1'] = $r['addr1'];
			$_SESSION['addr2'] = $r['addr2'];
			$_SESSION['postcode'] = $r['postcode'];
            $_SESSION['city'] = $r['city'];
            $_SESSION['state'] = $r['state'];
		header("Location: viewshipping.php");
		
	}

 else{
	echo"error";
}
?>