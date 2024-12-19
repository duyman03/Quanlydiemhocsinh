<?php
require 'DB.class.php';
class giaovien extends DB
{
    function allgv()
    {
        $con=$this->connect();
        $sql="select * from giaovien";
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
    function selectgv($id)
    {
        $con=$this->connect();
        $sql="select * from giaovien where Magv={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    function add($id,$mon,$ten,$diachi,$sdt,$passwordgv)
    {
        $con=$this->connect();
        $sql="insert into giaovien(Magv,MaMonHoc,Tengv,DiaChi,SDT,passwordgv)
              values('$id,','$mon','$ten','$diachi','$sdt','$passwordgv')";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function edit($id,$mon,$ten,$diachi,$sdt,$passwordgv1)
    {
        $con=$this->connect();
        $sql="update giaovien set
        MaMonHoc='$mon',
        Tengv='$ten',
        DiaChi='$diachi',
        SDT='$sdt',
        passwordgv='$passwordgv1'
        where Magv=$id
        ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function dis()
    {
        $con=$this->close();
    }
    function xoa($id)
    {
        $con=$this->connect();
        $query="delete from giaovien where Magv='$id'";
        $results = mysqli_query($con,$query);
        exit();
    }
}