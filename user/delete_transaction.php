<?php
include '../conDB.php';
$transaction_id = $_GET['transaction_id'];
$sql = "DELETE FROM transactions WHERE transaction_id = $transaction_id";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo "Deleted successfully";
    echo "<meta http-equiv='refresh' content='1;url=?module=transactions'>";
} else {
    echo "Failed to delete.$sql";
}
mysqli_close($conn);
?>