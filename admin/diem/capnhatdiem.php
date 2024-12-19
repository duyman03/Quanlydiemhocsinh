<?php
session_start();
$a = $_SESSION['ses_Magv'];
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <div class="banner">
        <center><img src="../../assets/img/Ban.gif"></center>
    </div>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TRANG CẬP NHẬT ĐIỂM</title>

</head>

<body bgcolor="#CAFFFF">
    <?php

    ?>
    <center>
        <h1>TRANG CẬP NHẬT ĐIỂM</h1>
    </center>
    <form action="capnhatdiem.php" method="post">
        <div style="text-align:center">
            <select name="day" style="width:100px;height: 25px ">
                <?php
                $query="SELECT * FROM `day` WHERE `Magv` = '".$a."' GROUP BY `MaLopHoc` ";
                $results = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                    $_SESSION['malop'] = $data['MaLopHoc'];
                }
                ?>
            </select>
            <select name="mon" style="width:100px;height: 25px">
                <?php
                $query2="SELECT * FROM `day` WHERE `Magv` = '".$a."' GROUP BY `MaMonHoc` ";
                $results2 = mysqli_query($conn, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {
                    echo "<option value='$data2[MaMonHoc]'>$data2[MaMonHoc]</option>";
                    $_SESSION['mamon']=$data2['MaMonHoc'];
                }
                ?>

            </select>
            <select name="hk" style="width:100px;height: 25px">
                <?php
                $query3 = "select * from hocky";
                $results3 = mysqli_query($conn, $query3);
                while ($data3 = mysqli_fetch_assoc($results3)) {
                    echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
                    $_SESSION['mahk'] = $data3['MaHocKy'];
                }
                ?>

            </select>
            <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px" /></p>

        </div>
    </form>
    <?php
    $dayhoc = $monhoc = $hk = "";
    if (isset($_POST['add'])) {
        $dayhoc = $_POST['day'];
        $monhoc = $_POST['mon'];
        $hk = $_POST['hk'];
        if ($dayhoc && $monhoc && $hk) {
            //header('location:add_diem.php');
            // $ma=$lop=$hk=$mon=$mieng=$p1=$p2=$t1=$t2=$d="";
            if (isset($_POST['themdiem'])) {
                //if ($row['MaLopHoc'] == $_POST['day']) {
                $ma2 = $_POST['madiem'];
                $ma = $_POST['ma'];
                $lop = $_POST['lop'];
                $mon = $_POST['mon'];
                $hk = $_POST['hk'];

                $diem = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($diem, $_POST["diem"])) {
                    $mieng = $_POST["diem"];
                } else {
    ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem mieng Khong Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$p1 = $_POST['diem1'];
                $diem1 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($diem1, $_POST["diem1"])) {
                    $p1 = $_POST["diem1"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem 15 phut lan 1 Khong Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$p2 = $_POST['diem2'];
                $p22 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($p22, $_POST["diem2"])) {
                    $p2 = $_POST["diem2"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem 15 phut lan 2 Khong Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$t1 = $_POST['diem3'];
                $t11 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($t11, $_POST["diem3"])) {
                    $t11 = $_POST["diem3$i"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem 1 tiet lan 1 Khong Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$t2 = $_POST['diem4'];
                $t22 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($t22, $_POST["diem4"])) {
                    $t2 = $_POST["diem4"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem 1 tiet lan 2 Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$d = $_POST['diem5'];
                $dt = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($dt, $_POST["diem5"])) {
                    $d = $_POST["diem5"];
                } else {

                ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem Thi Khong Hop Le!");
                        window.location = "capnhatdiem.php";
                    </script>

                <?php
                    exit();
                }
                $tb = $_POST['diem6'];
                $query = "select * from diem";
                $results = mysqli_query($conn, $query);
                for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
                    $sql = "update diem set 
                MaHocKy='$hk[$i]',
                MaMonHoc='$mon[$i]',
                MaHS='$ma[$i]',
                MaLopHoc='$lop[$i]',
                DiemMieng='$mieng[$i]',
                Diem15Phut1='$p1[$i]',
                Diem15Phut2='$p2[$i]',
                Diem1Tiet1='$t1[$i]',
                Diem1Tiet2='$t2[$i]',
                DiemThi='$d[$i]',
                DiemTB='$tb[$i]' 
                where MaDiem=" . $ma2[$i];
                    $results1 = mysqli_query($conn, $sql);
                ?>
                    <script type="text/javascript">
                        alert("Bạn Đã Cập Nhật Điểm Thành Công")
                    </script>
        <?php
                    header('location:capnhatdiem2.php');

                    //}
                }
            }
        }
        ?>
        <br />
        <table border="1" cellspacing="0" cellpadding="1">
            <tr style="font-weight: bold">
                <td></td>
                <td>Mã Học Sinh</td>
                <td>Tên Học Sinh</td>
                <td>Lớp</td>
                <td>Môn Học</td>
                <td>Học Kỳ</td>
                <td>Điểm Miệng</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 1 Tiết</td>
                <td>Điểm 1 Tiết</td>
                <td>Điểm Thi</td>
                <td>Điểm TB</td>
            </tr>
            <?php
            $query = "select * from diem,hocsinh,monhoc WHERE diem.MaHS=hocsinh.MaHS && diem.MaMonHoc=monhoc.MaMonHoc";
            $results = mysqli_query($conn, $query);
            ?>
            <form action="capnhatdiem2.php" method="post">
                <hr>
                <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold">
                    <div>Danh Sách Lớp: <?php echo $_POST['day'] ?></div>
                    <div> Mã Môn Học: <?php echo $_POST['mon'] ?></div>
                    <div> Mã Học Kỳ: <?php echo $_POST['hk'] ?></div>
                    <div> Mã Giáo Viên Nhập Điểm: <?php echo $_SESSION['ses_Magv'] ?></div>
                </div>
                <hr>
                <div>
                    <div style="text-align: right;float: left">
                        <a href="../qlgv.php"><button type='button'>Trở Về</button></a>
                    </div>
                    <div style="text-align: right">
                        <input type="submit" name="themdiem" value="Cập Nhật Điểm" />
                    </div>
                </div>
                <hr>
                <?php
                for ($i = 1; $i <= ($row = mysqli_fetch_assoc($results)); $i++) {
                    if ($row['MaLopHoc'] == $_POST['day'] && $row['MaMonHoc'] == $_POST['mon'] && $row['MaHocKy'] == $_POST['hk']) {
                        echo "<tr>"; ?>
                        <td><input style="width:90px" type="hidden" name="madiem[]" value="<?php echo "$row[MaDiem]"; ?>" readonly="readonly" /></td>
                        <td><input style="width:90px" type="text" name="ma[]" value="<?php echo "$row[MaHS]"; ?>" readonly="readonly" /></td>
                        <td><input style="width:200px" type="text" name="ten[]" value="<?php echo "$row[TenHS]"; ?>" readonly="readonly" /></td>
                        <td><input style="width:70px" type="text" name="lop[]" value="<?php echo $_POST['day'] ?>" readonly="readonly" /></td>
                        <td><input style="width:90px" type="text" name="mon[]" value="<?php echo "$row[MaMonHoc]" ?>" readonly="readonly" /></td>
                        <td><input style="width:100px" type="text" name="hk[]" value="<?php echo "$row[MaHocKy]" ?>" readonly="readonly" /></td>
                        <td><input style="width:100px" type="text" name="diem[]" value="<?php echo "$row[DiemMieng]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem1[]" value="<?php echo "$row[Diem15Phut1]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem2[]" value="<?php echo "$row[Diem15Phut2]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem3[]" value="<?php echo "$row[Diem1Tiet1]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem4[]" value="<?php echo "$row[Diem1Tiet2]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem5[]" value="<?php echo "$row[DiemThi]"; ?>" /></td>
                        <td><input style="width:100px" type="text" name="diem6[]" readonly="readonly" /></td>

                        </tr>
                <?php
                    }
                } ?>
            </form>
        </table>
        <hr>
    <?php
    }

    ?>
</body>