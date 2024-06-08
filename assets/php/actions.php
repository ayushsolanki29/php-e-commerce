<?php
include 'config.php';
session_start();

if (isset($_GET['p'])) {
  if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $productid =  $_GET['p'];
    $add_cart = mysqli_query($con, "INSERT INTO `cart`(`product_id`, `UserID`) VALUES ('$productid','$userid')");
    if ($add_cart) {
      echo "<script>window.location.href = '../../index.php'</script>";
    }
  } else {
    echo "<script>alert('Please Login')</script>";
    echo "<script>window.location.href = '../../index.php?login'</script>";
  }
}

if (isset($_GET['delete_cart_item'])) {
  $cart_id = $_GET['cartid'];
  mysqli_query($con, "DELETE FROM `cart` WHERE id='$cart_id'");
  echo "<script>window.location.href = '../../cart.php'</script>";
}
