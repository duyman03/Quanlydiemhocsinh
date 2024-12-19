<?php
require "../classes/day.class.php";
$con = new day();
$day = $con->allday();
?>
<script type="text/javascript">
    function XacNhan() {
        if (!window.confirm('Bạn Có Chắc Muốn Xóa giáo Viên Này Không!!!')) {
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>

<head>
    <title>Lịch Dạy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1 align="center" style="font-family:Tahoma;font-weight: bold">Lịch Phân Công Dạy</h1>
    <h3 align="center"><a href="day/themday.php"><button>Thêm Lịch Dạy</button></a></h3>
    <table align="center" border="1" cellspacing="0" cellpadding="10">
        <tr style="font-weight: bold">
            <td>Mã Lịch Dạy</td>
            <td>Mã Môn Học</td>
            <td>Mã Giáo Viên</td>
            <td>Mã Lớp Học</td>
            <td>Mã Học Kỳ</td>
            <td>Mô tả</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach ($day as $item) { ?>
            <tr>
                <td><?php echo $item['MaDayHoc']; ?></td>
                <td><?php echo $item['MaMonHoc']; ?></td>
                <td><?php echo $item['Magv']; ?></td>
                <td><?php echo $item['MaLopHoc']; ?></td>
                <td><?php echo $item['MaHocKy']; ?></td>
                <td><?php echo $item['MoTaPhanCong']; ?></td>
                <td><?php echo "<a href='day/suaday.php?id=$item[MaDayHoc]'><button type='button'>Sửa</button></a>"; ?></td>
                <td> <?php echo "<a href='day/xoaday.php?id=$item[MaDayHoc]' onclick='return XacNhan();'><button type='button'>Xóa</button></a>"; ?>
                </td>
            </tr>
        <?php } ?>
        <br />
    </table>