<?php

require 'DB.class.php';
class hocsinh extends DB
{
    function allhs()
    {
        $con = $this->connect();
        $malophoc = $_GET['malophoc'] ?? '';
        if ($malophoc) {
            $sql = "select * from hocsinh WHERE MaLopHoc = '" . $malophoc . "'";
        } else {
            $sql = "select * from hocsinh";
        }

        $query = mysqli_query($con, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function selecths($id)
    {
        $con = $this->connect();
        $mysql = "select * from hocsinh where MaHS={$id}";
        $query = mysqli_query($con, $mysql);
        $result = array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    function  add($id, $lop, $ten, $gt, $ngs, $ns, $dt, $htc, $htm, $pw)
    {
        $con = $this->connect();
        $sql = "insert into hocsinh(MaHS,MaLopHoc,TenHS,GioiTinh,NgaySinh,noisinh,dantoc,hotencha,hotenme,passwordhs)
              values('$id','$lop','$ten','$gt','$ngs','$ns','$dt','$htc','$htm','$pw')
        ";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function edit($id, $lop, $ten, $gt, $ngs, $ns, $dt, $htc, $htm, $pw)
    {
        $con = $this->connect();
        $sql = "update hocsinh set
        MaLopHoc='$lop',
        TenHS='$ten',
        GioiTinh='$gt',  
        NgaySinh='$ngs',
        noisinh='$ns',
        dantoc='$dt',
        hotencha='$htc',
        hotenme='$htm',
        passwordhs='$pw',
        where MaHS='$id'";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function alllop()
    {
        $con = $this->connect();
        $sql = "select * from lophoc";
        $query = mysqli_query($con, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }

        return $result;
    }
}
