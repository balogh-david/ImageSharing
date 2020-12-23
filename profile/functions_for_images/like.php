<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

if (isset($_POST["imageIsLiked"])) {
    Flight::set("imageIsLiked", $_POST["imageIsLiked"]);
    if (Flight::get("imageIsLiked") == "true") {
        Flight::set("sql", "INSERT INTO likes (image_id, user_id) VALUES (" . $_POST['image_id'] . ", " . $_SESSION['id'] . ");");
        $conn->query(Flight::get("sql"));
    } else {
        Flight::set("sql", "DELETE FROM likes WHERE image_id=" . $_POST['image_id'] . " AND user_id=" . $_SESSION['id'] . ";");
        $conn->query(Flight::get("sql"));
    }
}

?>