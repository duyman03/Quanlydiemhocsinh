
<?php
require "../includes/config.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Danh sách học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body bgcolor="#CAFFFF">
<br/>
<h1 class="h1" style="font-family:Tahoma;text-align: center;" >Điểm Học Sinh</h1>
<h2 align="center">

    <form action="qlgv.php?mod=hs" method="post">
        <div style="text-align:center">
            <select name="hk" style="width:100px;height: 25px ">
                <?php
                $query="select MaHocKy from hocky";
                $results=mysqli_query($conn,$query);
                while($data=mysqli_fetch_assoc($results)){
                    echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                }
                ?>
            </select>
            <select name="lop" style="width:100px;height: 25px" >
                <?php
                $query2="select * from lophoc";
                $results2=mysqli_query($conn,$query2);
                while($data2=mysqli_fetch_assoc($results2)){
                    echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                }
                ?>

            </select>
            <select name="mon" style="width:100px;height: 25px">
                <?php
                $query3="select * from monhoc";
                $results3=mysqli_query($conn,$query3);
                while($data3=mysqli_fetch_assoc($results3)){
                    echo "<option value='$data3[MaMonHoc]'>$data3[MaMonHoc]</option>";
                }
                ?>

            </select>
            <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

        </div>
    </form>
    <form action="xemdiem_gv.php" method="post">
</h2>
<table width="73%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr class="diem" style="font-weight: bold;color: #0A246A">
        <td>Mã Học Sinh</td>
        <td>Tên Học Sinh</td>
        <td>Mã Lớp</td>
        <td>Mã Học Kỳ</td>
        <td>Mã Môn Học</td>
        <td>Điểm Miệng</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm Thi</td>
        <td>Điểm TB môn</td>
    </tr>
    <?php
    ?>
    <?php
    require "../classes/diem.class.php";
    $connect=new diem();
    $students=$connect->alldiem();
    if(isset($_POST['add'])) {
        foreach ($students as $item) {
            
            if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {

                ?>
                <tr>
                    <td><?php echo $item['MaHS']; ?></td>
                    <td><?php echo $item['TenHS']; ?></td>
                    <td><?php echo $item['MaLopHoc']; ?></td>
                    <td><?php echo $item['MaHocKy']; ?></td>
                    <td><?php echo $item['MaMonHoc']; ?></td>
                    <td><?php echo $item['DiemMieng']; ?></td>
                    <td><?php echo $item['Diem15Phut1']; ?></td>
                    <td><?php echo $item['Diem15Phut2']; ?></td>
                    <td><?php echo $item['Diem1Tiet1']; ?></td>
                    <td><?php echo $item['Diem1Tiet2']; ?></td>
                    <td><?php echo $item['DiemThi']; ?></td>
                    <?php
                    
                    $tinh = (intval($item['DiemMieng']) + intval($item['Diem15Phut1']) + intval($item['Diem15Phut2']) + (intval($item['Diem1Tiet1']) + intval($item['Diem1Tiet2'])) * 2 + intval($item['DiemThi']) * 3) / 10;
                    $item['DiemTB'] = $tinh;
                    ?>
                    <td><?php echo round($item['DiemTB'], 1); ?></td>
                </tr>
                <?php
            }
        }
    }
    ?>
</table>
</form>
</body>
</html>