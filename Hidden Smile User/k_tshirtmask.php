<?php
session_start();
/* include db connection file */
include("..\Hidden Smile Admin\php\dbconn.php");

$sql="SELECT * FROM items WHERE item_Type = 'T-shirt Face Mask' AND loop_Type = 'Earloop' AND categories = 'Kids'";
$rs = mysqli_query($dbconn, $sql);

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
    <title>Hidden Smile | Kids T-shirt Face Mask</title>

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

    .max-1{
        bottom: -315px !important;
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

        <!-- Product Details Area Start -->
        <div class="single-product-area max-0 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="kids.php">Shop</a></li>
                                <li class="breadcrumb-item"><a href="#">Kids T-shirt Face Mask</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <?php
                                    $sql2="SELECT * FROM items WHERE item_Type = 'T-shirt Face Mask' AND loop_Type = 'Earloop' AND categories = 'Kids'";
                                    $rs2 = mysqli_query($dbconn, $sql2);
                                    $active= 'active';
                                    $dslide = 0;
                                    $dcounter = 1;
                                    while($row_rs2 = mysqli_fetch_assoc($rs2))
                                    {?>
                                    <li class="<?php echo $active ?>" data-target="#product_details_slider" data-slide-to="<?php echo $dslide ?>" style="background-image: url(img/hs-img/<?php echo $row_rs2['item_Img']; ?>);">
                                    </li>
                                    <?php
                                    $active = '';
                                    $dslide ++;
                                    }
                                    ?>
                                </ol>
                                <div class="carousel-inner w-70">
                                <?php
                                    $sql3="SELECT * FROM items WHERE item_Type = 'T-shirt Face Mask' AND loop_Type = 'Earloop' AND categories = 'Kids'";
                                    $rs3 = mysqli_query($dbconn, $sql3);
                                    $active= 'active';
                                    $dslide = 1;
                                    while($row_rs3 = mysqli_fetch_assoc($rs3))
                                    {?>
                                    <div class="carousel-item <?php echo $active ?>">
                                        <a class="gallery_img" href="img/hs-img/<?php echo $row_rs3['item_Img']; ?>">
                                            <img class="d-block w-100" src="img/hs-img/<?php echo $row_rs3['item_Img']; ?>" alt="<?php echo $dslide ?>">
                                        </a>
                                    </div>
                                    <?php
                                    $active = '';
                                    $dslide ++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">FROM RM10</p>
                                <a href="product-details.php">
                                    <h6>Kids T-shirt Face Mask</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>Introducing our latest version of cloth mask series, Hidden Smile Classic Mask. Face mask has become the most essential accessory lately. You just don’t leave home without it. Hidden Smile’s latest product is to suit your need in the most fashionable way when you’re out and about!</p>
                            </div>

                            <p class="text-dark font-weight-medium mb-0 mr-3">Design:</p>
                            <form id="cartForm"  name="cartForm" method="POST" action="addcart0.php">
                                <div class="custom-control custom-radio" >
                            
                            <?php
                            
                            $dcounter= 1;
                            while($row_rs = mysqli_fetch_assoc($rs))
                            {
                            ?>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" class="custom-control-input" id="design<?php echo $dcounter ?>" name="itemname" value="<?php echo $row_rs['item_Name']; ?>" >
                                    <label class="custom-control-label" for="design<?php echo $dcounter ?>"><?php echo $row_rs['item_Name']; ?></label>
                                </div>
                            <?php $dcounter++; } ?>
                                </div>
                        </div>
                        
                        <p></p>

                        <div class="mb-4">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Looptype:</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="type-1" name="looptype" value="Earloop">
                                    <label class="custom-control-label" for="type-1">Earloop RM(10)</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="type-2" name="looptype" value="Headloop">
                                    <label class="custom-control-label" for="type-2">Headloop RM(14)</label>
                                </div>
                            </div>
                        </div>

                            <!-- Add to Cart Form -->
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty : </p>
                                    <div class="quantity">
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" name="addtocart" value="5" onClick="return checkEmptyFields()"><a class="btn amado-btn">Add to cart</a></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
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
                var itemname = document.cartForm.itemname.value;
                var looptype = document.cartForm.looptype.value;
                if(itemname == "" || looptype == "")
                {
                    alert("Please select desired variation !");
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
    $guest = $_SESSION['guest']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hidden Smile | Kids Cloth T-shirt Face Mask</title>

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

    .max-1{
        bottom: -315px !important;
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

            $sql2 = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$guest'";
            $rs2 = mysqli_query($dbconn, $sql2);
            $row_rs2=mysqli_fetch_assoc($rs2);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs2['total_Item'] ?>)</span></a>
                <!-- <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a> -->
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

        <!-- Product Details Area Start -->
        <div class="single-product-area max-0 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="kids.php">Shop</a></li>
                                <li class="breadcrumb-item"><a href="#">Kids T-shirt Face Mask</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                    $sql2="SELECT * FROM items WHERE item_Type = 'T-shirt Face Mask' AND loop_Type = 'Earloop' AND categories = 'Kids'";
                                    $rs2 = mysqli_query($dbconn, $sql2);
                                    $active= 'active';
                                    $dslide = 0;
                                    $dcounter = 1;
                                    while($row_rs2 = mysqli_fetch_assoc($rs2))
                                    {?>
                                    <li class="<?php echo $active ?>" data-target="#product_details_slider" data-slide-to="<?php echo $dslide ?>" style="background-image: url(img/hs-img/<?php echo $row_rs2['item_Img']; ?>);">
                                    </li>
                                    <?php
                                    $active = '';
                                    $dslide ++;
                                    }
                                    ?>
                                </ol>
                                <div class="carousel-inner w-70">
                                <?php
                                    $sql3="SELECT * FROM items WHERE item_Type = 'T-shirt Face Mask' AND loop_Type = 'Earloop' AND categories = 'Kids'";
                                    $rs3 = mysqli_query($dbconn, $sql3);
                                    $active= 'active';
                                    $dslide = 1;
                                    while($row_rs3 = mysqli_fetch_assoc($rs3))
                                    {?>
                                    <div class="carousel-item <?php echo $active ?>">
                                        <a class="gallery_img" href="img/hs-img/<?php echo $row_rs3['item_Img']; ?>">
                                            <img class="d-block w-100" src="img/hs-img/<?php echo $row_rs3['item_Img']; ?>" alt="<?php echo $dslide ?>">
                                        </a>
                                    </div>
                                    <?php
                                    $active = '';
                                    $dslide ++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">FROM RM10</p>
                                <a href="product-details.php">
                                    <h6>Kids T-shirt Face Mask</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>Introducing our latest version of cloth mask series, Hidden Smile Classic Mask. Face mask has become the most essential accessory lately. You just don’t leave home without it. Hidden Smile’s latest product is to suit your need in the most fashionable way when you’re out and about!</p>
                            </div>

                            <p class="text-dark font-weight-medium mb-0 mr-3">Design:</p>
                            <form id="cartForm"  name="cartForm" method="POST" action="addcart0.php">
                                <div class="custom-control custom-radio" >
                            
                            <?php
                            
                            $dcounter= 1;
                            while($row_rs = mysqli_fetch_assoc($rs))
                            {
                            ?>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" class="custom-control-input" id="design<?php echo $dcounter ?>" name="itemname" value="<?php echo $row_rs['item_Name']; ?>" >
                                    <label class="custom-control-label" for="design<?php echo $dcounter ?>"><?php echo $row_rs['item_Name']; ?></label>
                                </div>
                            <?php $dcounter++; } ?>
                                </div>
                        </div>
                        
                        <p></p>

                        <div class="mb-4">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Looptype:</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="type-1" name="looptype" value="Earloop">
                                    <label class="custom-control-label" for="type-1">Earloop RM(10)</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="type-2" name="looptype" value="Headloop">
                                    <label class="custom-control-label" for="type-2">Headloop RM(14)</label>
                                </div>
                            </div>
                        </div>

                            <!-- Add to Cart Form -->
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty : </p>
                                    <div class="quantity">
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" name="addtocart" value="5" onClick="return checkEmptyFields()"><a class="btn amado-btn">Add to cart</a></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
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
                var itemname = document.cartForm.itemname.value;
                var looptype = document.cartForm.looptype.value;
                if(itemname == "" || looptype == "")
                {
                    alert("Please select desired variation !");
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