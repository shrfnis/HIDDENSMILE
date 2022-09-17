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
    <title>Hidden Smile | View Account</title>

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

    .justify-center{
        justify-content: center;
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
                <a href="index.php"><img src="img/hs-img/logo.png" alt=""></a>
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
                <li><a href="rlogin.php" class="btn amado-btn mb-15">My Account</a></li>
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
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100  ">
            <div class="container-fluid ">
                <div class="row justify-center">
                    <div class="col-12 col-lg-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>My Profile</h2>
                            </div>

                            <?php
                            $sql1 = "SELECT * FROM customers WHERE cust_ID = '$username'";
                            $rs1 = mysqli_query($dbconn,$sql1);
                            $row_rs1 = mysqli_fetch_assoc($rs1);

                            $sql2 = "SELECT c.cust_ID, c.cart_ID, c.shipping_ID, cd.Qty, i.selling_Price, SUM(cd.Qty*i.selling_Price) AS Total FROM cartdetails cd INNER JOIN cart c ON c.cart_ID = cd.cart_ID INNER JOIN items i ON i.item_ID = cd.item_ID WHERE cust_ID = '$username' ";
                            $rs2 = mysqli_query($dbconn,$sql2);
                            $row_rs2 = mysqli_fetch_assoc($rs2);
                            ?>

                            <form action="updateCustomerProfile0.php" method="post" name="updateprof" id="updateprof">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                    <label class="label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" readonly value="<?php echo $row_rs1['cust_ID']; ?>" placeholder="Username" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label class="label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_rs1['cust_Name']; ?>" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                    <label class="label">Email</label>
                                        <input type="text" class="form-control mb-3" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $row_rs1['cust_Email']; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                    <label class="label">Phone Number</label>
                                        <input type="text" class="form-control mb-3" id="phoneno" name="phoneno" placeholder="012-34567890" value="<?php echo $row_rs1['cust_PhoneNo']; ?>">
                                    </div>
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="myCheck" name="myCheck" onclick="myFunction()">
                                            <label class="custom-control-label mb-3" for="myCheck">Change Password</label>
                                    <div id="text" class="col-md-12 mb-3 display-none">
                                    <label class="label">Current Password</label>
                                        <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Password (Unchange)">
                                    <label class="label">New Password</label>
                                        <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
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
                                 <div class="col-md-6 mb-5 list">
                                    <button type="submit" name="editprofile" class="btn amado-btn mb-15" onclick="return valid()" >Save</a>
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
                var payment = document.placeorderForm.paymentmethod.value;
                if(payment == "")
                {
                    alert("Please select payment method !");
                    return false;
                }
                else
                    return true;
            }

            function valid(){
    var change = document.updateprof.myCheck.checked;
    var name = document.updateprof.name.value;
    var email = document.updateprof.email.value;
    var phoneno = document.updateprof.phoneno.value;
    var oldpw = document.updateprof.opassword.value;
    var newpw = document.updateprof.npassword.value;
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    var cof = confirm("Are you sure want to save changes?");

    if(change != true){
    if(name == ""){
          alert("Please enter name!");
          return false;
        }
        if(email == "")
        {
            alert("Please enter email!");
            return false;
        }
        else if(email.indexOf("@") == -1)
        {
            alert("Please enter email!");
            return false;
        }
        else if(phoneno == "")
        {
            alert("Please enter phone number!");
            return false;
        }
        else if(phoneno.indexOf("-") == -1)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length < 10)
        {
            alert("Please enter correct phone number!");
            return false;
        }
        else if(phoneno.length > 15)
        {
            alert("Please enter correct phone number!");
            return false;
        }
        else if(newpw != "")
        {
            alert("Tick the checkbox if you want to change the password!");
            return false;
        }
        else if(cof != true)
        {
            return false;
        }else

            return true;
      }else{
        if(name == ""){
          alert("Please enter name!");
          return false;
        }
        if(email == "")
        {
            alert("Please enter email!");
            return false;
        }
        else if(email.indexOf("@") == -1)
        {
            alert("Please enter email!");
            return false;
        }
        else if(phoneno == "")
        {
            alert("Please enter phone number!");
            return false;
        }
        else if(phoneno.indexOf("-") == -1)
        {
            alert("Phone number must be in 012-3456789 format!");
            return false;
        }
        else if(phoneno.length < 10)
        {
            alert("Please enter correct phone number!");
            return false;
        }
        else if(phoneno.length > 15)
        {
            alert("Please enter correct phone number!");
            return false;
        }
        else if(newpw == "")
        {
            alert("Please enter new password!");
            return false;
        }
        else if(!newpw.match(decimal))
        {
            alert("Password must have 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");
            return false;
        }else if(cof == true)
        {
            return true;
        }else

            return false;  
       
      }
}
    </script>

</body>

</html>
<?php 
}
else{ 
    echo"error";
}
?>