<?php
if (!defined("ROOT")) {
    echo "You don't have permission to access this page!";
    exit;
}
$mod = isset($_GET["mod"]) ? $_GET["mod"] : "";
if ($mod == "hs") {
    include ROOT . "/hocsinh/xem_hs.php";
}
if ($mod == "gv") {
    include ROOT . "/xem_gv.php";
}
if ($mod == "mh") {
    include ROOT . "/monhoc/hienthimon.php";
}
if ($mod == "diem") {
    include ROOT . "/diem/ad_xemdiem.php";
}
if ($mod == "hk") {
    include ROOT . "/hocki/hienthihk.php";
}
if ($mod == "lop") {
    include ROOT . "/lop/hienthilop.php";
}
if ($mod == "capnhat") {
    include ROOT . "/user/trangcapnhat.php";
}
if ($mod == "day") {
    include ROOT . "/day/hienthi.php";
}
if ($mod == "dangxuat") {
    include ROOT . "/logout.php";
}
