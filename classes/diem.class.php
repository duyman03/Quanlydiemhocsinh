<?php
require 'DB.class.php';
class diem extends DB
{
    function alldiem()
    {
        $con=$this->connect();
        $sql = "select * from diem,hocsinh,monhoc,hocky WHERE diem.MaHS=hocsinh.MaHS && diem.MaMonHoc=monhoc.MaMonHoc && diem.MaHocKy=hocky.MaHocKy";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while ($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectdiem($id)
    {
        $con=$this->connect();
        $sql="select * from diem where MaDiem={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if(mysqli_num_rows($query)>0)
        {
            $row=mysqli_fetch_assoc($query);
            $result[]=$row;
        }
        return $result;
    }
    function dong()
    {
    $dis=$this->close();
        return $dis;
    }
}
?>