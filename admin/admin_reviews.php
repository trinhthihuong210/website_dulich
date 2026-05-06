
<a href="dashboard.php" class="back-btn">← Quay về tổng quan</a>

<?php
include '../includes/db.php';

if (isset($_GET['approve'])) {
    $id = (int)$_GET['approve'];
    $conn->query("UPDATE reviews SET is_approved = 1 WHERE id = $id");
    header("Location: admin_reviews.php");
    exit;
}

if (isset($_GET['hide'])) {
    $id = (int)$_GET['hide'];
    $conn->query("UPDATE reviews SET is_approved = 0 WHERE id = $id");
    header("Location: admin_reviews.php");
    exit;
}

$result = $conn->query("SELECT * FROM reviews ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý đánh giá</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background: #f7f7f7;
    }
    h2 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
      vertical-align: top;
    }
    th {
      background: #f15d30;
      color: #fff;
    }
    a.btn {
      display: inline-block;
      padding: 6px 10px;
      text-decoration: none;
      border-radius: 6px;
      color: white;
      margin-right: 6px;
    }
    .approve {
      background: green;
    }
    .hide {
      background: #666;
    }

    .back-btn {
  display: inline-block;
  margin-bottom: 20px;
  background: #f15d30;
  color: #fff;
  padding: 10px 16px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
}

.status-approved {
  color: #0a8f3c;
  font-weight: 700;
}

.status-pending {
  color: #d93025;
  font-weight: 700;
}
.status-approved {
  color: #198754;
  font-weight: 700;
}

.status-pending {
  color: #b02a37;
  font-weight: 700;
}

.action-buttons {
  display: flex;
  gap: 6px;
  flex-wrap: nowrap;
  min-width: 160px;
}

.action-buttons .btn {
  padding: 6px 10px;
  border-radius: 6px;
  color: #fff;
  text-decoration: none;
  font-size: 13px;
  white-space: nowrap;
}

.approve { background: #198754; }
.hide { background: #555; }
.delete { background: #dc3545; }
  </style>

  
</head>
<body>
  <h2>QUẢN LÝ ĐÁNH GIÁ TỪ KHÁCH HÀNG</h2>

  <table>
 <tr>
  <th>ID</th>
  <th>Tên</th>
  <th>Loại khách</th>
  <th>Nội dung</th>
  <th>Số sao</th>
  <th>Trạng thái</th>
  <th>Thao tác</th>
</tr>


    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
        <td><?php echo htmlspecialchars($row['customer_type']); ?></td>
        <td><?php echo htmlspecialchars($row['content']); ?></td>
        <td><?php echo htmlspecialchars($row['rating']); ?></td>
<td>
  <?php if ($row['is_approved'] == 1) { ?>
    <span class="status-approved">Đã duyệt</span>
  <?php } else { ?>
    <span class="status-pending">Chưa duyệt</span>
  <?php } ?>
</td>

<td class="action-buttons">
  <a class="btn approve" href="?approve=<?php echo $row['id']; ?>">Duyệt</a>

  <a class="btn hide" href="?hide=<?php echo $row['id']; ?>">Ẩn</a>

  <a class="btn delete"
     href="delete_review.php?id=<?php echo $row['id']; ?>"
     onclick="return confirm('Bạn có chắc muốn xoá đánh giá này không?')">
     Xoá
  </a>
</td>
      </tr>
      
    <?php endwhile; ?>
  </table>
</body>
</html>