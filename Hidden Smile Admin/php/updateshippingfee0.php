<?php
include('dbconn.php');
	
	if(isset($_POST['editship'])){

		$west = mysqli_real_escape_string ($dbconn,$_POST['west']);
		$east = mysqli_real_escape_string ($dbconn,$_POST['east']);

		$sql = "UPDATE shipping SET shipping_Subtotal = '$west'
		WHERE shipping_ID = 1";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

		$sql1 = "UPDATE shipping SET shipping_Subtotal = '$east'
		WHERE shipping_ID = 2";
		$query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));

		echo  "<script type='text/javascript'>alert('Save successfully!')</script>";

		echo "<script> history.go(-1); </script>";
}
else{
	echo"error";
	echo"kenapa ni syg";
}

?>