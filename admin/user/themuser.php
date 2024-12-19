<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Thêm Thành Viên</title>
</head>
<body>
<?php
require_once("../../classes/DB.class.php");
$connect=new DB();
$conn=$connect->connect();
if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
$ten="/^[a-zA-Z0-9]{6,}$/";
if(preg_match($ten,$_POST["username"])) {
    $name = $_POST["username"];
}else{
    ?>
    <script type="text/javascript">
        alert("user Khong Hop Le.!");
        window.location="themuser.php";
    </script>
    <?php
    exit();
}
$pass="/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
if(preg_match($pass,$_POST['pass'])) {
    $password = $_POST["pass"];
}else{
    ?>
    <script type="text/javascript">
        alert("pass Khong Hop Le.!");
        window.location = "themuser.php";
    </script>
    <?php
    exit();
}
    $level = $_POST["level"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ( $name == "" || $password == "" || $level == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    } else {
        //thực hiện việc lưu trữ dữ liệu vào db
        $sql = "INSERT INTO user(
    					username,
    					password,
					    level
    					) VALUES (
					    '$name',
					    '$password',
    					'$level'
    					)";
        mysqli_query($conn, $sql);
        ?>
        <script type="text/javascript">
            alert("Đã thêm Admin Thành Công")
            window.location="../index.php?mod=capnhat"
        </script>
<?php

    }
}
?>
<center><img src="../../assets/img/Ban.gif"></center>
<center><body bgcolor="#CAFFFF">
<h1>THÊM ADMIN</h1>
<a href="../index.php?mod=capnhat"><button>Trở Về</button></a>
<form action="themuser.php" method="post">
    <table>
        <tr>
            <td>Tên Đăng Nhập </td>
            <td><input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td>Mật Khẩu </td>
            <td><input type="password" id="pass" name="pass"></td>
        </tr>
        <tr>
            <td>Level </td>
            <td><select id="level" name="level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Thêm Admin"></td>
        </tr>
    </table>

</form>
</body>
</html>