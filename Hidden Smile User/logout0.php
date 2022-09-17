<?php
session_start();
if(isset($_SESSION['guest'])){
    $guest = $_SESSION['guest'];
    unset($_SESSION['username']);
}
else{
session_unset();
session_destroy();
}
header("Location: ../index.php");
?>