<?php

include('../conDB.php');
session_start();
$_SESSION['id'];
$_SESSION['fullname'];
$book_id = $_GET['book_id'];

// ใช้ prepared statement
$stmt = $conn->prepare("SELECT title FROM `books` WHERE book_id = ?");
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$book_title = $row['title'];
$stmt->close();
?>
<form action="?module=insert_transaction" method="post">
    <div class="mb-3">
        <label for="book_title" class="form-label">book</label>
        <input type="text" class="form-control" id="book_title" name="book_title" value="<?php echo $book_title; ?>">
        <input type="hidden" class="form-control" id="book_id" name="book_id" value="<?php echo $book_id; ?>">
    </div>
    <div class="mb-3">
        <label for="fullname" class="form-label">member</label>
        <input type="text" class="form-control" id="fullname" name="fullname"
            value="<?php echo $_SESSION['fullname']; ?>">
    </div>
    <div class="mb-3">
        <label for="staff_id" class="form-label">staff</label>
        <select name="staff_id" id="staff_id" class="form-select">
            <?php
            // ใช้ prepared statement
            $stmt_staff = $conn->prepare("SELECT staff_id, first_name, last_name FROM `staff`");
            $stmt_staff->execute();
            $result_staff = $stmt_staff->get_result();
            while ($row = $result_staff->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['staff_id']; ?>"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                </option>
                <?php
            }
            $stmt_staff->close();
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="transaction_type" class="form-label">transaction_type</label>
        <select name="transaction_type" id="transaction_type" class="form-select">
            <option value="Checkout">Checkout</option>
            <option value="Return">Return</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="due_date" class="form-label">due_date</label>
        <input type="date" class="form-control" id="due_date" name="due_date"
            value="<?php echo date("Y-m-d", strtotime(" +7 day")); ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>