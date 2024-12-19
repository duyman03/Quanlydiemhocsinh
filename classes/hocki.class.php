<?php
require 'DB.class.php';
class hocki extends DB
{
    function allquery()
    {
        $con=$this->connect();
        $sql='select * from hocky';
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
    function selectquery($id)
    {
        $con=$this->connect();
        $sql="select * from hocky where MaHocKy={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    function add($id,$ten,$heso,$namhoc)
    {
        $con=$this->connect();
        $mysql="
        insert into hocky(MaHocKy,TenHocKy,HeSoHK,NamHoc) 
        values('$id','$ten','$heso','$namhoc')";
        $query=mysqli_query($con,$mysql);
        return $query;

    }
    function edit($id,$ten,$heso,$namhoc)
{
    $con=$this->connect();
    $mysql="
    update hocky set
    TenHocKy='$ten',
    HeSoHK='$heso',
    NamHoc='$namhoc' 
    where MaHocKy=$id ";
    $query=mysqli_query($con,$mysql) ;
    return $query;
}
}