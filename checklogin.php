<?php
session_start(); // อย่าลืมถ้ายังไม่เริ่ม session

require_once 'conDB.php';
$conn = connectlibrary();

// เตรียมคำสั่ง SQL แบบ parameterized
$sql = "SELECT member_id, first_name, last_name, email, `password` FROM members WHERE email = ?";

$stmt = mysqli_prepare($conn, $sql);

// ผูกตัวแปร $email เข้ากับ parameter
mysqli_stmt_bind_param($stmt, "s", $email);

// ตั้งค่าตัวแปรก่อน execute
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_stmt_execute($stmt);

// ดึงผลลัพธ์
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['member_id'];
        $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
        header("Location: user");
        exit;
    } else {
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?module=login'>";
    }
} else {
    echo "<script>alert('ไม่พบข้อมูล');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?module=login'>";
}

mysqli_close($conn);
?>
