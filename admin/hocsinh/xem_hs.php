<?php
require '../classes/hocsinh.class.php';
$con = new hocsinh();
$data = $con->alllop();
$hocsinh = $con->allhs();
if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	function XacNhan() {
		if (!window.confirm('Bạn Có Chắc Muốn Xóa Học Sinh Này Không!!!')) {
			return false;
		}
	}
</script>
<H1 align="center" style="font-family: Tahoma">Quản Lý Học Sinh</H1>
<h2 align="center"><a href="hocsinh/add_hs.php"><button type='button'>Thêm Học Sinh</button> </a></h2>
<?php
?>

<form method="get" action="index.php?mod=hs">
	<select name="malophoc" id="malophoc">
		<option value="">Chọn lớp</option>
		<?php
		foreach ($data as $lop) {
			echo "<option value='" . $lop['MaLopHoc'] . "'>" . $lop['MaLopHoc'] . "</option>";
		}
		?>

	</select>
	<input type="hidden" name="mod" value="hs">
</form>
<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
	<tr style="font-family: Tahoma;color: #0000bf;font-weight: bold">
		<td>STT</td>
		<td>Mã Học Sinh</td>
		<td>Mã Lớp Học</td>
		<td>Tên Học Sinh</td>
		<td>Giới tính</td>
		<td>Ngày Sinh</td>
		<td>Nơi Sinh</td>
		<td>Dân Tộc</td>
		<td>Họ Tên Cha</td>
		<td>Họ Tên Mẹ</td>
		<td>Sửa</td>
		<td>Xóa</td>
	</tr>
	<?php
	$stt = 0;
	foreach ($hocsinh as $row) {
		$stt++;
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>$row[MaHS]</td>";
		echo "<td>$row[MaLopHoc]</td>";
		echo "<td>$row[TenHS]</td>";
		echo "<td>$row[GioiTinh]</td>";
		echo "<td>$row[NgaySinh]</td>";
		echo "<td>$row[noisinh]</td>";
		echo "<td>$row[dantoc]</td>";
		echo "<td>$row[hotencha]</td>";
		echo "<td>$row[hotenme]</td>";

		echo "<td><a href='hocsinh/sua_hs.php?cmahs=$row[MaHS]'><button type='button'>Sửa</button></a></td>";
		echo "<td><a href='hocsinh/xoa_hs.php?cmahs=$row[MaHS]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
		echo "</tr>";
	}
	?>