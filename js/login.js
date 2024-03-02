const formLogin = document.getElementById('form-login');

formLogin.addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent default form submission

    const username = document.querySelector('#form-login input[name="username"]').value;
    const password = document.querySelector('#form-login input[name="password"]').value;

    const data = {
        username,
        password,
    };

    try {
        const response = await axios.post('../API/login.php', data);

        if (response.data.success) {
            // Login successful
            Swal.fire({
                title: 'Đăng nhập thành công!',
                icon: 'success',
                confirmButtonText: 'Tiếp tục',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to desired page (replace with your target URL)
                    window.location.href = 'home.php';
                }
            });
        } else {
            // Login failed
            Swal.fire({
                title: 'Đăng nhập thất bại!',
                icon: 'error',
                text: response.data.message,
            });
        }
    } catch (error) {
        console.error(error);
        Swal.fire({
            title: 'Có lỗi xảy ra!',
            icon: 'error',
            text: 'Vui lòng thử lại sau.',
        });
    }
});