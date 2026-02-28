<?php
include('../conDB.php');

// เตรียม statement
$stmt = $conn->prepare("SELECT `book_id`, `title`, `isbn`, `publication_date`, `category_id`, `publisher`, `available_quantity` FROM `books`");
// ถ้ามี parameter ให้ใช้ $stmt->bind_param(...) ตรงนี้

$stmt->execute();
$result = $stmt->get_result();
$rowcount = $result->num_rows;
if ($rowcount <= 0) {
    echo "No data found";
}
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">isbn</th>
            <th scope="col">publication_date</th>
            <th scope="col">category_id</th>
            <th scope="col">publisher</th>
            <th scope="col">available_quantity</th>
            <th scope="col">transactions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td><?php echo $row['publication_date']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
                <td><?php echo $row['publisher']; ?></td>
                <td><?php echo $row['available_quantity']; ?></td>
                <td><button type="button" class="btn btn-primary" onclick="document.location='?module=form_transactions&book_id=<?php echo $row['book_id']; ?>'">select</button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
$stmt->close();
$conn->close();
?>