<?php
session_start();
/* include db connection file */
include("..\Hidden Smile Admin\php\dbconn.php");
    
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$oid = $_GET['oid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <!-- Title  -->
    <title>Hidden Smile | Login / Register</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<style>
    .max-0{
        padding-bottom: 180px;
    }

    .max-1{
        bottom: -480px !important;
    }

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
    }

    .w-70{
        width : 70% !important;
        left: 15% !important;
    }

    #areaID {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			#areaID h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			#areaID h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			.invoice-box {
				max-width: 600px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                width: 100%;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 1000px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

</style>
<body>
<div class="main-content-wrapper d-flex clearfix">

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="../index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="../index.php"><img src="img/hs-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="facemask.php">Shop</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <?php

    $sql = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$username'";
    $rs = mysqli_query($dbconn, $sql);
    $row_rs=mysqli_fetch_assoc($rs);

    ?>
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs['total_Item'] ?>)</span></a>
        <!-- <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
    </div>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="viewacc.php" class="btn amado-btn mb-15">My Account</a></li>
                <li><a href="logout0.php" class="btn amado-btn mb-15 red">Logout</a></li>
            </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
    
    <!------ table ------->

		<div id="areaID" class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="img/core-img/logo.ico" alt="Company logo" style="width: 100%; max-width: 150px" />
								</td>
                                <?php
                                    $date = date("Y-m-d");
                                ?>
								<td>
									Customer Invoice<br />
									Created : <?php echo $date;?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <br>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Hidden Smile<br />
									10-A-3 Jalan Amaniah Mulia 3, <br />
                                    Taman Amaniah Mulia, <br>
									68100 Batu Caves, Selangor.
								</td>
                                <?php
                                    $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'"; 
    

                                    $qry=mysqli_query($dbconn,$sql);
                                    $row=mysqli_num_rows($qry);
                    
                                    if($row > 0)
                    {   
                        $counter = 1;
                        $d = mysqli_fetch_assoc($qry)
                    
                ?>
            
                            <td>
                                    <br>
									<?php echo $d['cust_Name'];?><br />
									<?php echo $d['cust_PhoneNo'];?><br />
									<?php echo $d['cust_Email'];?>
				            </td>
            <?php 
                } //close if row
            ?>
								
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>
                <?php
                $postage = 10;
                $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name,i.loop_Type, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'";
    

                $qry=mysqli_query($dbconn,$sql);
                $row=mysqli_num_rows($qry);
                    
                if($row > 0)
                    {   
                        $counter = 1;
                        while($d = mysqli_fetch_assoc($qry))
                    {
                ?>
                <tr>
                    <td><?php echo $d['item_Name'];?> (<?php echo $d['loop_Type'];?>)</td>
                    <td>RM <?php echo $d['Total'];?></td>
                </tr>
                <?php
                $counter++;
                } //close while 
                } //close if row
            ?>
            <?php
            $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$username'";
            $rs2 = mysqli_query($dbconn,$sql2);
            $row_rs2 = mysqli_fetch_assoc($rs2);

            if($row_rs2['shipping_ID'] == 1){
            $postage = $row_rs2['shipping_Subtotal'];
            }
            else{
                $postage = $row_rs2['shipping_Subtotal'];
            }

            ?>
                <tr>
                    <td>Postage </td>
                    <td>RM <?php echo number_format($postage,2);?></td>
                </tr>
				<tr class="total">
					<td></td>
                    <?php
                    $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$username'";
                    $rs2 = mysqli_query($dbconn,$sql2);
                    $row_rs2 = mysqli_fetch_assoc($rs2);

                    if($row_rs2['shipping_ID'] == 1){
                    $postage = $row_rs2['shipping_Subtotal'];
                    }
                    else{
                        $postage = $row_rs2['shipping_Subtotal'];
                    }
                    $sql = "SELECT i.item_Name, i.selling_Price, od.Qty,SUM(od.Qty) AS 'quantityTotal', SUM(od.Qty* i.selling_Price) AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID WHERE order_ID = '$oid'"; 
         
                    $qry=mysqli_query($dbconn,$sql);
                    $row=mysqli_num_rows($qry);
                    
                    if($row > 0)
                        {   
                            $counter = 1;
                            while($d = mysqli_fetch_assoc($qry))
                        {
                ?>
                <td>Total: RM <?php echo number_format($d['Total']+ $postage,2);?><br><br><button onclick="window.print()">Print this page</button></td>
                <?php
                    $counter++;
                        } 
                        } 
                ?>
					
				</tr>
                
			</table>
		</div>
