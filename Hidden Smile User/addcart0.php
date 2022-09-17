<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
if($_SESSION['addcart']==0)
{
     $sql = "INSERT INTO cart(cust_ID,shipping_ID) VALUES ('".$username."',1)";
    //echo $sql;
    mysqli_query($dbconn,$sql);
    
    $_SESSION['addcart']=1;
}

   if(isset($_POST['addtocart']))
{		
        $itemname = mysqli_real_escape_string ($dbconn,$_POST['itemname']);
        $qty = mysqli_real_escape_string ($dbconn,$_POST['qty']);
        $looptype =mysqli_real_escape_string ($dbconn,$_POST['looptype']);
        $sql1 = "INSERT INTO cartdetails(cart_ID, item_ID, Qty) VALUES ((SELECT c.cart_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$username'),(SELECT item_ID FROM items WHERE item_Name = '$itemname' AND loop_Type = '$looptype'),$qty)";
        $insert = mysqli_query($dbconn,$sql1);

    if(!$insert)
    {
        echo $sql1;
    }
    else
    {
         echo"<script language='javascript'>alert('product succesfully added into cart');history.go(-1);</script>";
    }

            
}
}else{
    $guest = $_SESSION['guest'];
    
    if($_SESSION['addcart']==0)
{
     $sql = "INSERT INTO cart(cust_ID,shipping_ID) VALUES ('".$guest."',1)";
    //echo $sql;
    mysqli_query($dbconn,$sql);
    
    $_SESSION['addcart']=1;
}
if(isset($_POST['addtocart']))
{		
        $itemname = mysqli_real_escape_string ($dbconn,$_POST['itemname']);
        $qty = mysqli_real_escape_string ($dbconn,$_POST['qty']);
        $looptype =mysqli_real_escape_string ($dbconn,$_POST['looptype']);
        $sql1 = "INSERT INTO cartdetails(cart_ID, item_ID, Qty) VALUES ((SELECT c.cart_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$guest'),(SELECT item_ID FROM items WHERE item_Name = '$itemname' AND loop_Type = '$looptype'),$qty)";
        $insert = mysqli_query($dbconn,$sql1);

    if(!$insert)
    {
        echo $sql1;
    }
    else
    {
         echo"<script language='javascript'>alert('product succesfully added into cart');history.go(-1);</script>";
    }
}
}


?>