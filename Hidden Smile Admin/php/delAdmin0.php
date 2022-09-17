<?php
//Delete data
include('dbconn.php');

//query
$sql0="UPDATE `orders` SET `admin_ID` = NULL 
WHERE `orders`.`admin_ID` ="."'".$_GET['aid']."'";
mysqli_query($dbconn, $sql0) or die("Error: " . mysqli_error($dbconn));

$sql="DELETE FROM `admins`
	WHERE `admins`.`admin_ID` ="."'".$_GET['aid']."'";
mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
echo  "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
			echo "<script> history.go(-1); </script>";

?>
