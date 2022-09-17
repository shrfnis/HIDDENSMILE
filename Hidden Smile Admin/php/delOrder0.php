<?php
//Delete data
include('dbconn.php');

//query
$sql="DELETE FROM `orderdetails`
	WHERE `orderdetails`.`order_ID` ="."'".$_GET['oid']."'";
mysqli_query($dbconn, $sql);

$sql1="DELETE FROM `orders`
	WHERE `orders`.`order_ID` ="."'".$_GET['oid']."'";
mysqli_query($dbconn, $sql1);
echo  "<script type='text/javascript'>alert('Order successfully deleted!')</script>";
echo "<script> history.go(-1); </script>";

?>
