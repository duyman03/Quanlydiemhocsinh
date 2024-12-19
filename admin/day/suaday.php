<?php
session_start();
$ma = $gv = $mon = $lop = $hk = $pc = "";

require "../../classes/day.class.php";

$maDayHoc  = $_GET['id'];
if (empty($maDayHoc)) {
    header("location:../index.php?mod=day");
}
$dayClass = new day();
$day = $dayClass->selectday($maDayHoc);

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
        $con = $dayClass->update($ma, $gv, $mon, $lop, $hk, $pc, $maDayHoc);
?>
        <script type="text/javascript">
            alert("Bạn Đã Cập nhật thành công.Nhấn OK Để Tiếp Tục !");
            window.location = "../index.php?mod=day";
        </script>
<?php
        exit();
    }
}
?>
<center><img src="../../assets/img/Ban.gif" alt=""></center>

<body bgcolor="#CAFFFF">
    <h1 align="center">Sửa Lịch Dạy</h1>
    <form action="suaday.php?id=<?= $maDayHoc ?>" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Mã Số Dạy:</td>
                <td> <input type="text" name="txtid" size="25" value="<?= isset($day['MaDayHoc']) ? $day['MaDayHoc'] : '' ?>" /><br />
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
                            $selected = "";
                            if ($day['Magv'] == $data['Magv']) {
                                $selected = "selected";
                            }
                            echo "<option value='" . $data['Magv'] . "' selected='" . $selected . "'>" . $data['Magv'] . "</option>";
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
                            $selected = "";
                            if ($day['MaMonHoc'] == $data['MaMonHoc']) {
                                $selected = "selected";
                            }

                            echo "<option value='" . $data['MaMonHoc'] . "' selected='" . $selected . "'>" . $data['MaMonHoc'] . "</option>";
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

                            $selected = "";
                            if ($day['MaHocKy'] == $data['MaHocKy']) {
                                $selected = "selected";
                            }
                            echo "<option value='" . $data['MaHocKy'] . "' selected='" . $selected . "'>" . $data['MaHocKy'] . "</option>";
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

                            $selected = "";
                            if ($day['MaLopHoc'] == $data['MaLopHoc']) {
                                $selected = "selected";
                            }
                            echo "<option value='" . $data['MaLopHoc'] . "' selected='" . $selected . "'>" . $data['MaLopHoc'] . "</option>";

                            $di = $db->close();
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Mô Tả:</td>
                <td><input type="text" name="txtmota" value="<?= isset($day['MoTaPhanCong']) ? $day['MoTaPhanCong'] : '' ?>" /></td>
            </tr>
            <tr>
                <td> </td>
                <td>
                    <input type="submit" name="ok" value="Sửa lịch dạy" /><br />
                    <a href="../index.php?mod=day">Trở về</a>
                </td>
            </tr>
        </table>
    </form>
</body>