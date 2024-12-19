<?php

require '../../classes/lop.class.php';
$con=new lop();
$data= $con->alllop();
// Nếu người dùng submit form
if (!empty($_POST['themlop']))
{
    // Lay data
    // Lay data
    $malop="/^[a-zA-Z0-9]{4,10}$/";
    if(preg_match($malop,isset($_POST['malop']) ? $_POST['malop'] : '')) {
        $data['MaLopHoc'] = isset($_POST['malop']) ? $_POST['malop'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Ma Lop Khong Hop Le.!");
            window.location="themlop.php";
        </script>
        <?php
        exit();
    }
    $tenlop="/^[a-zA-Z0-9]{4,10}$/";
    if(preg_match($tenlop,isset($_POST['tenlop']) ? $_POST['tenlop'] : '')) {
        $data['Tenlophoc'] = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Ten Lop Khong Hop Le.!");
            window.location="themlop.php";
        </script>
        <?php
        exit();
    }
    $khoi="/^[10-11-12]{2}$/";
    if(preg_match($khoi,isset($_POST['khoilop']) ? $_POST['khoilop'] : '')) {
        $data['KhoiHoc'] = isset($_POST['khoilop']) ? $_POST['khoilop'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("khoi Lop Khong Hop Le.!");
            window.location="themlop.php";
        </script>
        <?php
        exit();
    }

    // Validate thong tin
    $errors = array();
    if (empty($data['MaLopHoc'])){
        $errors['MaLopHoc'] = 'Chưa nhập Mã Lớp Học';
    }

    if (empty($data['Tenlophoc'])){
        $errors['Tenlophoc'] = 'Chưa nhập tên lớp học';
    }
    if (empty($data['KhoiHoc'])){
        $errors['KhoiHoc'] = 'Chưa nhập khối học';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        $lop=$con->add($data['MaLopHoc'], $data['Tenlophoc'], $data['KhoiHoc']);
        // Trở về trang danh sách
        header("location: ../index.php?mod=lop");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Lớp Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img src="../../assets/img/Ban.gif"></center>
<center><body bgcolor="#CAFFFF">
<div>
<h1>THÊM LỚP HỌC </h1>
<a href="../index.php?mod=lop"><button>Trở về</button></a> <br/> <br/>
<form method="post" action="themlop.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã Lớp</td>
            <td>
                <input type="text" name="malop" value="<?php echo !empty($data['MaLopHoc']) ? $data['MaLopHoc'] : ''; ?>" placeholder="Mẫu:10A1 "/>
                <?php if (!empty($errors['MaLopHoc'])) echo $errors['MaLopHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Tên Lớp</td>
            <td>
                <input type="text" name="tenlop" value="<?php echo !empty($data['Tenlophoc']) ? $data['Tenlophoc'] : ''; ?>"/>
                <?php if (!empty($errors['Tenlophoc'])) echo $errors['Tenlophoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Khối</td>
            <td>
                <input type="text" name="khoilop" value="<?php echo !empty($data['KhoiHoc']) ? $data['KhoiHoc'] : ''; ?>" placeholder="nhập 10 hoặc 11 hoặc 12"/>
                <?php if (!empty($errors['KhoiHoc'])) echo $errors['KhoiHoc']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="themlop" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
    </div>
</body></center>
</html>