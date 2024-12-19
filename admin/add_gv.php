<?php
session_start();
require("../classes/giaovien.class.php");
$m=$t=$dc=$dt=$p="";

if(isset($_POST['ok'])){
	$con=new giaovien();
	if($_POST['txtmagv'] == null){
		echo "Bạn Chưa Nhập Mã Giao Vien!!!<br/>";
	}else{
		$rule="/^[0-9]{4}$/";
		if(preg_match($rule,$_POST['txtmagv'])) {
			$m = $_POST['txtmagv'];
		}
		else{
			?>
			<script type="text/javascript">
				alert("Ma Giao Vien Khong Hop Le.!");
				window.location="add_gv.php";
			</script>
			<?php
			exit();

		}
	}
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$t=$_POST['txtten'];
	}
	if($_POST['txtdiachi'] == null){
		echo "Bạn Chưa Nhập Vào Dia Chi";
	}else{
		$dc=$_POST['txtdiachi'];
	}
	if($_POST['txtdienthoai'] == null){
		echo "Bạn Chưa Nhập Vào Số Điện Thoại";
	}else{
		$dienthoai="/^[0-9]{10,11}$/";
		if(preg_match($dienthoai,$_POST['txtdienthoai'])) {
			$dt = $_POST['txtdienthoai'];
		}else{
			?>
			<script type="text/javascript">
				alert("So Dien Thoai Khong Hop Le.!");
				window.location="add_gv.php";
			</script>
			<?php
			exit();
		}
	}
	if($_POST['txtpass'] == null){
		echo "Bạn Chưa Nhập Mật Khẩu";
	}else{
		$pass="/^[a-zA-Z0-9]{6,}$/";
		if(preg_match($pass,$_POST['txtpass'])) {
			$p = md5($_POST['txtpass']);
		}
		else{
			?>
			<script type="text/javascript">
				alert("Password Nhap Vao Khong Hop Le.!");
				window.location="add_gv.php";
			</script>
			<?php
			exit();
		}
	}

	$mamon=$_POST['mamonhoc'];
	

	if($m && $mamon && $t && $dc && $dt && $p ){
		$giaovien=$con->add($m,$mamon,$t,$dc,$dt,$p);
		?>
		<script type="text/javascript">
		alert("Ban Da Them Giao Vien Thành Công.!");
		window.location="index.php?mod=gv";
		</script>
		<?php
		exit();
		require ("../classes/DB.class.php");
	}
}
?>
<center><img src="../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
	<h1 align="center">Trang Thêm giáo viên</h1>
<form action="add_gv.php" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
			<td>Mã giáo viên:</td>
			<td>  <input type="text" name="txtmagv" size="25" placeholder="Mã giáo viên là số 4 ký tự"/><br/>
			</td>
		</tr>
<tr>
			<td>Mã Môn Học</td>
				<td><select name="mamonhoc">
					<?php
					$db=new DB();
					$conn=$db->connect();
					$query="select * from monhoc";
					$results = mysqli_query($conn,$query);
					while ($data = mysqli_fetch_assoc($results)) {
				echo "<option value='$data[MaMonHoc]'>$data[MaMonHoc]</option>";
						$di=$db->close();
			}
					?>

				</select></td>
		</tr>
<tr>
			<td>Tên giáo viên:</td>
			<td><input type="text" name="txtten" size="25"/></td>
		</tr>
<tr>
			<td>Địa Chỉ: </td>
			<td><textarea type="text" name="txtdiachi"> </textarea></td>
		</tr>
<tr>
			<td>Điện Thoại:</td>
			<td><input type="text" name="txtdienthoai" size="25" placeholder="Số từ 9 đến 11 số không âm"/> </td>
		</tr>
<tr>
			<td>Password giáo viên:</td>
			<td><input type="password" name="txtpass" size="25" placeholder="Mật khẩu trên 6 kí tự"/></td>
		</tr>

<tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Thêm giáo viên" /><br/>
			</td>
		</tr>
</table>
</form>
</body>