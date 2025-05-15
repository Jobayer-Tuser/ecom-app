import { create, registerPlugin } from 'filepond';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';

let featuredImageUploader = document.querySelector('.product-image');
let existsFeaturedImage = document.getElementById('exist-product-image')?.value || null;

registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginImageExifOrientation,
);

let filePondConfig = {
    allowDrop: true,
    allowPaste: true,
    dropOnPage: true,
    storeAsFile: true,
    allowMultiple: true,
};

// Helper function to create the server configuration
const createServerConfig = (images) => ({
    load: (src, load) => {
        let image = images.find(img => img === src);
        if (image) {
            fetch(new Request(image))
                .then(res => res.blob())
                .then(load);
        }
    }
});

// Helper function to create the files configuration
const createFilesConfig = (images) =>
    images.map(image => ({
        source: image,
        options: {
            type: 'local',
        }
    }));

// Add server and files configurations
if (existsFeaturedImage) {
    const images = [existsFeaturedImage]; // Single image array
    filePondConfig.server = createServerConfig(images);
    filePondConfig.files = createFilesConfig(images);
}

create(featuredImageUploader, filePondConfig);

