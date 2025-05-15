// import PreviewImage from './PreviewImage';

const fileUploader = document.getElementById('file-upload');
const imagePreviewContainer = document.getElementById('image-preview');


fileUploader?.addEventListener('change',  (e)=> {
    PreviewImage(e.target.files[0], imagePreviewContainer);
});


function PreviewImage(file, imagePreviewContainer) {
    let fileReader = new FileReader();
    fileReader.onload = function () {
        let image = new Image();
        image.onload = function () {
            imagePreviewContainer.innerHTML = '';
            image.style.maxWidth = '100%';
            image.style.maxHeight = '100%';
            imagePreviewContainer.appendChild(image);
        };
        image.src = fileReader.result;
    };
    fileReader.readAsDataURL(file);
}


