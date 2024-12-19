<?php
if (!defined("ROOT"))
{
    echo "You don't have permission to access this page!"; exit;
}
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod=="hs")
{
    include ROOT . "/hocsinh/xemdiem_hs.php";
}
if($mod=="tt")
{
    include ROOT . "/hocsinh_xemthongtin.php";
}
?>