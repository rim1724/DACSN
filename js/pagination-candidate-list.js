$(document).ready(function() {
    // Xác định số lượng ứng viên và số trang
    var totalCandidates = $('.ungvien').length;
    var candidatesPerPage = 5;
    var totalPages = Math.ceil(totalCandidates / candidatesPerPage);

    // Ẩn tất cả các ứng viên
    $('.ungvien').hide();

    // Hiển thị ứng viên cho trang đầu tiên
    showPage(1);

    // Xử lý sự kiện click trên các phần tử phân trang
    $(document).on('click', '.pagination li', function() {
        var currentPage = $(this).text();
        showPage(currentPage);
    });

    // Hiển thị ứng viên cho một trang cụ thể
    function showPage(pageNumber) {
        var start = (pageNumber - 1) * candidatesPerPage;
        var end = start + candidatesPerPage;

        // Ẩn tất cả các ứng viên
        $('.ungvien').hide();

        // Hiển thị ứng viên trong khoảng từ start đến end
        $('.ungvien').slice(start, end).show();

        // Hiển thị số trang
        renderPagination(pageNumber);
    }

    // Tạo phân trang
    function renderPagination(currentPage) {
        var pagination = '<ul class="pagination">';
        for (var i = 1; i <= totalPages; i++) {
            if (i == currentPage) {
                pagination += '<li class="active"><a href="#">' + i + '</a></li>';
            } else {
                pagination += '<li><a href="#">' + i + '</a></li>';
            }
        }
        pagination += '</ul>';

        // Hiển thị phân trang
        $('.pagination').remove();
        $('.list-candidate').after(pagination);
    }
});