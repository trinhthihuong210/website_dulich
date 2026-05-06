<?php
include('../includes/db.php'); // QUAN TRỌNG: sửa đúng path

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Lấy ảnh để xoá file
    $sql = "SELECT image FROM gallery WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $file_path = "../uploads/gallery/" . $row['image'];

        // Xoá file ảnh nếu tồn tại
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Xoá DB
        $delete = "DELETE FROM gallery WHERE id = $id";
        mysqli_query($conn, $delete);
    }

    // Redirect về admin
    header("Location: admin_gallery.php");
    exit();
} else {
    echo "Thiếu ID";
}