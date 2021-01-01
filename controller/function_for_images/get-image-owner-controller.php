<?php
require '../../model/function-for-images-model.php';
header("Content-type: application/json; charset=utf-8");

$res = FunctionForImagesModel::getImageOwnerAndUploadDate($_POST["image_id"]);

if ($res["rows"] > 0) {
    $row = mysqli_fetch_array($res["result"]);
    print(json_encode(array("imageOwner" => "<div><p class='text-uppercase font-weight-bold mb-0'>" . $row["username"] . "</p><p class='mb-0'>" . $row["uploaded_on"] . "</p></div>")));
}
?>