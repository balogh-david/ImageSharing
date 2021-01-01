<?php
require '../model/upload-model.php';

$code = UploadModel::uploadImage();

switch ($code):
    case "SUCCESS":
        echo '<script>localStorage.setItem("success_upload", 200)</script>';
        break;
    case "FAILED":
        echo '<script>localStorage.setItem("failed_upload", 0)</script>';
        break;
    case "WRONG_FILE":
        echo '<script>localStorage.setItem("wrong_file_type", 1)</script>';
        break;
    case "EMPTY_FILE":
        echo '<script>localStorage.setItem("empty_upload", 2)</script>';
        break;
endswitch;

echo '<script>window.location="../profile"</script>';
?>