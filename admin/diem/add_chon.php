<?php
session_start();
$a=$_SESSION['ses_Magv'];
require "../../includes/config.php";
$dayhoc=$monhoc=$hk="";
if(isset($_POST['add'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hk = $_POST['hk'];
    if ($dayhoc && $monhoc &&$hk) {
        header('location:add_diem.php');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <div class="banner">
        <center><img src="../../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang Nhập Điểm</title>

</head>
<body>
<?php

?>
<center><h1>Trang Nhập Điểm</h1></center>
<form action="add_diemhs.php" method="post">
    <div style="text-align:center">
           <select name="day" style="width:100px;height: 25px ">
        <?php
            $query="select * from day where Magv=$a";
            $results=mysqli_query($conn,$query);
            while($data=mysqli_fetch_assoc($results)){
                echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                $_SESSION['malop']=$data['MaLopHoc'];
            }
            ?>
        </select>
        <select name="mon" style="width:100px;height: 25px" >
        <?php
            $query2="select * from giaovien where Magv=$a";
            $results2=mysqli_query($conn,$query2);
            while($data2=mysqli_fetch_assoc($results2)){
                echo "<option value='$data2[MaMonHoc]'>$data2[MaMonHoc]</option>";
                $_SESSION['mamon']=$data2['MaMonHoc'];
            }
        ?>

    </select>
    <select name="hk" style="width:100px;height: 25px">
        <?php
        $query3="select * from hocky";
        $results3=mysqli_query($conn,$query3);
        while($data3=mysqli_fetch_assoc($results3)){
            echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
            $_SESSION['mahk']=$data3['MaHocKy'];
        }
        ?>

    </select>
        <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

        </div>
</form>
</body>
