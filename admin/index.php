<?php
define('ROOT', dirname(__FILE__));
include "../includes/function.php";
session_start();
if ($_SESSION['ses_level'] != 1) {
    header("location:login.php");
}
?>
<div class="banner">
    <center><img src="../assets/img/Ban.gif"></center>

    <body bgcolor="#CAFFFF">
        <style type="text/css">
            #menu ul {
                margin-left: -5px;

            }

            #menu ul li {
                color: #f1f1f1;
                display: inline-block;
                width: 144px;
                height: 40px;
                line-height: 40px;
                margin-left: -5px;
                text-align: center;
                font-weight: bold;

            }

            #menu ul a {
                text-decoration: none;
                width: 149px;
                float: left;
                background: #336699;
                color: #FFFFFF;
                text-align: center;
                line-height: 30px;
                font-weight: bold;
                border-left: 1px solid #FFFFFF;
            }

            #menu ul a:hover {
                background: #000000;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="style.css">
        <div id="menu">
            <p style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">CHÀO MỪNG BẠN ĐẾN TRANG QUẢN TRỊ HỆ THỐNG</p>
            <p style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">TRƯỜNG THPT TRẦN KHAI NGUYÊN</p>
            <ul>
                <li><a href="index.php?mod=hs">Quản Lý Học Sinh</a></li>
                <li><a href="index.php?mod=gv">Quản Lý Giáo Viên</a></li>
                <li><a href="index.php?mod=mh">Quản Lý Môn Học</a></li>
                <li><a href="index.php?mod=diem">Quản Lý Điểm</a></li>
                <li><a href="index.php?mod=hk">Quản Lý Học Kỳ</a></li>
                <li><a href="index.php?mod=lop">Quản Lý Lớp</a></li>
                <li><a href="index.php?mod=day">Lịch Dạy</a></li>
                <li><a href="index.php?mod=capnhat">Cập Nhật</a></li>
                <li><a href="index.php?mod=dangxuat">Đăng Xuất</a></li>
            </ul>
        </div>
        <div class="right">
            <?php include "mod.php"; ?>
        </div>

        <table border=0 cellpadding5 cellspacing=0 align="center" width="1300">
            <TR>
                <TD>
            <tr>
                <td colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px">
                    Copyright &copy; 2016 Trường THPT Trần Khai Nguyên <br>
                </td>
            </tr>
            </td>
            </TR>
        </table>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script>
            $(function() {
                $('#malophoc').change(function() {
                    $(this).parent().submit();
                })
            })
        </script>