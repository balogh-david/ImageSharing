<?php
require '../../model/function-for-images-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

FunctionForImagesModel::likes($_POST["imageIsLiked"], $_POST["image_id"]);
?>