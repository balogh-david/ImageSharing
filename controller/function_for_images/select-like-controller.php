<?php
require '../../model/function-for-images-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

$result = FunctionForImagesModel::selectImageLikes($_POST["image_id"]);

if ($result > 0) {
    print(json_encode(array("liked" => true)));
} else {
    print(json_encode(array("notLiked" => true)));
}
?>