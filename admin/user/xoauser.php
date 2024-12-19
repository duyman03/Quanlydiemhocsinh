<?php
//require_once("ketnoiuser.php");
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
$id=$_GET['id'];
$query="delete from user where username='$id'";
$results = mysqli_query($conn,$query);
header("location:hienthiuser.php");
exit();
?>