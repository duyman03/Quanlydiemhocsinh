

<?php
require '../classes/DB.class.php';
session_start();
$u=$_SESSION['ses_MaHS'];
$phs=$_SESSION['ses_passwordhs'];
?>
<?php
$connect=new DB();
$con=$connect->connect();
$old=$new=$pre=" ";
if(isset($_POST['hs'])){
	if($_POST['txtpasshs'] == null){
		echo "ban chua nhap mat khau.";
	}else{
		if($_POST['txtpasshs'] != $phs){
			echo "mat khau va mat khau cu khong trung.";
		}else{
			$old=$_POST['txtpasshs'];
		}
	}
	if($_POST['txtpasshs2'] == null){
		echo "ban chua nhap mat khau moi.";
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
	if($u && $phs && $old && $new && $pre){
		$query="update hocsinh SET passwordhs='$new' where MaHS=$u";
		$results = mysqli_query($con,$query);
		?>
		<script type="text/javascript">
		alert("Đã Thay doi mat khau thanh cong!");
		window.location="qlhs.php";
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

  
      <link rel="stylesheet" href="../assets/css/css/style.css">

  
</head>

<body>
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/images/hs.png">
		</div>
		<form action="repass2.php" method="post">
		<input type="password" name="txtpasshs" placeholder="mật khẩu" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasshs2" placeholder="mật khẩu mới" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasshs3" placeholder="nhập lại mật khẩu mới" required>
		<a href="" class="forgot_link">forgot ?</a>
		<button><input type="submit" name="hs" value="Thay đổi" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>