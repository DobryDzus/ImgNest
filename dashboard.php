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
        
        <form id="uploadForm" enctype="multipart/form-data" method="post" action="upload.php" accept="image/*">
            <input type="file" id="fileInput" name="file">

        </form>
        <div id="uploadStatus"></div>
    </div>
</body>
<script>
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementsByClassName('close')[0];
    const modal = document.getElementById('uploadModal');

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
</script>
</html>