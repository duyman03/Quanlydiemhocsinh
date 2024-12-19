<?php
require 'DB.class.php';
class dangnhap extends DB
{
    function alluser()
    {
        $this->connect();
        $mysql="select * from user";
        $query=mysqli_query($con,$mysql);
        $result=array();
        if ($query)
        {
            while ($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectuser($id,$pass)
    {
        $this->connect();
        $mysql="select * from user where userid={$id} and password={$pass}";
        $query=mysqli_query($con,$mysql);
        $result=array();
        if(mysqli_num_rows($query)>0)
        {
            $row=mysqli_fetch_assoc($query);
            $result[]=$row;
        }
        return $result;
    }

}