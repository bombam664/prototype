<?php
include 'conDB.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$membership_type = $_POST['membership_type'];

$sql = "INSERT INTO `members`(`first_name`, `last_name`, `email`, `password`, `membership_type`) 
VALUES ('$firstname','$lastname','$email','$password','$membership_type')";
$query = mysqli_query($conn,$sql);
if($query){
 echo "<meta http-equiv='refresh' content='1;url=?module=login'>";
}else{
echo "no ok .$sql";
}

mysqli_close($conn);
?>