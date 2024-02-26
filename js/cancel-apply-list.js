const buttonApply = document.querySelector('.button-apply a');
    
    buttonApply.addEventListener('click', function(event) {
      event.preventDefault();
    
      // Tạo div element cho bảng thông báo
      const notification = document.createElement('div');
      notification.classList.add('notification');
      notification.style.width = '400px';
      notification.style.height = '70px';
      notification.style.backgroundColor = 'white';
      notification.style.position = 'absolute';
      notification.style.top = '50%';
      notification.style.left = '50%';
      notification.style.transform = 'translate(-50%, -50%)';
      notification.style.borderRadius = '15px';
      notification.style.border = '1px solid black';
    
      // Tạo h2 element cho nội dung thông báo
      const notificationTitle = document.createElement('h2');
      notificationTitle.textContent = 'Bạn đã hủy ứng tuyển!';
      notificationTitle.style.textAlign = 'center';
      notificationTitle.style.fontSize = '25px';
    
      // Thêm h2 element vào div notification
      notification.appendChild(notificationTitle);
    
      // Thêm div notification vào body
      document.body.appendChild(notification);
    
      // Xóa bảng thông báo sau 3 giây
      setTimeout(() => {
        notification.remove();
      }, 3000);
    });