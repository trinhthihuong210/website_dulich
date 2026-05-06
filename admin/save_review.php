
<?php
include 'includes/db.php';

$customer_name = isset($_POST['customer_name']) ? trim($_POST['customer_name']) : '';
$customer_type = isset($_POST['customer_type']) ? trim($_POST['customer_type']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 5;

if ($customer_name === '' || $content === '') {
    die("Vui lòng nhập tên và nội dung đánh giá.");
}

/* XỬ LÝ ẢNH AVATAR */
$avatar_name = '';

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $upload_dir = 'uploads/reviews/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_name = basename($_FILES['avatar']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($file_ext, $allowed_ext)) {
        $avatar_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file_name);
        $target_file = $upload_dir . $avatar_name;

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
            $avatar_name = '';
        }
    }
}

/* LƯU VÀO DATABASE */
$stmt = $conn->prepare("
    INSERT INTO reviews 
    (customer_name, customer_type, content, rating, avatar, is_approved, is_active) 
    VALUES (?, ?, ?, ?, ?, 0, 1)
");

$stmt->bind_param("sssis", $customer_name, $customer_type, $content, $rating, $avatar_name);

if ($stmt->execute()) {
    header("Location: danhgia.php?success=1");
    exit;
} else {
    echo "Lỗi khi gửi đánh giá: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>