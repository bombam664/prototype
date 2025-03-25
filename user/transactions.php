<?php
include('../conDB.php');
session_start();
$sql = "SELECT trans.transaction_id, boo.title, trans.member_id, mem.first_name AS mfirstname, mem.last_name AS mlastname,
staff.first_name, staff.last_name, trans.transaction_type,
trans.transaction_date, trans.due_date, trans.return_date 
FROM (((transactions AS trans INNER JOIN books AS boo ON trans.book_id = boo.book_id) 
INNER JOIN staff AS staff ON trans.staff_id = staff.staff_id)
INNER JOIN members AS mem ON trans.member_id = mem.member_id)";

$query = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($query);
if ($rowcount <= 0) {
    echo "No data found";
}
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">member</th>
            <th scope="col">staff</th>
            <th scope="col">transaction_type</th>
            <th scope="col">transaction_date</th>
            <th scope="col">due_date</th>
            <th scope="col">return_date</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($query)) {

            ?>
            <tr>
                <th scope="row"><?php $i += 1;
                echo $i; ?></th>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['mfirstname'].' '.$row['mlastname']; ?></td>
                <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                <td><?php echo $row['transaction_type']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td>
                    <a href="?module=return&transaction_id=<?php echo $row['transaction_id']; ?>"
                    class="btn btn-primary">return</a>
                    <a href="?module=edit_transaction&transaction_id=<?php echo $row['transaction_id']; ?>"
                     class="btn btn-warning">edit</a>
                    <a href="?module=delete_transaction&transaction_id=<?php echo $row['transaction_id']; ?>"
                     class="btn btn-danger" onclick="return confirm('ยืนยันการลบ !')">delete</a>
                </td>

            </tr>
            <?php
        }

        ?>
    </tbody>
</table>


<?php
mysqli_close($conn);
?>