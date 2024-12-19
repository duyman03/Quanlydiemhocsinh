

<?php
session_start();
$u=	$_SESSION['ses_userid'];
$pgv=$_SESSION['password'];

?>
<?php
$old=$new=$pre=" ";
if(isset($_POST['gv'])){
    if($_POST['txtpassgv'] == null){
        echo "ban chua nhap mat khau.";
    }else{
        if($_POST['txtpassgv'] != $pgv){
            echo "Mật Khẩu nhập không đúng";
        }else{
            $old=$_POST['txtpassgv'];
        }
    }
    if($_POST['txtpassgv2'] == null){
        echo "ban chua nhap mat khau moi.";
    }else{
        if($_POST['txtpassgv2'] != $_POST['txtpassgv3']){
            echo "mat khau nhap vao khong trung nhau";
        }else{
            if($_POST['txtpasshs2'] != $_POST['txtpasshs3']){
                echo "mat khau nhap vao khong trung nhau";
            }else{
                $mk="/^[a-zA-Z0-9]{6,}$/";
                if(preg_match($mk,$_POST["txtpasshs2"])) {
                    $new = $_POST['txtpasshs2'];
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Password Nhap Vao Khong Hop Le.!");
                        window.location="repass2.php";
                    </script>
                    <?php
                    exit();
                }
            }
        }
    }
    if($u && $pgv && $old && $new && $pre){
        $connect=new db();
        $conn=$connect->connect();
        //require("../../includes/config.php");
        $query="update user SET password='$new' where username=$u";
        $results = mysqli_query($conn,$query);
        ?>
        <script type="text/javascript">
            alert("Đã Thay doi mat khau thanh cong!");
            window.location="../index.php?mod=capnhat";
        </script>
        <?php
        exit();

    }
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Thay Đổi Mât Khẩu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


    <link rel="stylesheet" href="../../assets/css/css/style.css">


</head>

<body>
<div class="wrap">
    <div class="avatar">
        <img src="../../assets/img/images/gv.jpg">
    </div>
    <form action="doimatkhau.php" method="post">
        <input type="password" name="txtpassgv" placeholder="mật khẩu" required>
        <div class="bar">
            <i></i>
        </div>
        <input type="password" name="txtpassgv2" placeholder="mật khẩu mới" required>
        <div class="bar">
            <i></i>
        </div>
        <input type="password" name="txtpassgv3" placeholder="nhập lại mật khẩu mới" required>
        <a href="" class="forgot_link">forgot ?</a>
        <button><input type="submit" name="gv" value="Thay đổi" /></button>
    </form>
</div>

<script src="js/index.js"></script>

</body>
</html>