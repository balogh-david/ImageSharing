<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

if (isset($_POST["image_id"])) {
    Flight::set("sql", "SELECT * FROM likes WHERE image_id=" . $_POST['image_id'] . " AND user_id=" . $_SESSION['id'] . ";");
    $result = $conn->query(Flight::get("sql"));

    if ($result->num_rows > 0) {
        echo "liked";
    } else {
        echo "notLiked";
    }
}
?>