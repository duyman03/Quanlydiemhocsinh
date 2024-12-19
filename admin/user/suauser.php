
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thông tin thành viên</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<center><img src="../../assets/img/Ban.gif"></center>
<center><body bgcolor="#CAFFFF">
<div class="container">
    <div class="row">
        <?php
        require_once("ketnoiuser.php");

        if (isset($_POST["save"])) {
            $id_user = $_POST["id_user"];
            $name = $_POST["name"];
            //$password = $_POST["password"];
            $level = $_POST["level"];
            $sql = "update user set username = '$name', level = '$level' where userid = $id_user";
            mysqli_query($conn, $sql);
            header("location:hienthiuser.php");
        }

        $id = "";
        $name = "";
        //$password = "";
        $level = "";
        if (isset($_GET["id"])) {
            //thực hiện việc lấy thông tin user
            $id = $_GET["id"];
            $sql = "select * from user where userid = $id";
            $query = mysqli_query($conn, $sql);
            while ( $data = mysqli_fetch_array($query) ) {
                $name = $data["username"];
                $level = $data["level"];
            }
        }
        ?>
        <h3> THÔNG TIN ADMIN</h3>
        <form method="POST" name="fr_update">
            <table class="table">
                <caption>Sửa Admin</caption>
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <tr><td>Tên Đăng Nhập : </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
                <tr>
                    <td>Cấp độ : </td>
                    <td>
                        <select name="level">
                            <option value="1" <?php echo ($level == 1)?"selected":""; ?>>Administrator</option>
                            <option value="2" <?php echo ($level == 2)?"selected":""; ?>>Adminstrator Dyaminic</option>
                        </select>
                    </td>
                </tr>
                <tr><td colspan="2"><input type="submit" name="save" value="Lưu thông tin"></td></tr>
            </table>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>


</body></html>