<?php
session_start();
$a=$_SESSION['ses_Magv'];
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <div class="banner">
        <center><img src="../../assets/img/Ban.gif"></center>
</div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Nhập Điểm</title>

</head>
<body bgcolor="#CAFFFF">
<?php

?>
<center><h1>TRANG NHẬP ĐIỂM</h1></center>
<form action="add_chon2.php" method="post">
    <div style="text-align:center">
        <select name="day" style="width:100px;height: 25px ">
            <?php
            $query="SELECT * FROM `day` WHERE `Magv` = '".$a."' GROUP BY `MaLopHoc` ";
            $results=mysqli_query($conn,$query);
            while($data=mysqli_fetch_assoc($results)){
                echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                $_SESSION['malop']=$data['MaLopHoc'];
            }
            ?>
        </select>
        <select name="mon" style="width:100px;height: 25px" >
            <?php
            $query2="SELECT * FROM `day` WHERE `Magv` = '".$a."' GROUP BY `MaMonHoc` ";
            $results2=mysqli_query($conn,$query2);
            while($data2=mysqli_fetch_assoc($results2)){
                echo "<option value='$data2[MaMonHoc]'>$data2[MaMonHoc]</option>";
                $_SESSION['mamon']=$data2['MaMonHoc'];
            }
            ?>

        </select>
        <select name="hk" style="width:100px;height: 25px">
            <?php
            $query3="select * from hocky";
            $results3=mysqli_query($conn,$query3);
            while($data3=mysqli_fetch_assoc($results3)){
                echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
                $_SESSION['mahk']=$data3['MaHocKy'];
            }
            ?>

        </select>
        <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

    </div>
</form>
<?php
$dayhoc=$monhoc=$hk="";
if(isset($_POST['add'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hk = $_POST['hk'];
    if ($dayhoc && $monhoc && $hk) {
        //header('location:add_diem.php');
        // $ma=$lop=$hk=$mon=$mieng=$p1=$p2=$t1=$t2=$d="";
        if (isset($_POST['themdiem'])) {
            $query = "select * from hocsinh";
            $results = mysqli_query($conn, $query);
            for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
                //if ($row['MaLopHoc'] == $_POST['day']) {
                    $ma = $_POST["ma$i"];
                    $lop = $_POST["lop$i"];
                    $mon = $_POST["mon$i"];
                    $hk = $_POST["hk$i"];
                    $diem="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($diem,$_POST["diem$i"])) {
                    $mieng = $_POST["diem$i"];
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Ban Nhap Diem mieng Khong Hop Le!");
                        window.location="add_diemhs.php";
                    </script>
                <?php
                exit();
                    }
                $diem1="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($diem1,$_POST["diem1$i"])) {
                    $p1 = $_POST["diem1$i"];
                }
                else{
                ?>
            <script type="text/javascript">
            alert("Ban Nhap Diem 15 phut lan 1 Khong Hop Le!");
            window.location="add_diemhs.php";
                </script>
                <?php
            exit();
                }
                $p22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if(preg_match($p22,$_POST["diem2$i"])) {
                    $p2 = $_POST["diem2$i"];
                }
                else{
                ?>
            <script type="text/javascript">
            alert("Ban Nhap Diem 15 phut lan 2 Khong Hop Le!");
            window.location="add_diemhs.php";
             </script>
             <?php
            exit();
                }
             $t11="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
             if(preg_match($t11,$_POST["diem3$i"])) {
                 $t11 = $_POST["diem3$i"];
                         }
                         else{
                         ?>
                <script type="text/javascript">
                    alert("Ban Nhap Diem 1 tiet lan 1 Khong Hop Le!");
                    window.location="add_diemhs.php";
                </script>
            <?php
            exit();
            }
            $t22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
            if(preg_match($t22,$_POST["diem4$i"])) {
                $t2 = $_POST["diem4$i"];
            }
            else{
            ?>
            <script type="text/javascript">
        alert("Ban Nhap Diem 1 tiet lan 2 Hop Le!");
        window.location="add_diemhs.php";
             </script>
        <?php
        exit();
            }
        $dt="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($dt,$_POST["diem5$i"])) {
            $d = $_POST["diem5$i"];
        }
        else{

        ?>
        <script type="text/javascript">
        alert("Ban Nhap Diem Thi Khong Hop Le!");
        window.location="add_diemhs.php";
         </script>

        <?php
        exit();
        }
                    $tb = $_POST["diem6$i"];
                    $sql = "insert into diem(MaHocKy,MaMonHoc,MaHS,MaLopHoc,DiemMieng,Diem15Phut1,Diem15Phut2,Diem1Tiet1,Diem1Tiet2,DiemThi,DiemTB )
 							values('" . $hk . "','" . $mon . "','" . $ma . "','" . $lop . "','" . $mieng . "','" . $p1 . "','" . $p2 . "','" . $t1 . "','" . $t2 . "','" . $d . "','" . $tb . "')";
                    $results1 = mysqli_query($conn, $sql);
                    header('location:add_diemhs.php');

                //}
            }
        }
    }
    ?>
    <br/>
    <table border="1" cellspacing="0" cellpadding="1">
        <tr style="font-weight: bold">
            <td>Mã Học Sinh</td>
            <td>Tên Học Sinh</td>
            <td>Lớp</td>
            <td>Môn Học</td>
            <td>Học Kỳ</td>
            <td>Điểm Miệng</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 1 Tiết</td>
            <td>Điểm 1 Tiết</td>
            <td>Điểm Thi</td>
            <td>Điểm TB</td>
        </tr>
        <?php
        $query="select * from hocsinh";
        $results=mysqli_query($conn, $query);
        ?>
        <form action="add_diemhs.php " method="post">
            <hr>
            <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold" >
                <div>Danh Sách Lớp: <?php echo $_POST['day'] ?></div>
                <div> Mã Môn Học: <?php echo $_POST['mon'] ?></div>
                <div> Mã Học Kỳ: <?php echo $_POST['hk'] ?></div>
                <div> Mã Giáo Viên Nhập Điểm: <?php echo $_SESSION['ses_Magv'] ?></div>
            </div>
            <hr>
            <div>
                <div style="text-align: right;float: left">
                    <a href="../qlgv.php"><button type='button'>Trở Về</button></a>
                </div>
                <div style="text-align: right">
                    <input type="submit" name="themdiem" value="Thêm Điểm"/>
                </div>
            </div>
            <hr>
            <?php
            for($i=1;$i<=($row=mysqli_fetch_assoc($results));$i++) {
                if ($row['MaLopHoc'] == $_POST['day']) {
                    echo "<tr>"; ?>
                    <td><input style="width:90px" type="text" name="ma<?php echo $i; ?>"
                               value="<?php echo "$row[MaHS]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:200px" type="text" name="ten<?php echo $i; ?>"
                               value="<?php echo "$row[TenHS]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:70px" type="text" name="lop<?php echo $i; ?>"
                               value="<?php echo $_POST['day'] ?>" readonly="readonly"/></td>
                    <td><input style="width:90px" type="text" name="mon<?php echo $i; ?>"
                               value="<?php echo $_POST['mon'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="hk<?php echo $i; ?>"
                               value="<?php echo $_POST['hk'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="diem<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem1<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem2<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem3<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem4<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem5<?php echo $i; ?>"/></td>
                    <td><input style="width:100px" type="text" name="diem6<?php echo $i; ?>"
                               readonly="readonly"/></td>

                    </tr>
                    <?php
                }
            }?>
        </form>
    </table>
    <hr>
    <?php
}

?>
</body>