</body>
</html>
<?php 
} else if(isset($_SESSION['guest'])){
    $guest = $_SESSION['guest'];
    $oid = $_GET['oid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <!-- Title  -->
    <title>Hidden Smile | Login / Register</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<style>
    .max-0{
        padding-bottom: 180px;
    }

    .max-1{
        bottom: -480px !important;
    }

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
    }

    .w-70{
        width : 70% !important;
        left: 15% !important;
    }

    #areaID {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			#areaID h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			#areaID h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			.invoice-box {
				max-width: 600px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                width: 100%;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 1000px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

</style>
<body>
<div class="main-content-wrapper d-flex clearfix">

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="../index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="../index.php"><img src="img/hs-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="facemask.php">Shop</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <?php

    $sql = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$guest'";
    $rs = mysqli_query($dbconn, $sql);
    $row_rs=mysqli_fetch_assoc($rs);

    ?>
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs['total_Item'] ?>)</span></a>
        <!-- <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
    </div>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="rlogin.php" class="btn amado-btn mb-15">Register/Login</a></li>
            </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
    
    <!------ table ------->

		<div id="areaID" class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="img/core-img/logo.ico" alt="Company logo" style="width: 100%; max-width: 150px" />
								</td>
                                <?php
                                    $date = date("Y-m-d");
                                ?>
								<td>
									Customer Invoice<br />
									Created : <?php echo $date;?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <br>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Hidden Smile<br />
									10-A-3 Jalan Amaniah Mulia 3, <br />
                                    Taman Amaniah Mulia, <br>
									68100 Batu Caves, Selangor.
								</td>
                                <?php
                                    $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'"; 
    

                                    $qry=mysqli_query($dbconn,$sql);
                                    $row=mysqli_num_rows($qry);
                    
                                    if($row > 0)
                    {   
                        $counter = 1;
                        $d = mysqli_fetch_assoc($qry)
                    
                ?>
            
                            <td>
                                    <br>
									<?php echo $d['cust_Name'];?><br />
									<?php echo $d['cust_PhoneNo'];?><br />
									<?php echo $d['cust_Email'];?>
				            </td>
            <?php 
                } //close if row
            ?>
								
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>
                <?php
                $postage = 10;
                $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'";
    

                $qry=mysqli_query($dbconn,$sql);
                $row=mysqli_num_rows($qry);
                    
                if($row > 0)
                    {   
                        $counter = 1;
                        while($d = mysqli_fetch_assoc($qry))
                    {
                ?>
                <tr>
                    <td><?php echo $d['item_Name'];?></td>
                    <td>RM <?php echo $d['Total'];?></td>
                </tr>
                <?php
                $counter++;
                } //close while 
                } //close if row
            ?>
            <?php
            $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$guest'";
            $rs2 = mysqli_query($dbconn,$sql2);
            $row_rs2 = mysqli_fetch_assoc($rs2);

            if($row_rs2['shipping_ID'] == 1){
            $postage = $row_rs2['shipping_Subtotal'];
            }
            else{
                $postage = $row_rs2['shipping_Subtotal'];
            }

            ?>
                <tr>
                    <td>Postage </td>
                    <td>RM <?php echo number_format($postage,2);?></td>
                </tr>
				<tr class="total">
					<td></td>
                    <?php
                    $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$guest'";
                    $rs2 = mysqli_query($dbconn,$sql2);
                    $row_rs2 = mysqli_fetch_assoc($rs2);

                    if($row_rs2['shipping_ID'] == 1){
                    $postage = $row_rs2['shipping_Subtotal'];
                    }
                    else{
                        $postage = $row_rs2['shipping_Subtotal'];
                    }
                    $sql = "SELECT i.item_Name, i.selling_Price, od.Qty,SUM(od.Qty) AS 'quantityTotal', SUM(od.Qty* i.selling_Price) AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID WHERE order_ID = '$oid'"; 
         
                    $qry=mysqli_query($dbconn,$sql);
                    $row=mysqli_num_rows($qry);
                    
                    if($row > 0)
                        {   
                            $counter = 1;
                            while($d = mysqli_fetch_assoc($qry))
                        {
                ?>
                <td>Total: RM <?php echo number_format($d['Total']+ $postage,2);?><br><br><button onclick="window.print()">Print this page</button></td>
                <?php
                    $counter++;
                        } 
                        } 
                ?>
					
				</tr>
                
			</table>
		</div>
