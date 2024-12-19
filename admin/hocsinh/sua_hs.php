<?php
session_start();
require "../../classes/hocsinh.class.php";
$con=new hocsinh();
require "../../includes/config.php";
$mahs=$_GET['cmahs'];
$malop=$t=$gt=$ns=$nois=$dt=$cha=$me=$p="";
if(isset($_POST['ok'])){
	if($_POST['txtmalop'] == null){
		echo "ban chua nhap ma lop hoc";
	}else{
		$malop=$_POST['txtmalop'];
	}
	if($_POST['txtten'] == null){
		echo "ban chua nhap ten";
	}else{
		$t=$_POST['txtten'];
	}
	if($_POST['txtgt'] == null){
		echo "Bạn Chưa Nhập Vào giới tính";
	}else{
		$gt=$_POST['txtgt'];
	}
	if($_POST['txtns'] == null){
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	}else{
		$ns=$_POST['txtns'];
	}
	if($_POST['txtnois'] == null){
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	}else{
		$nois=$_POST['txtnois'];
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
		echo "Bạn Chưa Nhập Vào  Pass Học Sinh";
	}else{
		$p=$_POST['txtpasshs'];
	}
	if( $mahs && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p){
		//$hs=$con->edit($mahs,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		$query="update hocsinh set MaLopHoc='$malop',TenHS='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',
		hotencha='$cha',hotenme='$me',passwordhs='$p' where MaHS='$mahs'";
		$results = mysqli_query($conn,$query);
		header("location:../index.php?mod=hs");
		exit();
	}
	
}
$row=$con->selecths($mahs);
?>
<center><img src="../../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
<h1 style="text-align: center">TRANG SỬA HỌC THÔNG TIN HỌC SINH</h1>
<table align="center" border="1" cellspacing="0" cellpadding="10">
<form action="sua_hs.php?cmahs=<?php echo $row['MaHS']; ?>" method="post">
	<tr>
		<td>Mã Lớp Học</td>
			<td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaLopHoc']; ?>" /></td>
		</tr>

		<tr>
		<td>Tên Học Sinh</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $row['TenHS']; ?>" /></td>
		</tr>
		<tr>
			<td>giới tính</td>
			<td><input type="radio" name="txtgt" value="Nam" value="<?php echo $row['GioiTinh']; ?>">Nam
			    <input type="radio" name="txtgt" value="Nữ" value="<?php echo $row['GioiTinh']; ?>">Nữ 
			</td>
		</tr>
		<tr>
			<td>Ngày Sinh:</td>
			<td><input type="date" name="txtns" size="25" value="<?php echo $row['NgaySinh']; ?>" /> </td>
		</tr>
		<tr>
			<td>Nơi Sinh:</td>
			<td><input type="text" name="txtnois" size="25" value="<?php echo $row['noisinh']; ?>"/> </td>
		</tr>
		<tr>
			<td>Dân Tộc:</td>
			<td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['dantoc']; ?>"/> </td>
		</tr>
		<tr>
			<td>Họ Tên Cha:</td>
			<td><input type="text" name="txtcha" size="25" value="<?php echo $row['hotencha']; ?>"/> </td>
		</tr>
		<tr>
			<td>Họ Tên Mẹ:</td>
			<td><input type="text" name="txtme" size="25" value="<?php echo $row['hotenme']; ?>"/> </td>
		</tr>
<tr>
			<td>Password Học Sinh:</td>
			<td><input type="password" name="txtpasshs" size="25" value="<?php echo $row['passwordhs']; ?>" /></td>
		</tr>
	
	</tr>

			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</form>
</TABLE>
</body>