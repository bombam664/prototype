<?php
include('../conDB.php');
$transaction_id = $_GET['transaction_id'];
$sql = "SELECT trans.transaction_id,trans.book_id, boo.title, trans.member_id, mem.first_name AS mfirstname, mem.last_name AS mlastname,
staff.staff_id, staff.first_name, staff.last_name, trans.transaction_type,
trans.transaction_date, trans.due_date, trans.return_date 
FROM (((transactions AS trans INNER JOIN books AS boo ON trans.book_id = boo.book_id) 
INNER JOIN staff AS staff ON trans.staff_id = staff.staff_id)
INNER JOIN members AS mem ON trans.member_id = mem.member_id) WHERE trans.transaction_id = $transaction_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$book_id = $row['book_id'];
$member_id = $row['member_id'];
$staff_id = $row['staff_id'];
$transaction_type = $row['transaction_type'];
$transaction_date = $row['transaction_date'];
$due_date = $row['due_date'];
$return_date = $row['return_date'];

?>

<form action="?module=update_transaction" method="post">
    <div class="mb-3">
        <label for="book_title" class="form-label">book</label>
        <select name="book_id" id="book_id" class="form-select">
            <?php
            $sqlS = "SELECT book_id, title FROM books";
            $queryS = mysqli_query($conn, $sqlS);
            while ($rowS = mysqli_fetch_assoc($queryS)) {
                ?>
                <option <?php if($book_id == $rowS['book_id']){?>selected="selected"<?php } ?> value="<?php echo $rowS['book_id']; ?>"><?php echo $rowS['title']; ?></option>

                <?php
            }
            
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="fullname" class="form-label">member</label>
        <input type="text" class="form-control" id="fullname" name="fullname"
            value="<?php echo $row['mfirstname'].' '.$row['mlastname']; ?>">
        <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
    </div>
    <div class="mb-3">
        <label for="staff_id" class="form-label">staff</label>
        <select name="staff_id" id="staff_id" class="form-select">
            <?php
            $sqlStaff = "SELECT staff_id, first_name, last_name FROM `staff`";
            $queryStaff = mysqli_query($conn, $sqlStaff);
            while ($rowStaff = mysqli_fetch_assoc($queryStaff)) {

                ?>
                <option <?php if($staff_id == $rowStaff['staff_id']){ ?> selected="selected" <?php } ?> value="<?php echo $rowStaff['staff_id']; ?>"><?php echo $rowStaff['first_name'] . ' ' . $rowStaff['last_name']; ?>
                </option>

                <?php
            }
           
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="transaction_type" class="form-label">transaction_type</label>
        <select name="transaction_type" id="transaction_type" class="form-select">
            <option <?php if($row['transaction_type'] == "Checkout"){  ?> selected="selected" <?php } ?> value="Checkout">Checkout</option>
            <option <?php if($row['transaction_type'] == "Return"){  ?> selected="selected" <?php } ?> value="Return">Return</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="due_date" class="form-label">due_date</label>
        <input type="date" class="form-control" id="due_date" name="due_date"
            value="<?php echo date("Y-m-d", strtotime($due_date)); ?>">
    </div>
    
    <div class="mb-3">
    <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>