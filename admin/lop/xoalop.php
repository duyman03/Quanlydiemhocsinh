<?php
session_start();
$ma=$_GET['cmahk'];
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from lophoc where MaLopHoc='$ma'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=lop");
exit();
?>