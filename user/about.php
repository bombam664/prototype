<?php
include('../conDB.php');

$sql = "SELECT `book_id`, `title`, `isbn`, `publication_date`, 
`category_id`, `publisher`, `available_quantity` FROM `books`";

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
        while ($row = mysqli_fetch_assoc($query)) {
           
        ?>
            <tr>
                <th scope="row"><?php $i+=1; echo $i; ?></th>
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
mysqli_close($conn);
?>