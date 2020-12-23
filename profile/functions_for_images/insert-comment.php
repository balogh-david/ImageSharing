<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

if(isset($_POST["id"]) && isset($_POST["comment"])) {
    Flight::set("id", $_POST["id"]);
    Flight::set("comment", $_POST["comment"]);
}

Flight::set("insert_comment", "INSERT INTO comments (image_id, username, comment, commented_on) VALUES (" . Flight::get("id") . ", '" . $_SESSION['username'] . "', '" . Flight::get("comment") . "', NOW());");
if ($conn->query(Flight::get("insert_comment"))) {
    echo "<div><p class='mb-0 font-wight'><span class='text-uppercase'>" . $_SESSION['username'] . "</span> - <span class='font-wight'>" . date("Y-m-d h:i:s") . "</span></p><p class='mb-0 pb-0'>" . Flight::get("comment") . "</p><hr class='mt-0 pt-0' /></div>";
}
?>