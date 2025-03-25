<?php
include('../conDB.php');
$transaction_id = $_GET['transaction_id'];
$return_date = date("Y-m-d");
$sql = "UPDATE transactions SET transaction_type='Return',return_date='$return_date' WHERE transaction_id = $transaction_id";
$query = mysqli_query($conn, $sql);
if ($query) {
    // echo "Return successfully";
    echo "<meta http-equiv='refresh' content='0;url=?module=transactions'>";
} else {
    echo "Failed to return.$sql";
}
mysqli_close($conn);
?>