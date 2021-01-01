<?php
require '../../model/display-images-model.php';
header("Content-type: application/json; charset=utf-8");

$res = DisplayImagesModel::deleteImage($_POST["image_id"]);

if ($res) {
    print(json_encode(array("delete" => true)));
} else {
    print(json_encode(array("delete" => false)));
}
?>