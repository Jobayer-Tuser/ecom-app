export default function PreviewImage(file, imagePreviewContainer) {
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


