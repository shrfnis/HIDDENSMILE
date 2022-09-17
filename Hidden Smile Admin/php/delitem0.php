<?php
//Delete data
include('dbconn.php');

//query
$sql="DELETE FROM `items`
	WHERE `items`.`item_ID`="."'".$_GET['iid']."'";
mysqli_query($dbconn, $sql);
echo "<script> history.go(-1); </script>";

?>