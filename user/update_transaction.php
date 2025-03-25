<?php
include ('../conDB.php');
$book_id = $_POST['book_id'];
$member_id = $_POST['member_id'];
$staff_id = $_POST['staff_id'];
$transaction_type = $_POST['transaction_type'];
$due_date = $_POST['due_date'];
$transaction_id = $_POST['transaction_id'];

$sql = "UPDATE transactions SET book_id='$book_id'
,member_id='$member_id',staff_id='$staff_id',transaction_type='$transaction_type'
,due_date='$due_date' WHERE transaction_id = '$transaction_id'";

$query = mysqli_query($conn, $sql);
if($query){
//  echo "update successfull";
 echo "<meta http-equiv='refresh' content='0;url=?module=transactions'>";
}else{
 echo "no ok .$sql";
}
mysqli_close($conn);
?>