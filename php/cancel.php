<?php
session_start();
if(isset($_POST['cancel_apply'])) {
    // Lấy id_user từ session hoặc bất kỳ cách nào khác phù hợp
    if(isset($_SESSION['user_id'])) {
      $id_user = $_SESSION['user_id'];
    } else {
      echo '<script>alert("Vui lòng đăng nhập trước khi hủy ứng tuyển."); window.location.href = "login.php";</script>';
      exit;
    }
  
    $id_project = $_SESSION['id_project'];
  
    // Thực hiện truy vấn để xóa bản ghi ứng tuyển
    $delete_sql = "DELETE FROM user_apply WHERE user_id = $user_id AND id_project = $id_project";
    $delete_result = mysqli_query($conn, $delete_sql);
  
    if($delete_result) {
      // Thông báo cho người dùng biết rằng họ đã hủy ứng tuyển thành công
      echo '<script>alert("Bạn đã hủy ứng tuyển thành công!");</script>';
      header("Location: ../views/candidate/apply-list.php");
    } else {
      // Xử lý khi có lỗi xảy ra trong quá trình xóa bản ghi
      echo '<script>alert("Có lỗi xảy ra khi hủy ứng tuyển!");</script>';
    }
  }
   ?>