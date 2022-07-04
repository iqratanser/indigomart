<?php
require_once "loader.php";
require_once "../db.php";
require_once "auth_session.php";

$id=$_GET['order_id'];
$status=$_GET['order_Status'];
$sql="UPDATE `orders` SET `order_Status`=$status where `order_id`=$id";
$result=mysqli_query($con,$sql);
header('location:order-details.php')
?>