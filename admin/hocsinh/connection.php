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
function get_all_students()
{
// Gọi tới biến toàn cục $conn
global $conn;

// Hàm kết nối
connect_db();

// Câu truy vấn lấy tất cả sinh viên
$sql = "select * from hocsinh";

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

// Hàm lấy sinh viên theo ID
function get_student($student_id)
{
// Gọi tới biến toàn cục $conn
global $conn;

// Hàm kết nối
connect_db();

// Câu truy vấn lấy tất cả sinh viên
$sql = "select * from hocsinh where MaHS = {$student_id}";

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql);

// Mảng chứa kết quả
$result = array();

// Nếu có kết quả thì đưa vào biến $result
if (mysqli_num_rows($query) > 0){
$row = mysqli_fetch_assoc($query);
$result = $row;
}

// Trả kết quả về
return $result;
}

// Hàm thêm sinh viên
function add_student($student_id,$student_class,$student_name,$student_sex,$student_date,$student_where,$student_dantoc,$student_cha,$student_me)
{
// Gọi tới biến toàn cục $conn
global $conn;

// Hàm kết nối
    connect_db();

// Chống SQL Injection
    $student_id = addslashes($student_id);
    $student_class = addslashes($student_class);
    $student_name = addslashes($student_name);
    $student_sex = addslashes($student_sex);
    $student_date = addslashes($student_date);
    $student_where = addslashes($student_where);
    $student_dantoc = addslashes($student_dantoc);
    $student_cha = addslashes($student_cha);
    $student_me = addslashes($student_me);

// Câu truy vấn thêm
$sql = "
INSERT INTO hocsinh(MaHS,MaLopHoc,TenHS,GioiTinh,NgaySinh,noisinh,dantoc,hotencha,hotenme) VALUES
('$student_id','$student_class','$student_name','$student_sex','$student_date,'$student_where','$student_dantoc','$student_cha','$student_me')
";

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql);

return $query;
}


// Hàm sửa sinh viên
function edit_student($student_id,$student_class,$student_name,$student_sex,$student_date,$student_where,$student_dantoc,$student_cha,$student_me)
{
// Gọi tới biến toàn cục $conn
global $conn;

// Hàm kết nối
connect_db();

// Chống SQL Injection
    $student_id = addslashes($student_id);
    $student_class = addslashes($student_class);
    $student_name = addslashes($student_name);
    $student_sex = addslashes($student_sex);
    $student_date = addslashes($student_date);
    $student_where = addslashes($student_where);
    $student_dantoc = addslashes($student_dantoc);
    $student_cha = addslashes($student_cha);
    $student_me = addslashes($student_me);
// Câu truy sửa
    $sql = "
UPDATE hocsinh SET
  MaHS=$student_id,
  MaLopHoc=$student_class, 
  TenHS=$student_name,
  GioiTinh=$student_sex,
  NgaySinh=$student_date,
  noisinh=$student_where,
  dantoc=$student_dantoc,
  hotencha=$student_cha,
  hotenme=$student_me,
WHERE maHS = $student_id
";

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql);

return $query;
}


// Hàm xóa sinh viên
function delete_student($student_id)
{
// Gọi tới biến toàn cục $conn
global $conn;

// Hàm kết nối
connect_db();

// Câu truy sửa
$sql = "
DELETE FROM hocsinh
WHERE MaHS = $student_id
";

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql);

return $query;
}
?>