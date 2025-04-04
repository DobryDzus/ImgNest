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
                <div class="form-input" id="tagsWrapper">
                    <input type="text" name="tags" id="tags-input" class="tagsInput" placeholder="type and press enter to add a tag">
                </div>
                <div id="error-message" class="error-message">You can only add up to 3 tags.</div>
                <input type="submit" value="Upload" class="form-button">
            </form>
        </div>
    </div>
</body>
<script>
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('uploadModal');
    const modalContent = document.querySelector('.modal-content');
    const fileInput = document.getElementById('file');
    const preview = document.getElementById('preview');
    const tagsInputWrapper = document.getElementById('tagsWrapper');
    const tagsInput = document.getElementById('tags-input');
    const errorMessage = document.getElementById('error-message');

    openModalButton.onclick = function () {
        modal.style.display = 'block';
        modalContent.classList.remove('hidden');
    };

    closeModalButton.onclick = function () {
        modalContent.classList.add('hidden');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300); 
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modalContent.classList.add('hidden');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300); 
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

    tagsInput.addEventListener('keypress', function (e) {
    if (e.key === ' ' && tagsInput.value.trim() !== '' && tagsInputWrapper.getElementsByClassName('tag').length < 3) {
        e.preventDefault();
        const tagText = tagsInput.value.trim();
        const tag = document.createElement('span');
        tag.classList.add('tag');
        tag.innerHTML = tagText + '<span class="closeTag">&times;</span>';
        tagsInputWrapper.insertBefore(tag, tagsInput);
        tagsInput.value = '';

        tag.querySelector('.closeTag').addEventListener('click', function () {
            tagsInputWrapper.removeChild(tag);
            errorMessage.style.display = 'none';
        });
    } else if (tagsInputWrapper.getElementsByClassName('tag').length >= 3) {
        errorMessage.style.display = 'block';
    }
});
</script>
</html>