<?php
session_start();
require_once("../server.php");

if (isset($_POST["imageIsLiked"])) {
    $imageIsLiked = $_POST["imageIsLiked"];
    if ($imageIsLiked == "true") {
        $sql = "INSERT INTO likes (image_id, user_id) VALUES (" . $_POST['image_id'] . ", " . $_SESSION['id'] . ");";
        $conn->query($sql);
    } else {

        $sql = "DELETE FROM likes WHERE image_id=" . $_POST['image_id'] . " AND user_id=" . $_SESSION['id'] . ";";
        $conn->query($sql);
    }
}

?>