<?php
session_start();
$n=$ten=$h=$nam="";
REQUIRE "../../classes/hocki.class.php";
if(isset($_POST['ok'])){
    $connect=new hocki();
    $d=$connect->allquery();
    if($_POST['txthk'] == null){
        echo "Bạn Chưa Nhập Mã Học Kỳ!";
    }
    else{
        $hocky="/^[0-9]{5}$/";
        if(preg_match($hocky,$_POST['txthk'])) {
            $n = $_POST['txthk'];
        }else{
            ?>
            <script type="text/javascript">
                alert("Ma Hoc Ky Khong Hop Le.!");
                window.location="add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if($_POST['txtten'] == null){
        echo "</br> Bạn Chưa Nhập Tên Học Kỳ!";
    }else{
        $tenhk="/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if(preg_match($tenhk,$_POST['txtten'])) {
            $ten = $_POST['txtten'];
        }else{
            ?>
            <script type="text/javascript">
                alert("Ten Hoc Ky Khong Hop Le.!");
                window.location="add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if($_POST['txtheso'] == null){
        echo "</br> Bạn Chưa Nhập Hệ Số Học Kỳ!";
    }else{
        $heso="/^[1-2]{1}$/";
        if(preg_match($heso,$_POST['txtheso'])) {
            $h = $_POST['txtheso'];
        }else{
            ?>
            <script type="text/javascript">
                alert("He So Hoc Ky Khong Hop Le.!");
                window.location="add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if($_POST['txtnam'] == null){
        echo "</br> Bạn Chưa Nhập Năm Học!";
    }else{
        $nh="/^[0-9_-]{9,}$/";
        if(preg_match($nh,$_POST['txtnam'])) {
            $nam = $_POST['txtnam'];
        }
        else{
            ?>
            <script type="text/javascript">
                alert("Nam Hoc Khong Hop Le.!");
                window.location="add_hk.php";
            </script>
            <?php
            exit();
        }
    }

    if($n && $ten && $h && $nam){
        $con=$connect->add($n,$ten,$h,$nam);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm Cột Diểm Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location="../index.php?mod=hk";
        </script>
        <?php
        exit();
    }
}
?>
<center><img src="../../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Thêm Học Kỳ</h1>
<form action="add_hk.php" method="post">
    <table align="center" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã Số Học Kỳ:</td>
            <td>  <input type="text" name="txthk" size="25"  placeholder="Mẫu:12016"/><br/>
            </td>
        </tr>
        <tr>
            <td>Tên Học Kỳ:</td>
            <td><input type="text" name="txtten" size="25" placeholder="Là chữ tiếng Việt"/></td>
        </tr>
        <tr>
            <td>Hệ Số HK:</td>
            <td><input type="text" name="txtheso" size="25" placeholder="Nhập 1 hoặc 2"/></td>
        </tr>
        <tr>
            <td>Năm Học:</td>
            <td><input type="text" name="txtnam" size="25" placeholder="Mẫu: 2016-2017"/></td>
        </tr>
        <tr>
            <td> </td>
            <td>  <input type="submit" name="ok" value="Thêm Học Kỳ" /><br/>
            </td>
        </tr>
    </table>
</form>
</body>