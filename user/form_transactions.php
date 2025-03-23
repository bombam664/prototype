<?php
include('../conDB.php');
session_start();
echo $_SESSION['id'];
echo '<br>';
echo $book_id = $_GET['book_id'];
?>