</body>
</html>
<?php
}else{
    $username = $_GET['id'];
    $oid = $_GET['oid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <!-- Title  -->
    <title>Hidden Smile | Login / Register</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<style>
    .max-0{
        padding-bottom: 180px;
    }

    .max-1{
        bottom: -480px !important;
    }

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
    }

    .w-70{
        width : 70% !important;
        left: 15% !important;
    }

    #areaID {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			#areaID h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			#areaID h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			.invoice-box {
				max-width: 600px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                width: 100%;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 1000px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

</style>
<body>
<div class="main-content-wrapper d-flex clearfix">

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="../index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="../index.php"><img src="img/hs-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="facemask.php">Shop</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <?php

    $sql = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$username'";
    $rs = mysqli_query($dbconn, $sql);
    $row_rs=mysqli_fetch_assoc($rs);

    ?>
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs['total_Item'] ?>)</span></a>
        <!-- <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
    </div>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="rlogin.php" class="btn amado-btn mb-15">Register/Login</a></li>
            </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
    
    <!------ table ------->

		<div id="areaID" class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="img/core-img/logo.ico" alt="Company logo" style="width: 100%; max-width: 150px" />
								</td>
                                <?php
                                    $date = date("Y-m-d");
                                ?>
								<td>
									Customer Invoice<br />
									Created : <?php echo $date;?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <br>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Hidden Smile<br />
									10-A-3 Jalan Amaniah Mulia 3, <br />
                                    Taman Amaniah Mulia, <br>
									68100 Batu Caves, Selangor.
								</td>
                                <?php
                                    $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'"; 
    

                                    $qry=mysqli_query($dbconn,$sql);
                                    $row=mysqli_num_rows($qry);
                    
                                    if($row > 0)
                    {   
                        $counter = 1;
                        $d = mysqli_fetch_assoc($qry)
                    
                ?>
            
                            <td>
                                    <br>
									<?php echo $d['cust_Name'];?><br />
									<?php echo $d['cust_PhoneNo'];?><br />
									<?php echo $d['cust_Email'];?>
				            </td>
            <?php 
                } //close if row
            ?>
								
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>
                <?php
                $postage = 10;
                $sql = "SELECT c.cust_ID, c.cust_Name, c.cust_Email, c.cust_PhoneNo, od.order_DetailsID, i.item_Name, o.order_ID, i.selling_Price, od.Qty, od.Qty * i.selling_Price AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID JOIN orders o ON o.order_ID = od.order_ID JOIN customers c ON c.cust_ID = o.cust_ID WHERE o.order_ID = '$oid'";
    

                $qry=mysqli_query($dbconn,$sql);
                $row=mysqli_num_rows($qry);
                    
                if($row > 0)
                    {   
                        $counter = 1;
                        while($d = mysqli_fetch_assoc($qry))
                    {
                ?>
                <tr>
                    <td><?php echo $d['item_Name'];?></td>
                    <td>RM <?php echo $d['Total'];?></td>
                </tr>
                <?php
                $counter++;
                } //close while 
                } //close if row
            ?>
            <?php
            $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$username'";
            $rs2 = mysqli_query($dbconn,$sql2);
            $row_rs2 = mysqli_fetch_assoc($rs2);

            if($row_rs2['shipping_ID'] == 1){
            $postage = $row_rs2['shipping_Subtotal'];
            }
            else{
                $postage = $row_rs2['shipping_Subtotal'];
            }

            ?>
                <tr>
                    <td>Postage </td>
                    <td>RM <?php echo number_format($postage,2);?></td>
                </tr>
				<tr class="total">
					<td></td>
                    <?php
                    $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$username'";
                    $rs2 = mysqli_query($dbconn,$sql2);
                    $row_rs2 = mysqli_fetch_assoc($rs2);

                    if($row_rs2['shipping_ID'] == 1){
                    $postage = $row_rs2['shipping_Subtotal'];
                    }
                    else{
                        $postage = $row_rs2['shipping_Subtotal'];
                    }
                    $sql = "SELECT i.item_Name, i.selling_Price, od.Qty,SUM(od.Qty) AS 'quantityTotal', SUM(od.Qty* i.selling_Price) AS 'Total' FROM orderdetails od JOIN items i ON i.item_ID = od.item_ID WHERE order_ID = '$oid'"; 
         
                    $qry=mysqli_query($dbconn,$sql);
                    $row=mysqli_num_rows($qry);
                    
                    if($row > 0)
                        {   
                            $counter = 1;
                            while($d = mysqli_fetch_assoc($qry))
                        {
                ?>
                <td>Total: RM <?php echo number_format($d['Total']+ $postage,2);?><br><br><button onclick="window.print()">Print this page</button></td>
                <?php
                    $counter++;
                        } 
                        } 
                ?>
					
				</tr>
                
			</table>
		</div>
</body>
</html>
<?php
}
?>