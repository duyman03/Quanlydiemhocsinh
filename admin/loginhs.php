<?php
session_start();
require '../classes/DB.class.php';
$connect=new DB();
$con=$connect->connect();
$uhs=$phs="";
if(isset($_POST['hs'])){
	if($_POST['txtuserhs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="loginhs.php";
		</script>
		<?php
		exit();
	}else{
		$uhs=$_POST['txtuserhs'];

	}
	if($_POST['txtpasshs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
		window.location="loginhs.php";
		</script>
		<?php
		exit();
	}
	else{
		$phs=$_POST['txtpasshs'];
	}
	if($uhs && $phs){
		
		//require("../includes/config.php");
		

		$query="select * from hocsinh where MaHS='$uhs' and passwordhs='$phs'";
		$results = mysqli_query($con,$query);
		if($rowcount=mysqli_num_rows($results) ==0) {
				?>
				<script type="text/javascript">
					alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
					window.location = "loginhs.php";
				</script>
				<?php
				exit();
			} else {
				$data=mysqli_fetch_assoc($results);
				$_SESSION['ses_MaHS'] = $data['MaHS'];
				$_SESSION['ses_passwordhs']=$data['passwordhs'];
				header("location:qlhs.php");
				exit();
			}
		}
	$dis=$con->close();
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG ĐĂNG NHẬP HỌC SINH</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="../assets/css/css/style.css">

  
</head>

<body>
<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRƯỜNG THPT TRẦN KHAI NGUYÊN</div>
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRA CỨU ĐIỂM</div>
  <div class="wrap" style="margin-top:30px">
		<div class="avatar">
      <img src="../assets/img/images/hs.png">
		</div>
		<form action="loginhs.php" method="post">
		<input type="text" name="txtuserhs" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasshs" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">Làm mới lại?</a>
		<button><input type="submit" name="hs" value="Đăng Nhập" /></button>
	</form>
	</div>
<br/>
<div style="border: 1px solid #CDCDCD;background-color: #e4e0d8;width: 500px;margin-left: 440px;font-family: Tahoma">
	<h6 style="font-weight: bold">Một số hướng dẫn cần thiết :</h6>
	<li>Đối tượng sử dụng : Học Sinh THPT Trần Khai Nguyên.</li>
	<li>Sinh viên đăng nhập vào hệ thống bằng mã số học sinh.</li>
	<li>Mật khẩu mặc định là mã số học sinh.</li>
	<li>Khi truy cập lần thứ nhất, học sinh lưu ý :</li>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Phải thay đổi mật khẩu.</h6>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Trong quá trình truy cập, nếu có thắc mắc gì hay quên</h6>
		<h6>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp mật khẩu truy cập học sinh liên hệ nhà trường tạo qua</h6>
			<h6>&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspđịa chỉ email: quanlyhs@gmail.com.</h6>
</div>
    <script src="js/index.js"></script>

</body>&nbsp
</html>