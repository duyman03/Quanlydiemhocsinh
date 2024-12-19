<?php
session_start();
require "../../classes/monhoc.class.php";
$con=new monhoc();
if (!empty($_POST['add_mon']))
{
    // Lay data
    // Lay data
    $mamon="/^[A-Z]{1,}$/";
    if(preg_match($mamon,isset($_POST['ma']) ? $_POST['ma'] : '')) {
        $data['MaMonHoc'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Mon Hoc Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();

    }
    $ten="/^[a-zA-Z'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ� �ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ� ��ỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
    if(preg_match($ten,isset($_POST['name']) ? $_POST['name'] : '')) {
        $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Them Mon Hoc Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();
    }
    $sotiethoc="/^[0-9]{1,}$/";
    if(preg_match($sotiethoc,isset($_POST['tiet']) ? $_POST['tiet'] : '')) {
        $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("So Tiet Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();
    }
    $heso="/^[1-2]{1}$/";
    if(preg_match($heso,isset($_POST['so']) ? $_POST['so'] : '')) {
        $data['HeSoMonHoc'] = isset($_POST['so']) ? $_POST['so'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("He So Mon Hoc Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();
    }


    // Validate thong tin
    $errors = array();
    if (empty($data['MaMonHoc'])){
        $errors['MaMonHoc'] = 'Chưa nhập tên sinh vien';
    }

    if (empty($data['TenMonHoc'])){
        $errors['TenMonHoc'] = 'Chưa nhập giới tính sinh vien';
    }
    if (empty($data['SoTiet'])){
        $errors['SoTiet'] = 'Chưa nhập giới tính sinh vien';
    }
    if (empty($data['HeSoMonHoc'])){
        $errors['HeSoMonHoc'] = 'Chưa nhập giới tính sinh vien';
    }
    // Neu ko co loi thi insert
    if (!$errors){
        $mon=$con->add($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet'],$data['HeSoMonHoc']);
        // Trở về trang danh sách
        ?>
        <script type="text/javascript">alert ("Đã Thêm Môn Học Thành Công");</script>
<?php
        header("location:../index.php?mod=mh");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img src="../../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
<center>
<h1>Thêm Môn Học </h1>
<a href="../index.php?mod=mh"><button>Trở về</button></a> <br/> <br/>
<form method="post" action="themmon.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã Môn Học</td>
            <td>
                <input type="text" name="ma" value="<?php echo !empty($data['MaMonHoc']) ? $data['MaMonHoc'] : ''; ?>" placeholder="Tối đa 2 kí tự, là chữ cái viết tắt của môn"/>
                <?php if (!empty($errors['MaMonHoc'])) echo $errors['MaMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Tên Môn Học</td>
            <td>
                <input type="text" name="name" value="<?php echo !empty($data['TenMonHoc']) ? $data['TenMonHoc'] : ''; ?>"/>
                <?php if (!empty($errors['TenMonHoc'])) echo $errors['TenMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Số Tiết</td>
            <td>
                <input type="text" name="tiet" value="<?php echo !empty($data['SoTiet']) ? $data['SoTiet'] : ''; ?>" placeholder="Số tiết là số nguyên"/>
                <?php if (!empty($errors['SoTiet'])) echo $errors['SoTiet']; ?>
            </td>
        </tr>
        <tr>
            <td>Hệ Số Môn Học</td>
            <td>
                <input type="text" name="so" value="<?php echo !empty($data['HeSoMonHoc']) ? $data['HeSoMonHoc'] : ''; ?>" placeholder="Hệ số 1 hoặc 2"/>
                <?php if (!empty($errors['HeSoMonHoc'])) echo $errors['HeSoMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="add_mon" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
    </center>
</body>
</html>