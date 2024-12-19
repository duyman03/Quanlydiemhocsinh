<?php
require '../classes/DB.class.php';
session_start();
$connect= new DB();
$con=$connect->connect();
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="login.php";
		</script>
		<?php
		exit();

	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Mật Khẩu.Vui lòng Nhập Mật Khẩu!");
		window.location="login.php";
		</script>
		<?php
		exit();
	}else{
		$p=$_POST['txtpass'];
	}
	if($u && $p){
		
		//require("../includes/config.php");

		$query="select * from user where username='$u' and password='$p'";
		$results = mysqli_query($con,$query);
		if	($numrows = mysqli_num_rows($results) == 0){
			?>
		<script type="text/javascript">
		alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
		window.location="login.php";
		</script>
		<?php
		exit();
			
		}else{
			$data=mysqli_fetch_assoc($results);
			$_SESSION['ses_username']=$data['username'];
			$_SESSION['ses_level']=$data['level'];
			$_SESSION['ses_userid']=$data['userid'];
			$_SESSION['password']=$data['password'];
			header("location:index.php");
			exit();
		}

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG QUẢN TRỊ VIÊN</title>

  
      <link rel="stylesheet" href="../assets/css/css/style.css">

  
</head>

<body>
<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRƯỜNG THPT TRẦN KHAI NGUYÊN</div>
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRANG QUẢN TRỊ</div>
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/images/boss.png">
		</div>
		<form action="login.php" method="post">
		<input type="text" name="txtuser" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpass" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">làm mới ?</a>
		<button><input type="submit" name="ok" value="Đăng Nhập" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>