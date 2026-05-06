
<a href="dashboard.php" style="
  display:inline-block;
  margin-bottom:20px;
  background:#f15d30;
  color:#fff;
  padding:10px 16px;
  border-radius:8px;
  text-decoration:none;
">
  ← Quay về tổng quan
</a>
<?php
session_start();
include "../config.php";

$sql = "SELECT * FROM bookings ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý đăng ký trải nghiệm</title>
  <style>
    body{
      font-family: Arial, sans-serif;
      background:#f5f5f5;
      padding:30px;
    }
    h2{
      margin-bottom:20px;
    }
    table{
      width:100%;
      border-collapse:collapse;
      background:#fff;
    }
    th, td{
      border:1px solid #ddd;
      padding:12px;
      text-align:left;
      vertical-align:top;
    }
    th{
      background:#f15d30;
      color:#fff;
    }
    tr:nth-child(even){
      background:#fafafa;
    }

    .action-link {
      padding: 6px 10px;
      border-radius: 6px;
      text-decoration: none;
      color: #fff;
      font-size: 13px;
      margin-right: 6px;
      display: inline-block;
    }

    .approve-btn {
      background: #28a745;
    }

    .cancel-btn {
      background: #dc3545;
    }

    .top-bar{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin-bottom:20px;
    }

    .logout-btn{
      background:#333;
      color:#fff;
      text-decoration:none;
      padding:10px 14px;
      border-radius:8px;
    }
  </style>
</head>
<body>

  <div class="top-bar">
    <h2>DANH SÁCH ĐĂNG KÝ TRẢI NGHIỆM</h2>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Họ tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Lịch trình</th>
      <th>Số người</th>
      <th>Ghi chú</th>
      <th>Trạng thái</th>
      <th>Hành động</th>
      <th>Thời gian</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['fullname']); ?></td>
      <td><?php echo htmlspecialchars($row['phone']); ?></td>
      <td><?php echo htmlspecialchars($row['email']); ?></td>
      <td><?php echo htmlspecialchars($row['schedule_type']); ?></td>
      <td><?php echo htmlspecialchars($row['people_count']); ?></td>
      <td><?php echo htmlspecialchars($row['note']); ?></td>
      <td><?php echo htmlspecialchars($row['status']); ?></td>
      <td>
        <a class="action-link approve-btn"
           href="update_booking_status.php?id=<?php echo $row['id']; ?>&status=Đã liên hệ"
           onclick="return confirm('Xác nhận chuyển sang Đã liên hệ?')">
           Duyệt
        </a>
        |
<a href="delete_booking.php?id=<?php echo $row['id']; ?>"
   onclick="return confirm('Bạn có chắc muốn xóa đăng ký này không?')"
   class="delete-btn">
   Xóa
</a>

        <a class="action-link cancel-btn"
           href="update_booking_status.php?id=<?php echo $row['id']; ?>&status=Từ chối"
           onclick="return confirm('Xác nhận từ chối đăng ký này?')">
           Hủy
        </a>
      </td>
<td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
  </table>

</body>
</html>