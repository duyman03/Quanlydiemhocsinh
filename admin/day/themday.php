<?php
session_start();
$ma = $gv = $mon = $lop = $hk = $pc = "";
require "../../classes/day.class.php";
if (isset($_POST['ok'])) {
    $connect = new day();
    $d = $connect->allday();
    if ($_POST['txtid'] == null) {
        echo "</br>Bạn Chưa Nhập Mã Học Dạy";
    } else {
        $ma = $_POST['txtid'];
    }
    if ($_POST['txtgv'] == null) {
        echo "</br> Bạn Chưa Nhập Mã Giáo Viên";
    } else {
        $gv = $_POST['txtgv'];
    }
    if ($_POST['txtmh'] == null) {
        echo "</br> Bạn Chưa Nhập Mã Môn Học";
    } else {
        $mon = $_POST['txtmh'];
    }
    if ($_POST['txtlop'] == null) {
        echo "</br> Bạn Chưa Nhập Lớp Học";
    } else {
        $lop = $_POST['txtlop'];
    }
    if ($_POST['txthk'] == null) {
        echo "</br> Bạn Chưa Nhập Học Kỳ";
    } else {
        $hk = $_POST['txthk'];
    }
    if ($_POST['txtmota'] == null) {
        echo "</br> Bạn chưa nhập Mô tả";
    } else {
        $pc = $_POST['txtmota'];
    }
    if ($ma && $gv && $hk && $lop && $pc && $mon) {
        $con = $connect->add($ma, $gv, $mon, $lop, $hk, $pc);
?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm Giáo Viên Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location = "../index.php?mod=day";
        </script>
<?php
        exit();
    }
}
?>
<center><img src="../../assets/img/Ban.gif" alt=""></center>

<body bgcolor="#CAFFFF">
    <h1 align="center">Thêm Lịch Dạy</h1>
    <form action="themday.php" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Mã Số Dạy:</td>
                <td> <input type="text" name="txtid" size="25" /><br />
                </td>
            </tr>
            <tr>
                <td>Ma Số Giáo Viên:</td>
                <td><select name="txtgv">
                        <?php
                        $db = new DB();
                        $conn = $db->connect();
                        $query = "select * from giaovien";
                        $results = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($results)) {
                            echo "<option value='$data[Magv]'>$data[Magv]</option>";
                            $di = $db->close();
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Ma Số Môn Học:</td>
                <td><select name="txtmh">
                        <?php
                        $db = new DB();
                        $conn = $db->connect();
                        $query = "select * from monhoc";
                        $results = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($results)) {
                            echo "<option value='$data[MaMonHoc]'>$data[MaMonHoc]</option>";
                            $di = $db->close();
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Mã Số Học Kỳ:</td>
                <td><select name="txthk">
                        <?php
                        $db = new DB();
                        $conn = $db->connect();
                        $query = "select * from hocky";
                        $results = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($results)) {
                            echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                            $di = $db->close();
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Mã Số Lớp:</td>
                <td><select name="txtlop">
                        <?php
                        $db = new DB();
                        $conn = $db->connect();
                        $query = "select * from lophoc";
                        $results = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($results)) {
                            echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                            $di = $db->close();
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Mô Tả:</td>
                <td><input type="text" name="txtmota" size="25" /></td>
            </tr>
            <tr>
                <td> </td>
                <td>
                    <input type="submit" name="ok" value="Thêm lịch dạy" /><br />
                    <a href="../index.php?mod=day">Trở về</a>
                </td>
            </tr>
        </table>
    </form>
</body>