<?php
require_once("../server.php");

if (isset($_POST["image_id"])) {
    $id = $_POST["image_id"];

    $select_image_owner = "SELECT username, uploaded_on FROM images WHERE image_id = '$id';";
    $result = mysqli_query($conn, $select_image_owner);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        echo "<div><p class='text-uppercase font-weight-bold mb-0'>" . $row["username"] . "</p><p class='mb-0'>" . $row["uploaded_on"] . "</p></div>";
    }
}
?>