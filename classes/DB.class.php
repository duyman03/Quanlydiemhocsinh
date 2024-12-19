<?php
class DB
{
	var $host = 'localhost';
    	var $user = 'root';
    	var $pass = '';
    	var $db = 'quanlydiem';
    var $myconn;
    function connect()
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            $font = mysqli_set_charset($con, 'utf8');
        }
        return $this->myconn;
    }
    function close()
    {

        mysqli_close($this->myconn);
        //echo 'Connection closed!';
    }
}

?>