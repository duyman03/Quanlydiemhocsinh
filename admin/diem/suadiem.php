<?php
session_start();
require "../../includes/config.php";
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
$madiem = $_GET['cma'];

if (isset($_POST['ok'])) {

    if ($_POST['txtmahs'] == null) {
        echo "<p>Bạn chưa nhập vào mã học sinh</p>";
    } else {
        $txtmahs = $_POST['txtmahs'];
    }

    if ($_POST['txtlop'] == null) {
        echo "<p>Bạn chưa nhập vào mã lớp</p>";
    } else {
        $malop = $_POST['txtlop'];
    }

    if ($_POST['txtmonhoc'] == null) {
        echo "<p>Bạn chưa nhập vào mã môn học</p>";
    } else {
        $txtmonhoc = $_POST['txtmonhoc'];
    }

    if ($_POST['txtmahk'] == null) {
        echo "<p>Bạn chưa nhập vào mã học kỳ</p>";
    } else {
        $txtmahk = $_POST['txtmahk'];
    }
    $txtdiemmieng = $txtdiem15phut1 = $txtdiem15phut2 = $txtdiem1tiet1 = $txtdiem1tiet2 = $txtdiemthi = 0;
    $diem = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";

    if (!empty($_POST["txtdiemmieng"])) {
        $txtdiemmieng = intval($_POST["txtdiemmieng"]);
    } else {
        echo "<p>Bạn chưa nhập vào điểm miệng</p>";
    }

    if (!empty($_POST["txtdiem15phut1"])) {
        $txtdiem15phut1 = $_POST["txtdiem15phut1"];
    } else {
        echo "<p>Bạn chưa nhập vào điểm 15 phút 1</p>";
    }

    if (!empty($_POST["txtdiem15phut2"])) {
        $txtdiem15phut2 = $_POST["txtdiem15phut2"];
    } else {
        echo "<p>Bạn chưa nhập vào điểm 15 phút 2</p>";
    }

    if (!empty($_POST["txtdiem1tiet1"])) {
        $txtdiem1tiet1 = $_POST["txtdiem1tiet1"];
    } else {
        echo "<p>Bạn chưa nhập vào điểm 1 tiết 1</p>";
    }

    if (!empty($_POST["txtdiem1tiet2"])) {
        $txtdiem1tiet2 = $_POST["txtdiem1tiet2"];
    } else {
        echo "<p>Bạn chưa nhập vào điểm 1 tiết 2</p>";
    }

    if (!empty($_POST["txtdiemthi"])) {
        $txtdiemthi = $_POST["txtdiemthi"];
    } else {
        echo "<p>Bạn chưa nhập vào điểm thi</p>";
    }
    $diemTb = ($txtdiem15phut1 + $txtdiem15phut2 + $txtdiem1tiet1 + $txtdiem1tiet2 + $txtdiemthi) / 5;

    $sql = "UPDATE `diem` SET 
    `MaHocKy`='" . $txtmahk . "',
    `MaMonHoc`='" . $txtmonhoc . "',
    `MaHS`='" . $txtmahs . "',
    `MaLopHoc`='" . $malop . "',
    `DiemMieng`='" . $txtdiemmieng . "',
    `Diem15Phut1`='" . $txtdiem15phut1 . "',
    `Diem15Phut2`='" . $txtdiem15phut2 . "',
    `Diem1Tiet1`='" . $txtdiem1tiet1 . "',
    `Diem1Tiet2`='" . $txtdiem1tiet2 . "',
    `DiemThi`='" . $txtdiemthi . "',
    `DiemTB`='" . $diemTb . "' WHERE MaDiem='" . $madiem . "'";

    $results1 = mysqli_query($conn, $sql);
}
$query = "select * from diem where MaDiem='$madiem'";
$results = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($results);
?>
<center><img src="../../assets/img/Ban.gif"></center>

<body bgcolor="#CAFFFF">
    <h1 align="center">TRANG SỬA ĐIỂM</h1>
    <table align="center" border="1" cellspacing="0" cellpadding="10">
        <form action="suadiem.php?cma=<?php echo $row['MaDiem']; ?>" method="post">
            <tr>
                <td>Mã Học Sinh</td>
                <td><input type="text" name="txtmahs" value="<?php echo $row['MaHS']; ?>" readonly="readonly" /></td>
            </tr>

            <tr>
                <td>Mã Lớp</td>
                <td><input type="text" name="txtlop" value="<?php echo $row['MaLopHoc']; ?>" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>Mã Môn</td>
                <td><input type="text" name="txtmonhoc" value="<?php echo $row['MaMonHoc']; ?>" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>Mã Học Kỳ</td>
                <td><input type="text" name="txtmahk" value="<?php echo $row['MaHocKy']; ?>" readonly="readonly" /> </td>
            </tr>
            <tr>
                <td>Điểm Miệng</td>
                <td><input type="number" name="txtdiemmieng" value="<?php echo $row['DiemMieng']; ?>" /> </td>
            </tr>
            <tr>
                <td>Điểm 15 Phút</td>
                <td><input type="number" name="txtdiem15phut1" value="<?php echo $row['Diem15Phut1']; ?>" /> </td>
            </tr>
            <tr>
                <td>Điểm 15 Phút</td>
                <td><input type="number" name="txtdiem15phut2" value="<?php echo $row['Diem15Phut2']; ?>" /> </td>
            </tr>
            <tr>
                <td>Điểm 1 Tiết</td>
                <td><input type="number" name="txtdiem1tiet1" value="<?php echo $row['Diem1Tiet1']; ?>" /> </td>
            </tr>
            <tr>
                <td>Điểm 1 Tiết</td>
                <td><input type="number" name="txtdiem1tiet2" value="<?php echo $row['Diem1Tiet2']; ?>" /></td>
            </tr>
            <td>Điểm Thi</td>
            <td><input type="number" name="txtdiemthi" value="<?php echo $row['DiemThi']; ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="ok" value="Sửa" /><br />
                    <a href="../index.php?mod=diem">Trở về</a>
                </td>
            </tr>
        </form>
    </TABLE>