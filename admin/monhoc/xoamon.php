<?php
require "../../classes/monhoc.class.php";
$con=new monhoc();
$id = $_GET['id'];
$xoa=$con->xoa($id);
header("location: ../index.php?mod=mh");
?>