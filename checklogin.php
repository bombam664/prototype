<?php
session_start();
include 'conDB.php';
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT member_id,first_name, last_name, email FROM members WHERE `email`='$email' AND `password` = '$password'";
$query = mysqli_query($conn, $sql);
$row = $query->fetch_array();
if ($row > 0) {
    
    $_SESSION['id'] = $row['member_id'];
    $_SESSION['fullname'] = $row['first_name'].' '.$row['last_name'];
    header('location: user');
} else {
    echo "no ok .$sql";
}

?>