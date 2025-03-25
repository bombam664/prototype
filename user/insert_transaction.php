<?php
include('../conDB.php');
session_start();

$book_id = $_POST['book_id'];
$member_id = $_SESSION['id'];
$staff_id = $_POST['staff_id'];
$transaction_type = $_POST['transaction_type'];
$due_date = $_POST['due_date'];

$sql = "INSERT INTO `transactions`(`book_id`, `member_id`, `staff_id`, `transaction_type`, `due_date`)
VALUES ('$book_id', '$member_id', '$staff_id', '$transaction_type', '$due_date')";
$query = mysqli_query($conn, $sql);
if ($query) {
    // echo "Transaction success";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=?module=transactions'>";
} else {
    echo "Transaction failed";
}
mysqli_close($conn);
?>