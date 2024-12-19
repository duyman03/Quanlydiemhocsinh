<?php
require '../classes/lop.class.php';
$con=new lop();
$lop=$con->alllop();
?>
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn Có Chắc Muốn Xóa Lớp Này Không?')){
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Các Lớp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1 align="center" style="font-family: Tahoma">Danh Sách Lớp</h1>
<h3 align="center"><a href="lop/themlop.php" style="font-family: Tahoma;font-weight: bold;text-decoration: none"><button>Thêm Lớp</button></a></h3>
<table border="1" cellspacing="0" cellpadding="10" align="center">
    <tr>
        <td>Mã Lớp</td>
        <td>Tên Lớp</td>
        <td>Khối</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php foreach ($lop as $item){ ?>
        <tr>
            <td><?php echo $item['MaLopHoc']; ?></td>
            <td><?php echo $item['Tenlophoc']; ?></td>
            <td><?php echo $item['KhoiHoc']; ?></td>
            <?php
            echo "<td><a href='lop/sualop.php?id=$item[MaLopHoc]'><button type='button'>Sửa</button></a></td>";
            echo "<td><a href='lop/xoalop.php?cmahk=$item[MaLopHoc]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
            ?>
        </tr>
    <?php } ?>
</table>
</body>
</html>