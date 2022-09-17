<?php
//Delete data
include('dbconn.php');

//query
$sql="UPDATE customers
	SET acc_Status = 'Active'
	WHERE cust_ID ="."'" .$_GET['uid'] . "'";
mysqli_query($dbconn, $sql);
echo  "<script type='text/javascript'>alert('Account Re-activated')</script>";
echo "<script> 	history.go(-1); </script>";

?>