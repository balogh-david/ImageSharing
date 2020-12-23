<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

Flight::set("image_id", $_POST["image_id"]);

Flight::set("delete_image", "DELETE FROM images WHERE image_id = " . Flight::get("image_id") . ";");
Flight::set("delete_image_comments", "DELETE FROM comments WHERE image_id = " . Flight::get("image_id") . ";");
Flight::set("delete_image_likes", "DELETE FROM likes WHERE image_id = " . Flight::get("image_id") . ";");

if ($conn->query(Flight::get("delete_image")) === TRUE && 
    $conn->query(Flight::get("delete_image_comments")) === TRUE && 
    $conn->query(Flight::get("delete_image_likes")) === TRUE) {
    echo 100;
}
?>