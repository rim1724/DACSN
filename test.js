const addWorkExperience = document.getElementById("add-work-experience");
const addEducation = document.getElementById("add-education");
const addLanguage = document.getElementById("add-language");
const addAchievement = document.getElementById("add-achievement");
const addHobby = document.getElementById("add-hobby");

addWorkExperience.addEventListener("click", function() {
    const workExperience = document.getElementById("work-experience");
    const newExperience = workExperience.lastElementChild.cloneNode(true);
    newExperience.querySelectorAll("input, textarea").forEach(function(element) {
        element.value = "";
    });
    workExperience.appendChild(newExperience);
});

addEducation.addEventListener("click", function() {
    const education = document.getElementById("education");
    const newEducation = education.lastElementChild.cloneNode(true);
    newEducation.querySelectorAll("input, textarea").forEach(function(element) {
        element.value = "";
    });
    education.appendChild(newEducation);
});

addLanguage.addEventListener("click", function() {
    const languages = document.getElementById("languages");
    const newLanguage = languages.lastElementChild.cloneNode(true);
    newLanguage.querySelectorAll("input, select").forEach(function(element) {
        element.value = "";
    });
    languages.appendChild(newLanguage);
});

addAchievement.addEventListener("click", function() {
    const achievements = document.getElementById("achievements");
    const newAchievement = achievements.lastElementChild.cloneNode(true);
    newAchievement.querySelector("input").value = "";
    achievements.appendChild(newAchievement);
});

addHobby.addEventListener("click", function() {
    const hobbies = document.getElementById("hobbies");
    const newHobby = hobbies.lastElementChild.cloneNode(true);
    newHobby.querySelector("input").value = "";
    hobbies.appendChild(newHobby);
});

// Hàm kiểm tra tính hợp lệ của dữ liệu
function validateForm() {
    const fullname = document.getElementById("fullname").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const dob = document.getElementById("dob").value;
    const gender = document.getElementById("gender").value;
    const address = document.getElementById("address").value;
    const careerObjective = document.getElementById("career-objective").value;

    // Kiểm tra tên
    if (fullname === "") {
        alert("Vui lòng nhập họ và tên!");
        return false;
    }

    // Kiểm tra email
    if (email === "" || !validateEmail(email)) {
        alert("Vui lòng nhập email hợp lệ!");
        return false;
    }

    // Kiểm tra số điện thoại
    if (phone === "") {
        alert("Vui lòng nhập số điện thoại!");
        return false;
    }

    // Kiểm tra ngày sinh
    if (dob === "") {
        alert("Vui lòng nhập ngày sinh!");
        return false;
    }

    // Kiểm tra giới tính
    if (gender === "") {
        alert("Vui lòng chọn giới tính!");
        return false;
    }

    // Kiểm tra địa chỉ
    if (address === "") {
        alert("Vui lòng nhập địa chỉ!");
        return false;
    }

    // Kiểm tra mục tiêu nghề nghiệp
    if (careerObjective === "") {
        alert("Vui lòng nhập mục tiêu nghề nghiệp!");
        return false;
    }

    // Kiểm tra dữ liệu của các phần còn lại

    // ...

    return true;
}

// Hàm kiểm tra định dạng email
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

// Gán sự kiện submit cho form
const form = document.querySelector("form");
form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Kiểm tra tính hợp
    // Kiểm tra tính hợp lệ của dữ liệu
    if (!validateForm()) {
        return;
    }

    // Thu thập dữ liệu từ form
    const data = new FormData(form);

    // Gửi dữ liệu đến server
    fetch(form.action, {
        method: form.method,
        body: data,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Thông báo thành công
                alert("Thông tin của bạn đã được gửi đi!");
                // Chuyển hướng đến trang khác
                window.location.href = "your-success-page.html";
            } else {
                // Thông báo lỗi
                alert("Có lỗi xảy ra khi gửi dữ liệu!");
            }
        });
});
const deleteExperienceButtons = document.querySelectorAll(".delete-experience");
const deleteLanguageButtons = document.querySelectorAll(".delete-language");

// Xử lý nút xóa trong phần "Kinh nghiệm làm việc"
deleteExperienceButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        const experienceItem = button.parentElement;
        experienceItem.parentNode.removeChild(experienceItem);
    });
});

// Xử lý nút xóa trong phần "Ngôn ngữ"
deleteLanguageButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        const languageItem = button.parentElement;
        languageItem.parentNode.removeChild(languageItem);
    });
});

