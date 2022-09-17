<?php
session_start();
/* include db connection file */
include("Hidden Smile Admin\php\dbconn.php");
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
    <title>Hidden Smile | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="Hidden Smile User/img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="Hidden Smile User/css/core-style.css">
    <link rel="stylesheet" href="Hidden Smile User/style.css">

</head>

<style>

    .list{
        list-style: none;
    }

    .red{
        background-color: #FF0000;
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
                            <button type="submit"><img src="Hidden Smile User/img/core-img/search.png" alt=""></button>
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
                <a href="index.php"><img src="Hidden Smile User/img/core-img/logo.png" alt=""></a>
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
                <a href="index.php"><img src="Hidden Smile User/img/hs-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="Hidden Smile User/facemask.php">Shop</a></li>
                </ul>
            </nav>
            <!-- Cart Menu -->
            <?php

            $sql = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$username'";
            $rs = mysqli_query($dbconn, $sql);
            $row_rs=mysqli_fetch_assoc($rs);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="Hidden Smile User/cart.php" class="cart-nav"><img src="Hidden Smile User/img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs['total_Item'] ?>)</span></a>
                <!-- <a href="#" class="search-nav"><img src="Hidden Smile User/img/core-img/search.png" alt=""> Search</a> -->
            </div>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100  list">
                <li><a href="Hidden Smile User/viewacc.php" class="btn amado-btn mb-15">My Account</a></li>
                <li><a href="Hidden Smile User/logout0.php" class="btn amado-btn mb-15 red">Logout</a></li>
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

        

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                        <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/Model 1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/Model 2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/Model 3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/Model 4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile User/facemask.php">
                        <img src="Hidden Smile User/img/hs-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Product Catagories Area End -->
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

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="Hidden Smile User/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="Hidden Smile User/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="Hidden Smile User/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="Hidden Smile User/js/plugins.js"></script>
    <!-- Active js -->
    <script src="Hidden Smile User/js/active.js"></script>

</body>

</html>
<?php 
}
else {
    if(isset($_SESSION['guest'])){
        $guest = $_SESSION['guest'];
        $sql = "SELECT * FROM cart  WHERE cust_ID = '$guest' ";
	    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);
        $r = mysqli_fetch_assoc($query);
        if($row != 0){
        $_SESSION['addcart'] = 1;
        }else{
        $_SESSION['addcart'] = 0;
        }

    }else{
    $_SESSION['guest'] = uniqid('guest');
    $guest = $_SESSION['guest'];
    $sql1 = "SELECT cust_ID
	FROM customers WHERE cust_ID = '$guest'";
	$query1 = mysqli_query($dbconn, $sql1) or die ("Error: " . mysqli_error($dbconn));
	$row1 = mysqli_num_rows($query1);

    if($row1 != 0){
        $_SESSION['addcart'] = 1;
    }
	else{
        $sql2 = "INSERT INTO customers (cust_ID, acc_Status)
		VALUES ('".$guest."', 'Active')";
        $_SESSION['addcart'] = 0;
		mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	}
        $_SESSION['guest'] = $guest;
}
       
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
    <title>Hidden | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="Hidden Smile User/img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="Hidden Smile User/css/core-style.css">
    <link rel="stylesheet" href="Hidden Smile User/style.css">

</head>

<style>
    .list{
        list-style: none;
    }
</style>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php?id=<?php echo $guest ?>"><img src="Hidden Smile User/img/core-img/logo.png" alt=""></a>
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
                <a href="index.php?id=<?php echo $guest ?>"><img src="Hidden Smile User/img/hs-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php?id=<?php echo $guest ?>">Home</a></li>
                    <li><a href="Hidden Smile User/facemask.php?id=<?php echo $guest ?>">Shop</a></li>
                </ul>
            </nav>
            <!-- Cart Menu -->
            <?php

            $sql3 = "SELECT count(cd.cart_ID) as total_Item,  c.cust_ID from cartdetails cd join cart c on cd.cart_ID = c.cart_ID where c.cust_ID = '$guest'";
            $rs3 = mysqli_query($dbconn, $sql3);
            $row_rs3=mysqli_fetch_assoc($rs3);

            ?>
            <div class="cart-fav-search mb-100">
                <a href="Hidden Smile User/cart.php" class="cart-nav"><img src="Hidden Smile User/img/core-img/cart.png" alt=""> Cart <span>(<?php echo $row_rs3['total_Item'] ?>)</span></a>
                <!-- <a href="#" class="search-nav"><img src="Hidden Smile User/img/core-img/search.png" alt=""> Search</a> -->
            </div>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100 list">
                <li><a href="Hidden Smile User/rlogin.php?id=<?php $cid ?>" class="btn amado-btn mb-15">Register/Login</a></li>
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

        

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                        <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/Model 1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/Model 2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/Model 3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/Model 4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Hidden Smile USer/facemask.php?id=<?php echo $guest ?>">
                        <img src="Hidden Smile User/img/hs-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Product Catagories Area End -->
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

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="Hidden Smile User/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="Hidden Smile User/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="Hidden Smile User/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="Hidden Smile User/js/plugins.js"></script>
    <!-- Active js -->
    <script src="Hidden Smile User/js/active.js"></script>

</body>

</html>
<?php
}
?>