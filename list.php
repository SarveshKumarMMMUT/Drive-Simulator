<?php
session_start();
require_once __DIR__ . '/google-api-php-client/vendor/autoload.php';
include_once "./includes/functions.php";
$result = iterate_drive();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Google Storage Simulator</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/offcanvas.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Google Drive Simulator</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Created By Sarvesh Kumar</h6>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">List of Files in Chaser Directory</h6>
        <?php
        if ($result != null) {
            foreach ($result as $file) {
                foreach ($file as $name => $id) {
                    ?>
                    <div class="media text-muted pt-3">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark"><?php echo($name); ?></strong>
                            <?php echo($id); ?>
                        </p>
                    </div>
                <?php }
            }
        } else { ?>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">No Files Found</strong>
                </p>
            </div>
        <?php } ?>
    </div>
    <h6 class="border-bottom border-gray pb-2 mb-0">Back to <a href="index.php">Home</a></h6>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/bootstrap.min.js"></script>
<script src="./js/offcanvas.js"></script>
</body>
</html>
