const form = document.getElementById('form-login');

form.addEventListener('submit', async (event) => {
  event.preventDefault(); // Prevent default form submission

  const username = document.querySelector('[name="username"]').value;
  const password = document.querySelector('[name="password"]').value;

  try {
    const response = await axios.post('../API/login.php', {
      username,
      password,
    });

    if (response.data.success) {
      // Login successful
      alert(response.data.message); // Display success message
      // Optionally, redirect to a different page
    } else {
      // Login failed
      alert(response.data.message); // Display error message
    }
  } catch (error) {
    console.error(error);
    alert('Có lỗi xảy ra, vui lòng thử lại!'); // Handle unexpected errors
  }
});
