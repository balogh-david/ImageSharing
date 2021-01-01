<?php
require '../../model/function-for-images-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

$result = FunctionForImagesModel::selectImageComments($_POST["image_id"]);

if ($result["rows"] > 0) {
    $array = array();
    while ($row = mysqli_fetch_array($result["result"])) {
       array_push($array, array("comment" => "<div><p class='mb-0 font-wight'><span class='text-uppercase'>" . $row['username'] . "</span> - <span class='font-wight'>" . $row['commented_on'] . "</span></p><p class='mb-0 pb-0'>" . $row['comment'] . "</p><hr class='mt-0 pt-0' /></div>"));
    }
    print(json_encode(array("comments" => $array)));
} else {
    print(json_encode(array("noComment" => "<p class='text-center' id='no-comment'>Ehhez a fényképhez nem tartózik hozzászólás.</p>")));
}
?>