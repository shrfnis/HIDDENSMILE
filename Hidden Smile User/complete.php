<?php
session_start();
include("..\Hidden Smile Admin\php\dbconn.php");
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];

$sql="SELECT * FROM orders WHERE cust_ID = '$username' ORDER BY order_ID DESC LIMIT 1";
$select = mysqli_query($dbconn,$sql);
$rs = mysqli_fetch_assoc($select)
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
    body {
  font-family: "Roboto", sans-serif;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.cookiesContent {
  width: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;
}

  img {
    width: 82px;
    margin-bottom: 15px;
  }
  p {
    margin-bottom: 40px;
    font-size: 18px;
  }
  button.accept {
    border: none;
    border-radius: 5px;
    width: 200px;
    padding: 14px;
    font-size: 16px;
    color: white;
    box-shadow: 0px 6px 18px -5px rgba(237, 103, 85, 1);
    cursor: pointer;
    background: linear-gradient(to right, #ff105f,#ffad06);
  }
  
  .justify-between{
    justify-content: space-between !important;
  }

  .gap-3 {
  gap: 1rem !important;
}
</style>

<body>
<div class="">
        <div class="cookiesContent" id="cookiesPopup">
          <img src="https://toppng.com/public/uploads/thumbnail/check-mark-green-tick-mark-green-check-mark-circle-11562875756gojuqyur6z.png" alt="cookies-img" />
          <p>We are delighted to inform you that your order have been placed and being process</p>
          <div class="d-flex gap-3">
          <div>
          <a href="../index.php"><button class="btn amado-btn mb-15">Continue Shopping</button></a>
          </div>
          <div>
          <a href="invoice.php?oid=<?php echo $rs['order_ID'] ?>"><button class="btn amado-btn mb-15">Generate Invoice</button></a>
          </div>
          </div>
        </div>
      </div>

</body>

</html>
<?php 
}
else if(isset($_SESSION['guest'])){ 
    $guest = $_GET['id'];

$sql="SELECT * FROM orders WHERE cust_ID = '$guest' ORDER BY order_ID DESC LIMIT 1";
$select = mysqli_query($dbconn,$sql);
$rs = mysqli_fetch_assoc($select);
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
    body {
  font-family: "Roboto", sans-serif;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.cookiesContent {
  width: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;
}

  img {
    width: 82px;
    margin-bottom: 15px;
  }
  p {
    margin-bottom: 40px;
    font-size: 18px;
  }
  button.accept {
    border: none;
    border-radius: 5px;
    width: 200px;
    padding: 14px;
    font-size: 16px;
    color: white;
    box-shadow: 0px 6px 18px -5px rgba(237, 103, 85, 1);
    cursor: pointer;
    background: linear-gradient(to right, #ff105f,#ffad06);
  }
  
  .justify-between{
    justify-content: space-between !important;
  }

  .gap-3 {
  gap: 1rem !important;
}
</style>

<body>
<div class="">
        <div class="cookiesContent" id="cookiesPopup">
          <img src="https://toppng.com/public/uploads/thumbnail/check-mark-green-tick-mark-green-check-mark-circle-11562875756gojuqyur6z.png" alt="cookies-img" />
          <p>We are delighted to inform you that your order have been placed and being process</p>
          <div class="d-flex gap-3">
          <div>
          <a href="../index.php"><button class="btn amado-btn mb-15">Continue Shopping</button></a>
          </div>
          <div>
          <a href="invoice.php?oid=<?php echo $rs['order_ID'] ?>&id=<?php echo $guest ?>"><button class="btn amado-btn mb-15">Generate Invoice</button></a>
          </div>
          </div>
        </div>
      </div>

</body>

</html>
<?php
}else{
  $username = $_GET['id'];

$sql="SELECT * FROM orders WHERE cust_ID = '$username' ORDER BY order_ID DESC LIMIT 1";
$select = mysqli_query($dbconn,$sql);
$rs = mysqli_fetch_assoc($select);
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
    body {
  font-family: "Roboto", sans-serif;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.cookiesContent {
  width: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;
}

  img {
    width: 82px;
    margin-bottom: 15px;
  }
  p {
    margin-bottom: 40px;
    font-size: 18px;
  }
  button.accept {
    border: none;
    border-radius: 5px;
    width: 200px;
    padding: 14px;
    font-size: 16px;
    color: white;
    box-shadow: 0px 6px 18px -5px rgba(237, 103, 85, 1);
    cursor: pointer;
    background: linear-gradient(to right, #ff105f,#ffad06);
  }
  
  .justify-between{
    justify-content: space-between !important;
  }

  .gap-3 {
  gap: 1rem !important;
}
</style>

<body>
<div class="">
        <div class="cookiesContent" id="cookiesPopup">
          <img src="https://toppng.com/public/uploads/thumbnail/check-mark-green-tick-mark-green-check-mark-circle-11562875756gojuqyur6z.png" alt="cookies-img" />
          <p>We are delighted to inform you that your order have been placed and being process</p>
          <div class="d-flex gap-3">
          <div>
          <a href="../index.php"><button class="btn amado-btn mb-15">Continue Shopping</button></a>
          </div>
          <div>
          <a href="invoice.php?oid=<?php echo $rs['order_ID'] ?>&id=<?php echo $username ?>"><button class="btn amado-btn mb-15">Generate Invoice</button></a>
          </div>
          </div>
        </div>
      </div>

</body>

</html>
<?php
}
?>