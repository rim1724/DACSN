 // Định nghĩa số lượng mục trên mỗi trang
 var itemsPerPage = 4;

 // Lấy danh sách tất cả các mục con có class bắt đầu bằng 'congviec'
 var jobItems = document.querySelectorAll('[class^="congviec"]');
 
 // Tính toán số lượng trang
 var numPages = Math.ceil(jobItems.length / itemsPerPage);
 
 // Hiển thị trang đầu tiên ban đầu
 showPage(1);
 
 // Hàm để hiển thị các mục cho một trang cụ thể
 function showPage(pageNumber) {
     // Tính chỉ số bắt đầu và kết thúc của các mục trên trang này
     var startIndex = (pageNumber - 1) * itemsPerPage;
     var endIndex = pageNumber * itemsPerPage;
 
     // Ẩn tất cả các mục trước khi hiển thị lại
     jobItems.forEach(function(item) {
         item.style.display = 'none';
     });
 
     // Hiển thị các mục từ startIndex đến endIndex
     for (var i = startIndex; i < endIndex && i < jobItems.length; i++) {
         jobItems[i].style.display = 'flex';
     }
 }
 
 // Tạo các nút hoặc liên kết cho mỗi trang
 var paginationContainer = document.createElement('div');
 paginationContainer.className = 'pagination';
 
 for (var i = 1; i <= numPages; i++) {
     var pageLink = document.createElement('a');
     pageLink.textContent = i;
     pageLink.href = '#'; // Thay thế '#' bằng link tương ứng của trang nếu cần
     pageLink.style.textDecoration = 'none'; // Loại bỏ gạch chân
     pageLink.style.color = 'black'; // Đổi màu văn bản
     pageLink.style.fontSize = '18px'; // Đổi kích thước văn bản
     pageLink.style.margin = '10px 5px'; // Khoảng cách giữa các số
     pageLink.style.cursor = 'pointer'; // Biểu tượng con trỏ khi di chuột
     pageLink.style.fontWeight = 'bold';
 
     // Khi người dùng click vào một trang, hiển thị các mục cho trang đó
     pageLink.addEventListener('click', function(event) {
         event.preventDefault();
         var pageNumber = parseInt(event.target.textContent);
         showPage(pageNumber);
     });
 
     paginationContainer.appendChild(pageLink);
 }
 
 // Thêm các nút phân trang vào cuối danh sách công việc
 var listInfo = document.querySelector('.list-info');
 listInfo.appendChild(paginationContainer);