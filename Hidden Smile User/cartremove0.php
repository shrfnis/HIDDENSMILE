<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php"); // Using database connection file here
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$id = $_GET['cdid']; // get id through query string

$sql ="DELETE FROM cartdetails WHERE cart_DetailsID = '$id'"; // delete query
$query = mysqli_query($dbconn,$sql);

if($query)
{
    mysqli_close($dbconn); // Close connection
    header("location:cart.php"); // redirects to all records page
    exit;	
}
else
{
    echo"<script language='javascript'>alert('Error Deleting Record');history.go(-1);</script>"; // display error message if not delete
}
}
else if(isset($_SESSION['guest'])){
    $guest = $_SESSION['guest'];
    $id = $_GET['cdid'];

    $sql ="DELETE FROM cartdetails WHERE cart_DetailsID = '$id'"; // delete query
    $query = mysqli_query($dbconn,$sql);

if($query)
{
    mysqli_close($dbconn); // Close connection
    header("location:cart.php"); // redirects to all records page
    exit;	
}
else
{
    echo"<script language='javascript'>alert('Error Deleting Record');history.go(-1);</script>"; // display error message if not delete
}

}
?>