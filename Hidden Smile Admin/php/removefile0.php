<?php
session_start();

if(isset($_SESSION['admin'])){
  /* include db connection file */
  include("..\php\dbconn.php");
	// store session in var
	$admin = $_SESSION['admin'];

        $sql = "UPDATE admins SET admin_Img = 'NULL.png'
        WHERE admin_ID = '$admin'";

        $sql2 = "SELECT *
        FROM admins WHERE admin_ID = '$admin'";

        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        $query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
        $r = mysqli_fetch_assoc($query2);
        $_SESSION['admindp'] = $r['admin_Img'];
        echo $_SESSION['admindp'];
        echo "<script> history.go(-1); </script>";
}

?>