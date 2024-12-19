<?php
require 'DB.class.php';
class monhoc extends DB
{
    function allmon()
    {
        $con=$this->connect();
        $sql="select * from monhoc";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectmon($id)
    {
        $conn=$this->connect();
        $query="select * from monhoc where MaMonHoc='$id'";
        $mang=array();
        $results = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($results);
        $mang=$row;
        return $mang;
    }
    function add($id,$ten,$sotiet,$heso)
    {
        $con=$this->connect();
        $sql="insert into monhoc(MaMonHoc,TenMonHoc,SoTiet,HeSoMonHoc)
        values('$id','$ten','$sotiet','$heso')
        ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function edit($id,$ten,$sotiet,$heso)
    {
        $con=$this->connect();
        $sql="
        update monhoc set
        TenMonHoc='$ten',
        SoTiet='$sotiet',
        HeSoMonHoc='$heso'
        where MaMonHoc='$id'
        ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function xoa($id)
    {
        $con=$this->connect();
        $sql="delete from monhoc where MaMonHoc='$id'";
        $query=mysqli_query($con,$sql);
        return $query;
    }

}

?>