<?php
session_start();
$m=$malop=$t=$gt=$ns=$nois=$dt=$cha=$me=$p="";
require "../../classes/hocsinh.class.php";
$con=new hocsinh();
if(isset($_POST['ok'])) {
	if ($_POST['txtmahs'] == null) {
		echo "Bạn Chưa Nhập Mã Học Sinh!<br/>";
	} else {
		$rule="/^[0-9]{6}$/";
		if(preg_match($rule,$_POST['txtmahs'])) {
			$m = $_POST['txtmahs'];
		}
		else{
			?>
			<script type="text/javascript">
				alert("Ma Hoc Sinh Khong Hop Le.!");
				window.location="add_hs.php";
			</script>
			<?php
			exit();

		}
	}
	if($_POST['malophoc'] != null)
	{
		$malop=$_POST['malophoc'];
	}
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Tên Học Sinh";
	}else{
		$hoten="/^[a-zA-Z'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ� �ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ� ��ỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
		if(preg_match($hoten,$_POST['txtten'])) {
			$t = $_POST['txtten'];
		}else{
			?>
			<script type="text/javascript">
				alert("Ho Ten Hoc Sinh Khong Hop Le.!");
				window.location="add_hs.php";
			</script>
			<?php
			exit();
		}
	}
	/*if($_POST['txtgt'] == null){
		echo "Bạn Chưa Nhập Vào giới tính";
	}else{
		$gt=$_POST['txtgt'];
	}*/
	if($_POST['txtgt']==1) {
		$gt ="Nam";
	}
	else {
		$gt ="Nữ";
	}
	if($_POST['txtngs'] == null){
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	}else{
		$ns=$_POST['txtngs'];
	}
	if($_POST['txtns'] == null){
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	}else{
		$nois=$_POST['txtns'];
	}
	if($_POST['txtdantoc'] == null){
		echo "Bạn Chưa Nhập Vào Dân Tộc";
	}else{
		$dt=$_POST['txtdantoc'];
	}
	if($_POST['txtcha'] == null){
		echo "Bạn Chưa Nhập Vào Họ Tên Cha";
	}else{
		$cha=$_POST['txtcha'];
	}
	if($_POST['txtme'] == null){
		echo "Bạn Chưa Nhập Vào Họ Tên Mẹ";
	}else{
		$me=$_POST['txtme'];
	}
	if($_POST['txtpasshs'] == null){
		echo "Bạn Chưa Nhập Mật Khẩu Học Sinh";
	}else{
		$pass="/^[a-zA-Z0-9]{6,}$/";
		if(preg_match($pass,$_POST['txtpasshs'])) {
			$p = md5($_POST['txtpasshs']);
		}
		else{
			?>
			<script type="text/javascript">
				alert("Password Nhap Vao Khong Hop Le.!");
				window.location="add_hs.php";
			</script>
			<?php
			exit();
		}
	}

	if($m && $malop && $t && $gt && $ns && $nois && $dt && $cha &&$me && $p ){
		$hocsinh=$con->add($m,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		?>
		<script type="text/javascript">
		alert("Bạn Đã Thêm Học Sinh Thành Công.Nhấn OK Để Tiếp Tục Thêm Học Sinh!");
		window.location="../index.php?mod=hs";
		</script>
		<?php
		exit();
		require("../../classes/DB.class.php");
		
		
	}
}
?>
<style type="text/css">
	#menu table td
{
	font-weight: bold;
}
</style>
<body bgcolor="#CAFFFF">
<center><img src="../../assets/img/Ban.gif"></center>
	<h1 align="center">Trang Thêm Học Sinh</h1>
<form action="add_hs.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
			<td>Mã Học Sinh:</td>
			<td>  <input type="text" name="txtmahs" size="25" placeholder="6 số nguyên từ 0-9"/><br/>
			</td>
		</tr>
<tr>
			<td>Mã Lớp Học</td>
			<td><select name="malophoc">

				<?php
				$connect=new db();
				$conn=$connect->connect();
				$query="select * from lophoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
		}
				?>

			</select></td>
		</tr>
<tr>
			<td>Tên Học Sinh</td>
			<td><input type="text" name="txtten" size="25" /></td>
		</tr>
<tr>
			<td>giới tính</td>
			<td><input type="radio" name="txtgt" value="1">Nam
			    <input type="radio" name="txtgt" value="2">Nữ
			</td>
		</tr>
<tr>
			<td>Ngày Sinh:</td>
			<td><input type="date" name="txtngs" size="25" /> </td>
		</tr>
		<tr>
			<td>Nơi Sinh:</td>
			<td><input type="text" name="txtns" size="25" /> </td>
		</tr>
		<tr>
			<td>Dân Tộc:</td>
			<td><input type="text" name="txtdantoc" size="25" /> </td>
		</tr>
		<tr>
			<td>Họ Tên Cha:</td>
			<td><input type="text" name="txtcha" size="25" /> </td>
		</tr>
		<tr>
			<td>Họ Tên Mẹ:</td>
			<td><input type="text" name="txtme" size="25" /> </td>
		</tr>
<tr>
			<td>Password Học Sinh:</td>
			<td><input type="password" name="txtpasshs" size="25" placeholder="Trên 6 kí tự"/></td>
		</tr>
<tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Thêm Học Sinh" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>
