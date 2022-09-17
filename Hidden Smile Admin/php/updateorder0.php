<?php
include('dbconn.php');
	$oid = $_GET['oid'];
	
	if(isset($_POST['editorder'])){

		$ostatus = mysqli_real_escape_string ($dbconn,$_POST['orderstatus']);
		$pstatus = mysqli_real_escape_string ($dbconn,$_POST['paymentstatus']);
		$admin = mysqli_real_escape_string ($dbconn,$_POST['adminsession']);

		$sql = "UPDATE orders SET order_Status = '$ostatus',
		payment_Status = '$pstatus',
		admin_ID = '$admin'
		WHERE order_ID = '$oid'";

		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";

		echo "<script> history.go(-1); </script>";
}
else{
	echo"error";
	echo"kenapa ni syg";
}

?>