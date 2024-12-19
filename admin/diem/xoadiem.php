<?php
session_start();
$mahs=$_GET['cma'];
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from diem where MaDiem='$mahs'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=diem");
exit();
?>