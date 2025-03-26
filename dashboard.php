<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload | imgnest</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/9139c1e78a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="srch-fltr-ordr">
        <form class="search-bar">
            <input type="text" class="search-input" placeholder="Search..." name="search">
            <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
        </form>
        <div class="filter-bar">
            filter
        </div>
        <div class="order-bar">
            order
        </div>
    </div>
    <div class="container">
        <button class="upload-area" id="openModal">
            click here for upload
        </button>
    </div>

    <!-- uploadModal-->
    <div id="uploadModal" class="modal">
        <div class="modal-content form-container">
            <span class="close">&times;</span>
            <h2>Upload</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="form-input" required>
                <img id="preview" src="#" alt="preview" style="display: none; border-radius: 0;">
                <input type="text" name="fileName" id="fileName" class="form-input" placeholder="File name" required>
                <input type="submit" value="Upload" class="form-button">
            </form>
        </div>
    </div>
</body>
<script>
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('uploadModal');
    const fileInput = document.getElementById('file');
    const preview = document.getElementById('preview');

    openModalButton.onclick = function () {
        modal.style.display = 'block';
    };

    closeModalButton.onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    fileInput.onchange = function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    };
</script>
</html>