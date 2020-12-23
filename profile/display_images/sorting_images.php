<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

if (isset($_POST['sorting']) && $_POST['sorting'] == "Legrégebbi") {
  Flight::set("sorting", "ASC");
} else {
  Flight::set("sorting", "DESC");
}

Flight::set("sql_all_images", "SELECT * FROM images ORDER BY uploaded_on " . Flight::get("sorting") . " LIMIT 20;");
Flight::set("sql_liked_images", "SELECT * FROM images WHERE image_id IN (SELECT image_id FROM likes WHERE user_id='" . $_SESSION["id"] . "') ORDER BY uploaded_on " . Flight::get("sorting") . " LIMIT 20;");
Flight::set("sql_profile_images", "SELECT * FROM images WHERE user_id = " . $_SESSION['id'] . " ORDER BY uploaded_on " . Flight::get("sorting") . " LIMIT 20;");

if ($_SESSION['side'] == "profile") {
  $result_images = mysqli_query($conn, Flight::get("sql_profile_images"));
} else if ($_SESSION['side'] == "all-images") {
  $result_images = mysqli_query($conn, Flight::get("sql_all_images"));
} else {
  $result_images = mysqli_query($conn, Flight::get("sql_liked_images"));
}

if ($result_images->num_rows > 0) {
  while($row = mysqli_fetch_array($result_images)) {
    if ($_SESSION['side'] == "liked-images") {
      echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div></div>';
    } else if ($_SESSION['side'] == "profile") {
      echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div data-toggle="tooltip" title="Fénykép törlése után az oldal újratöltődik." class="top-right-delete delete-image" onclick="deleteImage(' . $row['image_id'] . ')"><i class="fa fa-times"></i></div></div>';
    } else {
      echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div class="centered">' . $row['username'] . '</div></div>';
    }
  }
} else {
  echo "<div class='text-center mt-5' id='image'>Még nincs feltöltött képed.</div>";
}
?>