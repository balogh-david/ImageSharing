<?php
require '../../model/function-for-images-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

$res = FunctionForImagesModel::insertComment($_POST["id"], $_POST["comment"]);

if ($res) {
    print(json_encode(array("comment" => "<div><p class='mb-0 font-wight'><span class='text-uppercase'>" . $_SESSION['username'] . "</span> - <span class='font-wight'>" . date("Y-m-d h:i:s") . "</span></p><p class='mb-0 pb-0'>" . $_POST["comment"] . "</p><hr class='mt-0 pt-0' /></div>")));
}
?>