<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
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
    <title>Hidden Smile | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<style>

    .max-0{
        padding-bottom: 100px;
    }

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
    }

    .display-none{
        display: none;
    }
</style>

<body>
    <!-- Search Wrapper Area Start
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
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

            $sql1 = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$username'";
            $rs1 = mysqli_query($dbconn, $sql1);
            $row_rs1=mysqli_fetch_assoc($rs1);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs1['total_Item'] ?>)</span></a>
                <!-- <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
            </div>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="viewacc.php" class="btn amado-btn mb-15">My Account</a></li>
                <li><a href="logout0.php" class="btn amado-btn mb-15 red">Logout</a></li>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://www.pinterest.com/" target="blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <?php
                            $sql1 = "SELECT * FROM customers WHERE cust_ID = '$username'";
                            $rs1 = mysqli_query($dbconn,$sql1);
                            $row_rs1 = mysqli_fetch_assoc($rs1);

                            $sql2 = "SELECT c.cust_ID, c.cart_ID, c.shipping_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$username' ";
                            $rs2 = mysqli_query($dbconn,$sql2);
                            $row_rs2 = mysqli_fetch_assoc($rs2);
                            ?>

                            <form action="placeorder0.php?cid=<?php echo $row_rs2['cart_ID']; ?>" method="post" name="placeorderForm" id="placeorderForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_rs1['cust_Name']; ?>" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row_rs1['cust_Email']; ?>" placeholder="example@gmail.com" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="addr1" name="addr1" placeholder="Address Line 1" value="<?php echo $row_rs1['addr1']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="addr2" name="addr2" placeholder="Address Line 2" value="<?php echo $row_rs1['addr2']; ?>">
                                    </div>
                                    <?php
                                    $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$username'";
                                    $rs2 = mysqli_query($dbconn,$sql2);
                                    $row_rs2 = mysqli_fetch_assoc($rs2);

                                    if($row_rs2['shipping_ID'] == 1){
                                    ?>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="state"
                                        name="state" placeholder="State">
                                        <option value="Johor">Johor</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                    </select>
                                    </div>
                                    <?php $postage = $row_rs2['shipping_Subtotal']; }
                                    else{ ?>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="state" name="state" placeholder="State">
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                    </select>
                                    </div>
                                <?php $postage = $row_rs2['shipping_Subtotal']; }  ?>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row_rs1['city']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" value="<?php echo $row_rs1['postcode']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="013-234567890" value="<?php echo $row_rs1['cust_PhoneNo']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" name="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>
                                 </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                        <?php

                        $sql3 = "SELECT c.cust_ID, c.cart_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$username' ";
                        $rs3 = mysqli_query($dbconn,$sql3);
                        $row_rs3 = mysqli_fetch_assoc($rs3);

                    ?>
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>RM<?php echo $row_rs3['Total']; ?></span></li>
                                <li><span>delivery:</span>
                                    <span>RM <?php echo number_format($postage,2);?></span></li>
                                <li><span>total:</span> <span>RM <?php echo number_format($row_rs3['Total'] + $postage,2);?></span></li>
                            </ul>

                            <div class="payment-method custom-control custom-radio">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="cod"
                                    name="paymentmethod" onclick="cod()">
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="paypal"
                                    name="paymentmethod" onclick="paypal()">
                                    <label class="custom-control-label mb-2" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                <div id="list">
                                    <br>
                                    <a href="https://www.cimbclicks.com.my/" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/cimb.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.maybank2u.com.my/home/m2u/common/login.do" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/maybank.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.bankislam.biz/" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/bankislam.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.hlb.com.my/en/personal-banking/home.html" target="blank" ><img class="ml-15 mb-3" width="200px" src="img/core-img/hongleong.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.alliancebank.com.my/" target="blank" ><img class="ml-15" width="200px" src="img/core-img/alliance.png" alt=""></label></a>
                                </div>
                                    
                                </div>
                            </div>
                            

                            <div class="cart-btn mt-100">
                                <button type="submit" name="placeorder" class="btn amado-btn w-100" onClick="return checkEmptyFields()" >Placeorder</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start #####
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                Newsletter Text
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Register for a <span>Discount</span></h2>
                        <p>                                                                                         </p>
                    </div>
                </div>
                 Newsletter Form 
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     ##### Newsletter Area End ##### -->

            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script>
        function checkEmptyFields(){

                var name = document.placeorderForm.name.value;
                var email = document.placeorderForm.email.value;
                var addr1 = document.placeorderForm.addr1.value;
                var city = document.placeorderForm.city.value;
                var postcode = document.placeorderForm.postcode.value;
                var payment = document.placeorderForm.paymentmethod.value;
                if(name == ""){
                    alert("Please enter your name !");
                    return false;
                }
                else if(email == ""){
                    alert("Please enter your email !");
                    return false;
                }
                else if(addr1==""){
                    alert("Please enter your address !");
                    return false;
                }
                else if(city==""){
                    alert("Please enter your city !");
                    return false;
                }
                else if(postcode==""){
                    alert("Please enter your postcode !");
                }
                else if(payment == "")
                {
                    alert("Please select payment method !");
                    return false;
                }
                else
                    return true;
            }
    </script>

