<?php
require '../../model/display-images-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

if (isset($_POST['sorting']) && $_POST['sorting'] == "ASC") {
    $sorting = "ASC";
  } else {
    $sorting = "DESC";
}

$res = DisplayImagesModel::sortingImages($sorting, $_POST["currentSide"]);

if ($res["rows"] > 0) {
    $array = array();
    while($row = mysqli_fetch_array($res["result"])) {
      switch ($_POST["currentSide"]) {
        case "liked-images":
          array_push($array, array("image" => '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div class="centered">' . $row['username'] . '</div></div>'));
          break;
        case "all-images":
          array_push($array, array("image" => '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div class="centered">' . $row['username'] . '</div></div>'));
          break;
        default:
          array_push($array, array("image" => '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div data-toggle="tooltip" title="Fénykép törlése után az oldal újratöltődik." class="top-right-delete delete-image" onclick="deleteImage(' . $row['image_id'] . ')"><i class="fa fa-times"></i></div></div>'));
          break;
      }
    }
  print(json_encode(array("images" => $array)));
}
?>