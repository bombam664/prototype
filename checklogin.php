<?php
session_start();
include 'conDB.php';
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT member_id,first_name, last_name, email, `password` FROM members WHERE `email`='$email'";
$query = mysqli_query($conn, $sql);
$row = $query->fetch_array();
if ($row > 0) {
    if(password_verify($password,$row['password'])){
        $_SESSION['id'] = $row['member_id'];
        $_SESSION['fullname'] = $row['first_name'].' '.$row['last_name'];
        header('location: user');
    }else{
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?module=login'>";
    }
    
} else { 
    echo "<script>alert('ไม่พบข้อมูล');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?module=login'>";          
 
}
mysqli_close($conn);
?>

