<?php
session_start();
$ma=$_GET['Ma'];
require "../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from giaovien where Magv='$ma'";
$results = mysqli_query($conn,$query);
header("location:index.php?mod=gv");
exit();
?>