<?php
session_start();
/* include db connection file */
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['guest'])){
/* capture values from HTML form */
$guest = $_SESSION['guest'];
$addcart = $_SESSION['addcart'];
$username = mysqli_real_escape_string ($dbconn,$_POST['username']);
$password = mysqli_real_escape_string ($dbconn,$_POST['password']);

$sql0 = "SELECT * FROM cart WHERE cust_ID = '$guest'";
$rs0 = mysqli_query($dbconn,$sql0)or die("Error: " . mysqli_error($dbconn));
$r0 = mysqli_fetch_assoc($rs0);
$cart = $r0['cart_ID'];

if(isset($_POST['submit'])){
	
		/* execute SQL command */
		$sql = "SELECT * FROM customers WHERE cust_ID = '$username'
				AND cust_Password = '".md5($password)."'";
		$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
		$row = mysqli_num_rows($query);
		if($row == 0){
			echo  "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
			echo "<script> history.go(-1); </script>";
		}
		else{

			$r = mysqli_fetch_assoc($query);
			if($r['acc_Status']== 'Inactive'){
				echo  "<script type='text/javascript'>alert('Your account is not active')</script>";
				echo "<script> history.go(-1); </script>";
			}else{
			$_SESSION['username'] = $r['cust_ID'];
			$_SESSION['name'] = $r['cust_Name'];
			$_SESSION['email'] = $r['cust_Email'];
			$_SESSION['phoneno'] = $r['cust_PhoneNo'];
			$_SESSION['password'] = $r['cust_Password'];
			$_SESSION['addr1'] = $r['addr1'];
			$_SESSION['addr2'] = $r['addr2'];
			$_SESSION['postcode'] = $r['postcode'];
			$_SESSION['city'] = $r['city'];
			$_SESSION['state'] = $r['state'];

			$sql1 = "SELECT * FROM cartdetails WHERE cart_ID = '$cart'";
	        $query1 = mysqli_query($dbconn, $sql1) or die("Error: " . mysqli_error($dbconn));
	        $row1= mysqli_num_rows($query1);
	        if($row1 == 0){
				$sql3="DELETE FROM `cart`
				WHERE `cart`.`cart_ID` = '$cart'";
			    mysqli_query($dbconn, $sql3);
				$sql4="DELETE FROM `customers`
				WHERE `customers`.`cust_ID` = '$guest'";
			    mysqli_query($dbconn, $sql4);
				unset($_SESSION['guest']);
	        }
	        else{
				$_SESSION['guest'] = $guest;
	        }



			$sql2 = "SELECT * FROM cart WHERE cust_ID = '$username'";
	        $query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
	        $row2= mysqli_num_rows($query2);
	        if($row2 == 0){
		    $_SESSION['addcart'] = 0;
		    header("Location: ../index.php");
	        }
	        else{
		    $_SESSION['addcart'] = 1;
		    header("Location: ../index.php");
	        }
			}
		}
	}

	
} 
else {
	echo "hello";
}

mysqli_close($dbconn);
?>