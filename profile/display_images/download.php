<?php
require_once("../../server.php");
$image_BLOB = "SELECT image_data FROM images WHERE image_id = '" . $_POST["imageId"] . "'";
$result = mysqli_query($conn, $image_BLOB);

$blob = mysqli_fetch_assoc($result);
echo $blob["image_data"];
?>