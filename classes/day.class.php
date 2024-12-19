<?php
require "DB.class.php";
class day extends DB
{
    function allday()
    {
        $con = $this->connect();
        $sql = "select * from day";
        $query = mysqli_query($con, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function selectday($id)
    {
        $con = $this->connect();
        $sql = "select * from day where MaDayHoc={$id}";
        $query = mysqli_query($con, $sql);
        $result = array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }

    function add($id, $gv, $mon, $lop, $hk, $mota)
    {
        $con = $this->connect();
        $sql = "insert into day(MaDayHoc,MaMonHoc,Magv,MaLopHoc,MaHocKy,MoTaPhanCong)
        values('$id','$mon', $gv, '$lop','$hk','$mota')
 ";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function update($id, $gv, $mon, $lop, $hk, $mota, $maDayHoc)
    {
        $con = $this->connect();
        $sql = "UPDATE day SET 
        MaDayHoc ='" . $id . "', 
        MaMonHoc ='" . $mon . "',
        Magv='" . $gv . "',
        MaLopHoc='" . $lop . "',
        MaHocKy='" . $hk . "',
        MoTaPhanCong='" . $mota . "' WHERE MaDayHoc = '" . $maDayHoc . "'";

        $query = mysqli_query($con, $sql);
        return $query;
    }
}
