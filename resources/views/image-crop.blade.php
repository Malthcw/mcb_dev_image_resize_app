
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Image Before Upload</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
</head>

<body>

    <h1>Upload and Crop Image</h1>

    <!-- Image Upload Input -->
    <input type="file" id="imageInput" accept="image/*">

    <!-- Image Preview -->
    <div id="imagePreview" style="width: 300px; height: 300px; display: none;">
        <img id="imageToCrop" style="max-width: 100%;">
    </div>

    <!-- Modal to show cropping area -->
    <div id="cropModal" style="display:none;">
        <button id="cropButton">Crop Image</button>
    </div>

    <!-- Cropped Image Preview -->
    <div id="croppedImagePreview" style="display: none;">
        <img id="croppedImage" style="max-width: 100%;">
    </div>

    <!-- Form to Upload Cropped Image -->
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
        @csrf
        <input type="hidden" id="croppedImageInput" name="croppedImage">
        <button type="submit">Upload Image</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    {{-- <script>
        let cropper;
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imageToCrop = document.getElementById('imageToCrop');
        const cropModal = document.getElementById('cropModal');
        const cropButton = document.getElementById('cropButton');
        const croppedImagePreview = document.getElementById('croppedImagePreview');
        const croppedImage = document.getElementById('croppedImage');
        const uploadForm = document.getElementById('uploadForm');
        const croppedImageInput = document.getElementById('croppedImageInput');

        // Event listener for when user selects an image
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    imagePreview.style.display = 'block';
                    cropModal.style.display = 'block';

                    // Initialize Cropper.js
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1,
                        viewMode: 1,
                        preview: '.img-preview',
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        // Event listener for cropping the image
        cropButton.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
            });

            // Show the cropped image in the preview
            croppedImage.src = canvas.toDataURL();
            croppedImagePreview.style.display = 'block';

            // Set the cropped image data to a hidden input
            croppedImageInput.value = canvas.toDataURL('image/jpeg');

            // Display the upload form
            uploadForm.style.display = 'block';
        });
    </script> --}}
    <script>
        let cropper;
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imageToCrop = document.getElementById('imageToCrop');
        const cropModal = document.getElementById('cropModal');
        const cropButton = document.getElementById('cropButton');
        const croppedImagePreview = document.getElementById('croppedImagePreview');
        const croppedImage = document.getElementById('croppedImage');
        const uploadForm = document.getElementById('uploadForm');
        const croppedImageInput = document.getElementById('croppedImageInput');

        // Event listener for when user selects an image
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    imagePreview.style.display = 'block';
                    cropModal.style.display = 'block';

                    // Initialize Cropper.js with fixed aspect ratio and disable resizing/moving
                    if (cropper) {
                        cropper.destroy(); // Destroy previous instance
                    }
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1, // Fixed aspect ratio
                        viewMode: 1, // Strict crop view
                        autoCropArea: 1, // Auto crop size based on the image
                        cropBoxResizable: false, // Disable resizing of the crop box
                        cropBoxMovable: true,
                        dragMode: 'none', // Disable dragging of the image
                        ready() {
                            // Set a fixed crop box size after initializing the cropper
                            const cropperInstance = this.cropper;
                            cropperInstance.setCropBoxData({
                                width: 300,  // Fixed width
                                height: 300, // Fixed height
                            });
                        },
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        // Event listener for cropping the image
        cropButton.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas({
                width: 300,  // Set output width
                height: 300, // Set output height
            });

            // Show the cropped image in the preview
            croppedImage.src = canvas.toDataURL();
            croppedImagePreview.style.display = 'block';

            // Set the cropped image data to a hidden input
            croppedImageInput.value = canvas.toDataURL('image/jpeg');

            // Display the upload form
            uploadForm.style.display = 'block';
        });
    </script>

</body>

</html>
