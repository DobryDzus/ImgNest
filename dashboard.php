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
        <div class="upload-area" onclick="document.getElementById('fileInput').click();">
            click here for upload
        </div>
        <form id="uploadForm" enctype="multipart/form-data" method="post" action="upload.php" style="display: none;" accept="image/*">
            <input type="file" id="fileInput" name="file" onchange="document.getElementById('uploadForm').submit();">
        </form>
        <div id="uploadStatus"></div>
    </div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            document.getElementById('uploadStatus').innerHTML = 'uploading...';
        });
    </script>
</body>
</html>