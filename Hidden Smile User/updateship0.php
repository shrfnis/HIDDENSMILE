<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    
    $cid = $_GET['cid'];

    $sql = "SELECT * FROM cart WHERE cart_ID = '$cid' ";
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$r = mysqli_fetch_assoc($query);
    if($r == 0){
        echo  "<script type='text/javascript'>alert('Your cart is empty')</script>";
        echo "<script> history.go(-1); </script>";
    }else{
    $ship = mysqli_real_escape_string ($dbconn,$_POST['ship']);

    $sql2 ="UPDATE cart set shipping_ID = '$ship'
    WHERE cart_ID = '$cid'";
    $query2 = mysqli_query($dbconn, $sql2);

    if(!$query2){
        echo  "<script type='text/javascript'>alert('Something went wrong')</script>";
        echo "<script> history.go(-1); </script>";
    }else{
    header("location: checkout.php");
    }
}
}
else{
    
    $guest = $_SESSION['guest'];
    
    $cid = $_GET['cid'];

    $sql = "SELECT * FROM cart WHERE cart_ID = '$cid' ";
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$r = mysqli_fetch_assoc($query);
    if($r == 0){
        echo  "<script type='text/javascript'>alert('Your cart is empty')</script>";
        echo "<script> history.go(-1); </script>";
    }else{
    $ship = mysqli_real_escape_string ($dbconn,$_POST['ship']);

    $sql2 ="UPDATE cart set shipping_ID = '$ship'
    WHERE cart_ID = '$cid'";
    $query2 = mysqli_query($dbconn, $sql2);

    if(!$query2){
        echo  "<script type='text/javascript'>alert('Something went wrong')</script>";
        echo "<script> history.go(-1); </script>";
    }else{
    header("location: checkout.php");
    }
}
}
?>