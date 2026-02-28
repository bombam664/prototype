<?php
function connectlibrary($dbname = "library_system", $host = "localhost", $user = "root", $pass = "") {
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection to '$dbname' failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
  }
?>