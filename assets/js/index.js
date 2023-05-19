var fileName = document.querySelector('#fileName');
var fileInput = document.querySelector('#fileToUpload');
var submitBtn = document.querySelector('#btn_submit');
var inputFileBox = document.querySelector('#inputFile_box');
var imgPreview = document.querySelector('#imgPreview');
var previewBox = document.querySelector('#previewBox');
var closeNotification = document.querySelector('#not_btn_close');
var notificationBox = document.querySelector('#notification');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        var uploadedFile = fileInput.files[0];
        submitBtn.style.cursor = "pointer";
        submitBtn.style.opacity = 1;
        submitBtn.removeAttribute("disabled");
        inputFileBox.style.display = "none";
        var fileReader = new FileReader();

        fileReader.onload = function() {
            imgPreview.style.backgroundImage = `url('${fileReader.result}')`;
            previewBox.style.display = 'flex';
            fileName.textContent = uploadedFile.name;
        };

        fileReader.readAsDataURL(uploadedFile);

    } else {
        previewBox.style.display = "none";
        inputFileBox.style.display = "flex";
        submitBtn.setAttribute('disabled', 'disabled');
        imgPreview.style.backgroundImage = 'none';
        submitBtn.style.cursor = "not-allowed";
        submitBtn.style.opacity = 0.6;
    }
});

if (notificationBox) {
    closeNotification.addEventListener('click', () => {
        notificationBox.parentNode.removeChild(notificationBox);
    })
}