</body>

</html>
<?php 
}
else{ 
    $guest = $_SESSION['guest'];?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hidden Smile | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<style>

    .max-0{
        padding-bottom: 100px;
    }

    .list{
        list-style: none;
    }

    .display-none{
        display: none;
    }
</style>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
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

            $sql1 = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$guest'";
            $rs1 = mysqli_query($dbconn, $sql1);
            $row_rs1=mysqli_fetch_assoc($rs1);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs1['total_Item'] ?>)</span></a>
                <!--<a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
            </div>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="rlogin.php" class="btn amado-btn mb-15">Register/Login</a></li>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://www.pinterest.com/" target="blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area max-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <?php
                            $sql1 = "SELECT * FROM customers WHERE cust_ID = '$guest'";
                            $rs1 = mysqli_query($dbconn,$sql1);
                            $row_rs1 = mysqli_fetch_assoc($rs1);

                            $sql2 = "SELECT c.cust_ID, c.cart_ID, c.shipping_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$guest' ";
                            $rs2 = mysqli_query($dbconn,$sql2);
                            $row_rs2 = mysqli_fetch_assoc($rs2);
                            ?>


                           <form action="placeorder0.php?cid=<?php echo $row_rs2['cart_ID']; ?>"  method="post" name="placeorderForm" id="placeorderForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_rs1['cust_Name']; ?>" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row_rs1['cust_Email']; ?>" placeholder="example@gmail.com" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="addr1" name="addr1" placeholder="Address Line 1" value="<?php echo $row_rs1['addr1']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="addr2" name="addr2" placeholder="Address Line 2" value="<?php echo $row_rs1['addr2']; ?>">
                                    </div>
                                    <?php
                                    $sql2 = "SELECT c.shipping_ID, s.shipping_Subtotal FROM cart c INNER JOIN shipping s ON c.shipping_ID = s.shipping_ID WHERE c.cust_ID = '$guest'";
                                    $rs2 = mysqli_query($dbconn,$sql2);
                                    $row_rs2 = mysqli_fetch_assoc($rs2);

                                    if($row_rs2['shipping_ID'] == 1){
                                    ?>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="state"
                                        name="state" placeholder="state">
                                        <option value="Johor">Johor</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kkelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                    </select>
                                    </div>
                                    <?php $postage = $row_rs2['shipping_Subtotal']; }
                                    else{ ?>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="state" name="state" placeholder="state">
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                    </select>
                                    </div>
                                <?php $postage = $row_rs2['shipping_Subtotal']; }  ?>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row_rs1['city']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" value="<?php echo $row_rs1['postcode']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Phone No" value="<?php echo $row_rs1['cust_PhoneNo']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" name="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="myCheck" name="myCheck" onclick="myFunction()">
                                            <label class="custom-control-label" for="myCheck">Create an account</label> 
                                            <div id="text" class="display-none">
                                                <p>Please enter a username</p>
                                                <input type="text" class="form-control mb-3 " id="username" 
                                                name="username" placeholder="Username" value="">
                                                <p>Please enter a password</p>
                                                <input type="password" class="form-control mb-3 " id="password" name="password" placeholder="Password" value="">
                                            </div>
                                            <script>
                                                function myFunction() {
                                                var checkBox = document.getElementById("myCheck");
                                                var text = document.getElementById("text");
                                                    if (checkBox.checked == true){
                                                        text.style.display = "block";} 
                                                    else {
                                                        text.style.display = "none";}}
                                            </script>
                                        </div>
                                    </div>
                                 </div>
                        </div>
                    </div>
                       <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                        <?php

                         $sql3 = "SELECT c.cust_ID, c.cart_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$guest' ";
                         $rs3 = mysqli_query($dbconn,$sql3);
                         $row_rs3 = mysqli_fetch_assoc($rs3);

                        ?>
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>RM<?php echo $row_rs3['Total']; ?></span></li>
                                <li><span>delivery:</span>
                                    <span>RM <?php echo number_format($postage,2);?></span></li>
                                <li><span>total:</span> <span>RM <?php echo number_format($row_rs3['Total'] + $postage,2);?></span></li>
                            </ul>

                            <div class="payment-method custom-control custom-radio">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="cod"
                                    name="paymentmethod" onclick="cod()">
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="paypal"
                                    name="paymentmethod" onclick="paypal()">
                                    <label class="custom-control-label mb-2" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                <div id="list">
                                    <br>
                                    <a href="https://www.cimbclicks.com.my/" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/cimb.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.maybank2u.com.my/home/m2u/common/login.do" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/maybank.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.bankislam.biz/" target="blank"><img class="ml-15 mb-3" width="200px" src="img/core-img/bankislam.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.hlb.com.my/en/personal-banking/home.html" target="blank" ><img class="ml-15 mb-3" width="200px" src="img/core-img/hongleong.png" alt=""></label></a>
                                    <br>
                                    <a href="https://www.alliancebank.com.my/" target="blank" ><img class="ml-15" width="200px" src="img/core-img/alliance.png" alt=""></label></a>
                                </div>
                                    
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <button type="submit" name="placeorder" class="btn amado-btn w-100" onClick="return checkEmptyFields()" >Placeorder</button>
                            </div>
                        
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### 
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                 Newsletter Text 
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Register for a <span>Discount</span></h2>
                        <p>                                                                                         </p>
                    </div>
                </div>
                 Newsletter Form 
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     ##### Newsletter Area End ##### -->

            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script>
        function checkEmptyFields(){

        var name = document.placeorderForm.name.value;
        var email = document.placeorderForm.email.value;
        var addr1 = document.placeorderForm.addr1.value;
        var city = document.placeorderForm.city.value;
        var phoneno = document.placeorderForm.phoneno.value;
        var postcode = document.placeorderForm.postcode.value;
        var payment = document.placeorderForm.paymentmethod.value;
        var register = document.placeorderForm.myCheck.checked;
        var username = document.placeorderForm.username.value;
        var password = document.placeorderForm.password.value;
        var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

        if(register != true){
        if(name == ""){
            alert("Please enter your name !");
            return false;
        }
        else if(email == ""){
            alert("Please enter your email !");
            return false;
        }
        else if(email.indexOf("@") == -1)
        {
            alert("Please enter your email!");
            return false;
        }
        else if(addr1==""){
            alert("Please enter your address !");
            return false;
        }
        else if(city==""){
            alert("Please enter your city !");
            return false;
        }
        else if(postcode==""){
            alert("Please enter your postcode !");
            return false;
        }
        else if(phoneno == "")
        {
            alert("Please enter your phone number!");
            return false;
        }
        else if(phoneno.indexOf("-") == -1)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length < 8)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length > 15)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(payment == "")
        {
            alert("Please select payment method !");
            return false;
        }
        else
            return true;
        }else{
            if(name == ""){
            alert("Please enter your name !");
            return false;
        }
        else if(email == ""){
            alert("Please enter your email !");
            return false;
        }
        else if(email.indexOf("@") == -1)
        {
            alert("Please enter your email!");
            return false;
        }
        else if(addr1==""){
            alert("Please enter your address !");
            return false;
        }
        else if(city==""){
            alert("Please enter your city !");
            return false;
        }
        else if(postcode==""){
            alert("Please enter your postcode !");
            return false;
        }
        else if(phoneno == "")
        {
            alert("Please enter your phone number!");
            return false;
        }
        else if(phoneno.indexOf("-") == -1)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length < 8)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length > 15)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(username == "")
        {
            alert("Please enter username!");
            return false;
        }
                
        else if(username.length < 5)
        {
            alert("Your username is too short!");
            return false;
        }
        else if(password == "")
        {
            alert("Please enter your password!");
            return false;
        }
        else if(!password.match(decimal))
        {
            alert("Password must have 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");
            return false;
        }
        else if(payment == "")
        {
            alert("Please select payment method !");
            return false;
        }
        else
            return true;
        }
    }
    </script>

</body>

</html>
<?php
}
?>