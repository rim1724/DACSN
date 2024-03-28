function paginate(pageNumber, itemsPerPage) {
    const items = document.querySelectorAll('.list-apply .cancel');
    const startIndex = (pageNumber - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    items.forEach((item, index) => {
        if (index >= startIndex && index < endIndex) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
}

// Function to generate pagination controls
function generatePagination(totalPages) {
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.innerText = i;
        button.addEventListener('click', () => {
            paginate(i, 5); // Assuming 8 items per page
        });
        paginationContainer.appendChild(button);
    }
}

// Pagination initialization
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.list-apply .cancel');
    const totalPages = Math.ceil(items.length / 5); // Assuming 8 items per page
    generatePagination(totalPages);
    paginate(1, 5); // Display first page initially
});