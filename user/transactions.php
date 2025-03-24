<?php
include('../conDB.php');
session_start();
$sql = "SELECT trans.transaction_id, boo.title, trans.member_id,
staff.first_name, staff.last_name, trans.transaction_type,
trans.transaction_date, trans.due_date, trans.return_date 
FROM ((transactions AS trans INNER JOIN books AS boo ON trans.book_id = boo.book_id) 
INNER JOIN staff AS staff ON trans.staff_id = staff.staff_id) WHERE member_id = '$_SESSION[id]'";

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
                <td><?php echo $_SESSION['fullname']; ?></td>
                <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                <td><?php echo $row['transaction_type']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td><button type="button" class="btn btn-primary" onclick="">return</button>
                <button type="button" class="btn btn-warning" onclick="">edit</button>
                <button type="button" class="btn btn-danger" onclick="">del</button>
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