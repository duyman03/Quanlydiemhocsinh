<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý Thành Viên</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<center><img src="../../assets/img/Ban.gif"></center>
<center><body bgcolor="#CAFFFF">
<?php
require "../../classes/DB.class.php";
$connect=new db();
$conn=$connect->connect();
?>
<div class="container">
    <div class="row">
        <h3 style="font-weight: bold"> QUẢN LÝ QUẢN TRỊ VIÊN</h3>
        <a href="../index.php?mod=capnhat" style="color: #1a1a1a;font-weight: bold"><button>Trở Về</button></a>
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên Đăng Nhập</th>
                <th>Cấp độ</th>
                <th>Chức Năng</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 1 ;
            $sql = "SELECT * FROM user";
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $stt++ ?></th>
                    <td><?php echo $data["username"]; ?></td>
                    <td>
                        <?php
                        if ($data["level"] == 1) {
                            echo "Administrator";
                        }else{
                            echo "Administrator Dynamic";
                        }
                        ?>
                    </td>
                    <td><a href="xoauser.php?id=<?php echo $data["username"]; ?>">Xóa</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>


</body></center></html>