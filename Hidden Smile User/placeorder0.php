<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['username'])){
    if(isset($_POST['placeorder'])){
    $username = $_SESSION['username'];
    $date = date("Y-m-d");
    $cid = $_GET['cid'];
    $name = mysqli_real_escape_string ($dbconn,$_POST['name']);
    $email = mysqli_real_escape_string ($dbconn,$_POST['email']);
    $addr1 = mysqli_real_escape_string ($dbconn,$_POST['addr1']);
    $addr2 = mysqli_real_escape_string ($dbconn,$_POST['addr2']);
    $state = mysqli_real_escape_string ($dbconn,$_POST['state']);
    $postcode = mysqli_real_escape_string ($dbconn,$_POST['postcode']);
    $city = mysqli_real_escape_string ($dbconn,$_POST['city']);
    $phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);

    $sql0 = "UPDATE customers SET cust_Name='$name',
        cust_Email='$email',
        addr1='$addr1',
        addr2='$addr2',
        state='$state',
        city = '$city',
        postcode='$postcode',
        cust_PhoneNo='$phoneno'
        WHERE cust_ID = '$username'";

        $updatecust = mysqli_query($dbconn, $sql0) or die("Error: " . mysqli_error($dbconn));

        if(!$updatecust)
    {
        echo $sql0;
    }

    $sql = "SELECT c.shipping_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$username'";
    $rs = mysqli_query($dbconn,$sql);
    $row_rs = mysqli_fetch_assoc($rs);
    $ship = $row_rs['shipping_ID'];
    $comment = $_POST['comment'];

     $sql1 = "INSERT INTO orders(cust_ID,order_Date,order_Status,shipping_ID,order_Comment, payment_Status) VALUES ('". $username."','".$date."',0,'".$ship."','".$comment."','Unpaid')";
    //echo $sql;
    mysqli_query($dbconn,$sql1);

    $sql2 = "SELECT cd.cart_ID, cd.Qty, cd.cart_ID, cd.item_ID FROM cartdetails cd JOIN cart c ON cd.cart_ID = c.cart_ID WHERE c.cust_ID = '$username'";
    $rs2 = mysqli_query($dbconn,$sql2);
    while($row_rs2 = mysqli_fetch_assoc($rs2)){

        $sql3 = "INSERT INTO orderdetails(order_ID,item_ID,Qty) VALUES ((SELECT o.order_ID FROM orders o JOIN customers cs ON o.cust_ID = cs.cust_ID WHERE o.cust_ID = '$username' ORDER BY order_ID DESC LIMIT 1),'".$row_rs2['item_ID']."','".$row_rs2['Qty']."')";
        $insert = mysqli_query($dbconn,$sql3);
    }
    if(!$insert)
    {
        echo $sql3;
    }

    $sql4 = "DELETE from cartdetails where cart_ID = '$cid'";
    $delcd = mysqli_query($dbconn,$sql4);

    if(!$delcd)
    {
        echo $sql4;
    }

        $sql5 = "SELECT * FROM customers WHERE cust_ID = '$username'";
        $selectcust = mysqli_query($dbconn, $sql5) or die("Error: " . mysqli_error($dbconn));
        $r5 = mysqli_fetch_assoc($selectcust);
        $_SESSION['username'] = $r5['cust_ID'];
        $_SESSION['password'] = $r5['cust_Password'];
        $_SESSION['name'] = $r5['cust_Name'];
        $_SESSION['email'] = $r5['cust_Email'];
        $_SESSION['addr1'] = $r5['addr1'];
        $_SESSION['addr2'] = $r5['addr2'];
        $_SESSION['state'] = $r5 ['state'];
        $_SESSION['postcode'] = $r5['postcode'];
        $_SESSION['phoneno'] = $r5['cust_PhoneNo'];

        header("location: complete.php?id=$username");
}
} else{
   if(isset($_POST['placeorder']))
{		
    $guest = $_SESSION['guest'];
    $date = date("Y-m-d");
    $cid = $_GET['cid'];
    $name = mysqli_real_escape_string ($dbconn,$_POST['name']);
    $email = mysqli_real_escape_string ($dbconn,$_POST['email']);
    $addr1 = mysqli_real_escape_string ($dbconn,$_POST['addr1']);
    $addr2 = mysqli_real_escape_string ($dbconn,$_POST['addr2']);
    $state = mysqli_real_escape_string ($dbconn,$_POST['state']);
    $postcode = mysqli_real_escape_string ($dbconn,$_POST['postcode']);
    $city = mysqli_real_escape_string ($dbconn,$_POST['city']);
    $phoneno = mysqli_real_escape_string ($dbconn,$_POST['phoneno']);
    $username = mysqli_real_escape_string ($dbconn,$_POST['username']);
    $password = mysqli_real_escape_string ($dbconn,$_POST['password']);

    if($username == "" && $password == ""){
        $sql = "UPDATE customers SET cust_Name='$name',
        cust_Email='$email',
        addr1='$addr1',
        addr2='$addr2',
        state='$state',
        city = '$city',
        postcode='$postcode',
        cust_PhoneNo='$phoneno'
        WHERE cust_ID = '$guest'";

        $updatecust = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

        if(!$updatecust)
    {
        echo $sql;
    }

    $sql2 = "SELECT c.shipping_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$guest'";
    $rs2 = mysqli_query($dbconn,$sql2);
    $row_rs2 = mysqli_fetch_assoc($rs2);
    $ship = $row_rs2['shipping_ID'];
    $comment = $_POST['comment'];

     $sql3 = "INSERT INTO orders(cust_ID,order_Date,order_Status,shipping_ID,order_Comment, payment_Status) VALUES ('". $guest."','".$date."','Processing','".$ship."','".$comment."','Unpaid')";
    //echo $sql;
    mysqli_query($dbconn,$sql3);

    $sql4 = "SELECT cd.cart_ID, cd.Qty, cd.cart_ID, cd.item_ID FROM cartdetails cd JOIN cart c ON cd.cart_ID = c.cart_ID WHERE c.cust_ID = '$guest'";
    $rs4 = mysqli_query($dbconn,$sql4);
    while($row_rs4 = mysqli_fetch_assoc($rs4)){

        
        $sql5 = "INSERT INTO orderdetails(order_ID,item_ID,Qty) VALUES ((SELECT o.order_ID FROM orders o JOIN customers cs ON o.cust_ID = cs.cust_ID WHERE o.cust_ID = '$guest' ORDER BY order_ID DESC LIMIT 1),'".$row_rs4['item_ID']."','".$row_rs4['Qty']."')";
        $insert = mysqli_query($dbconn,$sql5);
    }
    if(!$insert)
    {
        echo $sql5;
    }

    $sql6 = "DELETE from cartdetails where cart_ID = '$cid'";
    $del = mysqli_query($dbconn,$sql6);

    if(!$del)
    {
        echo $sql6;
    }

    header("location: complete.php?id=$guest");
    


    } else if($username != "" && $password != ""){

        $sql0 = "SELECT cust_ID
        FROM customers WHERE cust_ID = '$username'";
        
        $query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
        
        $row0 = mysqli_num_rows($query0);
        if($row0 != 0){
		echo "<script type='text/javascript'>alert('Username Existed!')</script>";
        echo "<script> history.go(-1); </script>";

	    }else{
        $sql = "INSERT INTO customers (cust_ID, cust_Name, cust_Email, addr1, addr2, city, state, postcode, cust_PhoneNo, cust_Password, acc_Status) VALUES ('".$username."','".$name."','".$email."','".$addr1."','".$addr2."', '".$city."', '".$state."', '".$postcode."', '".$phoneno."', '".md5($password)."','Active')";

        $insertcust = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn)); 
    

        if(!$insertcust)
    {
        echo $sql;
    }

    $sql2 = "SELECT c.shipping_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$guest'";
    $rs2 = mysqli_query($dbconn,$sql2);
    $row_rs2 = mysqli_fetch_assoc($rs2);
    $ship = $row_rs2['shipping_ID'];
    $comment = $_POST['comment'];

     $sql3 = "INSERT INTO orders(cust_ID,order_Date,order_Status,shipping_ID,order_Comment, payment_Status) VALUES ('". $username."','".$date."','Processing','".$ship."','".$comment."','Unpaid')";
    //echo $sql;
    mysqli_query($dbconn,$sql3);

    $sql10 = "INSERT INTO cart(cust_ID,shipping_ID) VALUES ('".$username."','".$ship."')";
    //echo $sql;
    mysqli_query($dbconn,$sql10);

    $sql4 = "SELECT cd.cart_ID, cd.Qty, cd.cart_ID, cd.item_ID FROM cartdetails cd JOIN cart c ON cd.cart_ID = c.cart_ID WHERE c.cust_ID = '$guest'";
    $rs4 = mysqli_query($dbconn,$sql4);
    while($row_rs4 = mysqli_fetch_assoc($rs4)){

        $sql5 = "INSERT INTO orderdetails(order_ID,item_ID,Qty) VALUES ((SELECT o.order_ID FROM orders o JOIN customers cs ON o.cust_ID = cs.cust_ID WHERE o.cust_ID = '$username' ORDER BY order_ID DESC LIMIT 1),'".$row_rs4['item_ID']."','".$row_rs4['Qty']."')";
        $insert = mysqli_query($dbconn,$sql5);
    }
    if(!$insert)
    {
        echo $sql5;
    }

    $sql11 ="UPDATE orders SET cust_ID = '$username' WHERE orders . cust_ID = '$guest'";
    $updateorder = mysqli_query($dbconn,$sql11);

    if(!$updateorder)
    {
        echo $sql11;
    }

    $sql6 = "DELETE from cartdetails where cart_ID = '$cid'";
    $delcd = mysqli_query($dbconn,$sql6);

    if(!$delcd)
    {
        echo $sql6;
    }

    $sql7 = "DELETE from cart where cust_ID = '$guest'";
    $delc = mysqli_query($dbconn,$sql7);

    if(!$delc)
    {
        echo $sql7;
    }

    $sql8 = "DELETE from customers where cust_ID = '$guest'";
    $delcs = mysqli_query($dbconn,$sql8);

    if(!$delcs)
    {
        echo $sql8;
    }

    unset($_SESSION['guest']);

    header("location: complete.php?id=$username");
}


    }else{
        $sql = "UPDATE customers SET cust_Name='$name',
        cust_Email='$email',
        addr1='$addr1',
        addr2='$addr2',
        state='$state',
        city = '$city',
        postcode='$postcode',
        cust_PhoneNo='$phoneno'
        WHERE cust_ID = '$guest'";

        $updatecust = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));

        if(!$updatecust)
    {
        echo $sql;
    }

    $sql2 = "SELECT c.shipping_ID FROM cart c JOIN customers cs ON c.cust_ID = cs.cust_ID WHERE c.cust_ID = '$guest'";
    $rs2 = mysqli_query($dbconn,$sql2);
    $row_rs2 = mysqli_fetch_assoc($rs2);
    $ship = $row_rs2['shipping_ID'];
    $comment = $_POST['comment'];

     $sql3 = "INSERT INTO orders(cust_ID,order_Date,order_Status,shipping_ID,order_Comment, payment_Status) VALUES ('". $guest."','".$date."','Processing','".$ship."','".$comment."','Unpaid')";
    //echo $sql;
    mysqli_query($dbconn,$sql3);

    $sql4 = "SELECT cd.cart_ID, cd.Qty, cd.cart_ID, cd.item_ID FROM cartdetails cd JOIN cart c ON cd.cart_ID = c.cart_ID WHERE c.cust_ID = '$guest'";
    $rs4 = mysqli_query($dbconn,$sql4);
    while($row_rs4 = mysqli_fetch_assoc($rs4)){

        $sql5 = "INSERT INTO orderdetails(order_ID,item_ID,Qty) VALUES ((SELECT o.order_ID FROM orders o JOIN customers cs ON o.cust_ID = cs.cust_ID WHERE o.cust_ID = '$guest' ORDER BY order_ID DESC LIMIT 1),'".$row_rs4['item_ID']."','".$row_rs4['Qty']."')";
        $insert = mysqli_query($dbconn,$sql5);
    }
    if(!$insert)
    {
        echo $sql5;
    }

    $sql6 = "DELETE from cartdetails where cart_ID = '$cid'";
    $del = mysqli_query($dbconn,$sql6);

    if(!$del)
    {
        echo $sql6;
    }

    header("location: complete.php?id=$guest");

    }

    

}
}

?>