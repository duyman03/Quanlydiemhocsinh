<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db()
{
// Gọi tới biến toàn cục $conn
    global $conn;

// Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydiem') or die ('Can\'t not connect to database');
// Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
// Gọi tới biến toàn cục $conn
    global $conn;

// Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}

// Hàm lấy tất cả sinh viên
function get_all_diem()
{
// Gọi tới biến toàn cục $conn
    global $conn;

// Hàm kết nối
    connect_db();

// Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from diem";

// Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

// Mảng chứa kết quả
    $result = array();

// Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
// Trả kết quả về
    return $result;
}
function update($id,$tinh)
{

// Gọi tới biến toàn cục $conn
    global $conn;

// Hàm kết nối
    connect_db();

    $sql=" select * from diem";
    //$sql="update diem set DiemTB='$tinh' where MaDiem=$id";
    //$query=mysqli_query($conn, $sql);
    //return $query;

}
?>