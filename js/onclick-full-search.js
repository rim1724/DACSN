 // Khởi tạo biến lưu trữ trạng thái hiển thị                 k lamf ddc
 
 let currentInfo = "info1";

 // Thêm sự kiện click cho các thẻ `a` trong các thẻ `congviec`
 const congviecEls = document.querySelectorAll(".congviec");
 for (const congviec of congviecEls) {
   const aEl = congviec.querySelector("a");
   aEl.addEventListener("click", function (e) {
     e.preventDefault(); // Ngăn chặn chuyển hướng trang
 
     const infoId = e.target.closest(".congviec").querySelector(".info").id;
     if (infoId === currentInfo) return;
 
     // Ẩn thông tin hiện tại
     document.getElementById(currentInfo).classList.add("hidden");
 
     // Hiển thị thông tin mới
     currentInfo = infoId;
     document.getElementById(infoId).classList.remove("hidden");
   });
 }