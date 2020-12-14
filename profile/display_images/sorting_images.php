<?php
session_start();
require_once("../../server.php");

if (isset($_POST['sorting']) && $_POST['sorting'] == "Legrégebbi") {
  $sorting = "ASC";
} else {
  $sorting = "DESC";
}

$sql_all_images = "SELECT * FROM images ORDER BY uploaded_on " . $sorting . " LIMIT 20;";
$sql_profile_images = "SELECT * FROM images WHERE user_id = " . $_SESSION['id'] . " ORDER BY uploaded_on " . $sorting . " LIMIT 20;";

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
} else {
  echo "<div class='text-center mt-5' id='image'>Még nincs feltöltött képed.</div>";
}
?>