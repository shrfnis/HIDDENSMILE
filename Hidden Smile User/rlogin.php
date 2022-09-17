<?php
session_start();
/* include db connection file */
include("..\Hidden Smile Admin\php\dbconn.php");
    

if(isset($_SESSION['guest'])){
    $guest = $_SESSION['guest'];
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

</head>
<style>
    .gap-1{
        gap: 3rem !important;
    }

    .justify-content-evenly {
        justify-content: space-evenly !important;
        margin: 100px 0px;
    }

    .input-field{
        margin: 20px 0px;
        max-width: 500px;
    }

    .input-group{
        margin: 10px 0px;
    }

    .align-items-center {
        align-items: center !important;
    }

    .list{
        list-style: none;
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
                <li><a href="rlogin.php" class="btn amado-btn mb-15">Register/Login</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="container">
            <h1>Login / Register</h1>

            <div id="modal" class="popupContainer" >
                <section class="popupBody d-flex justify-content-evenly">
                    <!-- Username & Password Login form -->
                    <div class="user_login">
                    <header class="popupHeader">
                    <span class="header_title">Login</span>
                    </header>
                        <form id="login" name="login"  method="post" action="login0.php">
                            <div class="input-field">
                            <label class="input-group">Email / Username</label>
                            <input type="text" placeholder=" Enter Username" id="username" name="username" required/>
                            <br />

                            <label class="input-group">Password</label>
                            <input type="password" placeholder=" Enter Password" id="password" name="password" required/>
                            <br />  

                            <div class="action_btns input-field">
                                <div class="one_half last"><button type="submit" class="btn btn_red"  name="submit" onclick="return checkEmptyFieldslogin()">Login</button></div>
                            </div>
                            </div>
                        </form>
                    </div>

                    <!-- Register Form -->
                    <div class="user_register">
                    <header class="popupHeader">
                    <span class="header_title">Register</span>
                    </header>
                        <form id="register" name="register" method="post" action="register0.php">
                            <div class="input-field">
                            <label class="input-group">Username</label>
                            <input name="username" type="text" id="username" placeholder=" Enter Username" required/>
                            <br />

                            <label class="input-group">Name</label>
                            <input name="name" type="text" id="name" placeholder=" Enter Your Name" required/>
                            <br />

                            <label class="input-group">Email Address</label>
                            <input  name="email" type="email" id="email"  placeholder=" example@gmail.com" required/>
                            <br />

                            <label class="input-group">Phone Number</label>
                            <input name="phoneno" type="text"  id="phoneno" placeholder=" 012-3456789" required  />
                            <br />

                            <label class="input-group">Password</label>
                            <input name="password" type="password" id="password"  placeholder=" Enter Password" required />
                            <br />

                            <label class="input-group">Confirm Password</label>
                            <input name="cpassword" type="password" id="cpassword"  placeholder=" Confirm Password" required />
                            <br />

                            <div class="action_btns input-field">
                                <div class="one_half last"><button type="submit" class="btn btn_red" name="submit" value="Simpan" onclick="return registervalid()">Register</button></div>
                            </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>

            function checkEmptyFieldslogin(){
                var username = document.login.username.value;
                var password = document.login.password.value;
                if(username == "" || password == "")
                {
                    alert("Please enter username/password!");
                    return false;
                }
                else if(username.length < 5)
                {
                    alert("Username is too short!");
                    return false;
                }
                else
                    return true;
            }

            function registervalid(){
                var username = document.register.username.value;
                var name = document.register.name.value;
                var phoneno = document.register.phoneno.value;
                var email = document.register.email.value;
                var password = document.register.password.value;
                var c_password = document.register.cpassword.value;
                var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

                if(username == "")
                {
                    alert("Please enter username!");
                    return false;
                }
                
                else if(username.length < 5)
                {
                    alert("Your username is too short!");
                    return false;
                }
                else if(name == "")
                {
                    alert("Please enter your name!");
                    return false;
                }
                else if(email == "")
                {
                    alert("Please enter your email!");
                    return false;
                }
                else if(email.indexOf("@") == -1)
                {
                    alert("Please enter your email!");
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
                else if(phoneno.length < 10)
                {
                    alert("Please enter your correct phone number!");
                    return false;
                }
                else if(phoneno.length > 15)
                {
                    alert("Please enter your correct phone number!");
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
                else if(c_password != password)
                {
                    alert("Password does not match!");
                    return false;
                }
                else
                    return true;
            }
        </script>
</body>
</html>
<?php
} else{
    header("location: ../index.php");
}