<?php
$conn = mysqli_connect("localhost", "root", "", "chuongmy_db");

if (!$conn) {
    die("Kết nối database thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
