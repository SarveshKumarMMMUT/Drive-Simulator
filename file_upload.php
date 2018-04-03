<?php
session_start();
require_once __DIR__ . '/google-api-php-client/vendor/autoload.php';
include_once "./includes/functions.php";

if (isset($_POST['upload'], $_FILES['document']['tmp_name']) && $_FILES['document']['tmp_name'] != null) {
    $filename = explode(".", $_FILES['document']['name']);
    $filename = $filename[0] . "_" . round(microtime(true)) . "." . end($filename);
    $path = "./uploads/" . $filename;
    if (move_uploaded_file($_FILES['document']['tmp_name'], $path)) {
        if(upload_to_drive($filename)){
            ob_start();
            header("Location: ./?result=" . urlencode("File Uploaded Successfully."));
            ob_end_flush();
            die();
        }
        ob_start();
        header("Location: ./?result=" . urlencode("Error Uploading File To Google Drive"));
        ob_end_flush();
        die();
    }
    ob_start();
    header("Location: ./?result=" . urlencode("Error Uploading File To Server"));
    ob_end_flush();
    die();
}else {
    ob_start();
    header("Location: ./");
    ob_end_flush();
    die();
}