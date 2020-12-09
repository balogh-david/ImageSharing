<?php 
session_start();
require_once("../server.php");

$imageLimit = $_GET['limit'];
if (isset($_GET['sorting']) && $_GET['sorting'] == "ASC") {
  $sorting = "ASC";
} else {
  $sorting = "DESC";
}

$sql_userId = "SELECT id FROM registered_accounts WHERE username = '" . $_SESSION['username'] . "';";     
$result_userId = mysqli_query($conn, $sql_userId);

$sql_all_images = "SELECT * FROM images ORDER BY uploaded_on " . $sorting . " LIMIT " . $imageLimit . ", 10;";
$sql_profile_images = "SELECT * FROM images WHERE user_id = " . $_SESSION['id'] . " ORDER BY uploaded_on " . $sorting . " LIMIT " . $imageLimit . ", 10;";

if ($_SESSION['side'] == "profile") {
  $result_images = mysqli_query($conn, $sql_profile_images);
} else {
  $result_images = mysqli_query($conn, $sql_all_images);
}

    
if ($result_images->num_rows > 0) {
  while($row = mysqli_fetch_array($result_images)) {
    if ($_SESSION['side'] == "profile") {
      echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div></div>';
    } else {
      echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,'.base64_encode( $row['image_data'] ).'" onclick="openImage(this.src, this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div class="centered">' . $row['username'] . '</div></div>';
    }
  }
}
?>