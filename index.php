<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Google Storage Simulator</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/cover.css" rel="stylesheet">
</head>

<body class="text-center">

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Created By Sarvesh Kumar</h3>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Google Drive Simulator</h1>
        <p class="lead">This is a web application that simulates the google drive storage. The file is uploaded to
            google drive as well as to your server.</p>
        <p class="lead">
            <a href="./list.php" class="btn btn-lg btn-secondary">List All Files</a>
        </p>
        <br>
        <form method="post" enctype="multipart/form-data" id="file_upload" action="file_upload.php">
            <input class="form-control" type="file" name="document" required/>
            <input class="form-control btn btn-success" type="submit" name="upload" value="Upload"/>
        </form>
        <br/>
        <?php
        if(isset($_GET['result'])) {
            echo("<p >" . $_GET['result'] . "</p >");
        }
        ?>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Google Drive Simulator created by Sarvesh Kumar</p>
        </div>
    </footer>
</div>

<script src="./js/bootstrap.min.js"></script>
</body>
</html>
