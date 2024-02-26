const fileUploader = document.getElementById('img-uploader');

fileUploader.addEventListener('change', (event) => {
const files = event.target.files;
console.log('files', files);

const feedback = document.getElementById('feedback');
const msg = `File ${files[0].name} uploaded successfully!`;
feedback.innerHTML = msg;
});
