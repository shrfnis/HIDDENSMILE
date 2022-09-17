<?php
session_start();
/* include db connection file */
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
    <title>Hidden Smile | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<style>

    td a{
        color: #FF0000;
        font-size: 13px;
    }

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
    }

    .font-12{
        font-size: 12px;
    }
</style>

<body>
    <!-- Search Wrapper Area Start -->
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
    <!-- Search Wrapper Area End -->

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
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Subtotal</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                $sql1 = "SELECT cd.cart_DetailsID, c.cart_ID, i.item_Img, i.item_Name, i.selling_Price, i.loop_Type, cd.qty, cd.qty * i.selling_Price AS 'Total' FROM cartdetails cd INNER JOIN items i ON i.item_ID = cd.item_ID INNER JOIN cart c ON c.cart_ID = cd.cart_ID WHERE cust_ID = '$username'"; 
                
                $rs1=mysqli_query($dbconn,$sql1);
                $row1=mysqli_num_rows($rs1);
                    
                if($row1 > 0)
                    {   
                        $counter = 1;
                        while($row_rs1 = mysqli_fetch_assoc($rs1))
                    {
                ?>
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/hs-img/<?php echo $row_rs1['item_Img'];?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $row_rs1['item_Name'];?> (<?php echo $row_rs1['loop_Type'];?>)</h5>
                                            <label class="price font-12">Price: RM<?php echo $row_rs1['selling_Price'];?></label>
                                            <br>
                                            <a href="cartremove0.php?cdid=<?php echo $row_rs1['cart_DetailsID']; ?>">Remove</a>
                                        </td>
                                        
                                        <td class="subtotal">
                                            <span>RM<?php echo $row_rs1['Total'];?></span>
                                        </td>

                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="<?php echo $row_rs1['qty'];?>">
                                                </div>
                                            </div>
                                            
                                        </td>
                                        
                                       
                                    </tr>
                                </tbody>
                                <?php
                    $counter++;
                    } //close while 
                    } //close if row
                ?>
                            </table>
                        </div>
                    </div>
                    <?php

                    $sql2 = "SELECT c.cust_ID, c.cart_ID, c.shipping_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$username' ";
                    $rs2 = mysqli_query($dbconn,$sql2);
                    $row_rs2 = mysqli_fetch_assoc($rs2);

                    ?>
                    <div class="col-12 col-lg-4">
                        <form action="updateship0.php?cid=<?php echo $row_rs2['cart_ID']; ?>" method="POST" id="checkoutForm" name="checkoutForm">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>Total:</span> <span>RM<?php echo $row_rs2['Total']; ?></span></li>
                                <li><span>Shipping to:</span></li>
                                <?php
                                if($row_rs2['shipping_ID']==1){
                                ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1" checked>
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2">
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                                <?php }
                                else if($row_rs2['shipping_ID']==2){ ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1">
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2" checked>
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                                <?php }
                                else { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1">
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2">
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                               <?php } ?>
                            </ul>
                            <div class="cart-btn mt-100">
                                <button type="submit" name="checkout" class="btn amado-btn w-100" onClick="return checkEmptyFields()" >Checkout</button>
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
                var ship = document.checkoutForm.ship.value;
                if(ship == "")
                {
                    alert("Please select where to ship !");
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
$guest = $_SESSION['guest']?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hidden Smile | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<style>

    td a{
        color: #FF0000;
        font-size: 13px;
    }

    .list{
        list-style: none;
    }

    .font-12{
        font-size: 12px;
    }

    .remove{
        color: #FF0000;
        font-size: 13px;
        padding: 0;
        border: none;
        background: none;
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
                <a href="../index.php?id=<?php echo $guest ?>"><img src="img/core-img/logo.png" alt=""></a>
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
                <a href="../index.php?id=<?php echo $guest ?>"><img src="img/hs-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="../index.php?id=<?php echo $guest ?>">Home</a></li>
                    <li><a href="facemask.php?id=<?php echo $guest ?>">Shop</a></li>
                </ul>
            </nav>
            <!-- Cart Menu -->
            <?php

            $sql = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$guest'";
            $rs = mysqli_query($dbconn, $sql);
            $row_rs=mysqli_fetch_assoc($rs);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="cart.php?id=<?php echo $guest ?>" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs['total_Item'] ?>)</span></a>
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

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
                       

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Subtotal</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                $sql1 = "SELECT cd.cart_DetailsID, c.cart_ID, i.item_Img, i.item_Name, i.selling_Price, i.loop_Type, cd.qty, cd.qty * i.selling_Price AS 'Total' FROM cartdetails cd INNER JOIN items i ON i.item_ID = cd.item_ID INNER JOIN cart c ON c.cart_ID = cd.cart_ID WHERE cust_ID = '$guest'"; 
                
                $rs1=mysqli_query($dbconn,$sql1);
                $row1=mysqli_num_rows($rs1);
                    
                if($row1 > 0)
                    {   
                        $counter = 1;
                        while($row_rs1 = mysqli_fetch_assoc($rs1))
                    {
                ?>
                                <tbody>
                                <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/hs-img/<?php echo $row_rs1['item_Img'];?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $row_rs1['item_Name'];?> (<?php echo $row_rs1['loop_Type'];?>)</h5>
                                            <label class="price font-12">Price: RM<?php echo $row_rs1['selling_Price'];?></label>
                                            <br>
                                            <a href="cartremove0.php?cdid=<?php echo $row_rs1['cart_DetailsID']; ?>">Remove</a>
                                        </td>
                                        
                                        <td class="subtotal">
                                            <span>RM<?php echo $row_rs1['Total'];?></span>
                                        </td>

                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="<?php echo $row_rs1['qty'];?>">
                                                </div>
                                            </div>
                                            
                                        </td>
                                        
                                       
                                    </tr>
                                </tbody>
                                <?php
                    $counter++;
                    } //close while 
                    } //close if row
                ?>
                            </table>
                        </div>
                        
                    </div>
                    <?php

                    $sql2 = "SELECT c.cust_ID, c.cart_ID, c.shipping_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$guest' ";
                    $rs2 = mysqli_query($dbconn,$sql2);
                    $row_rs2 = mysqli_fetch_assoc($rs2);

                    ?>
                    <div class="col-12 col-lg-4">
                        <form action="updateship0.php?cid=<?php echo $row_rs2['cart_ID']; ?>" method="POST" id="checkoutForm" name="checkoutForm">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>Total:</span> <span>RM<?php echo $row_rs2['Total']; ?></span></li>
                                <li><span>Shipping to:</span></li>
                                <?php
                                if($row_rs2['shipping_ID']==1){
                                ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1" checked>
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2">
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                                <?php }
                                else if($row_rs2['shipping_ID']==2){ ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1">
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2" checked>
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                                <?php }
                                else { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="west" name="ship" value="1">
                                    <label class="custom-control-label" for="west">West Malaysia</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="east" name="ship" value="2">
                                    <label class="custom-control-label" for="east">East Malaysia</label>
                                </div>
                               <?php } ?>
                            </ul>
                            <div class="cart-btn mt-100">
                                <button type="submit" name="checkout" class="btn amado-btn w-100" onClick="return checkEmptyFields()" >Checkout</button>
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
                var ship = document.checkoutForm.ship.value;
                if(ship == "")
                {
                    alert("Please select where to ship !");
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
?>