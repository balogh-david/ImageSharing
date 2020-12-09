<?php
session_start();
require_once("../server.php");

if(isset($_POST["id"]) && isset($_POST["comment"])) {
    $id = $_POST["id"];
    $comment = $_POST["comment"];
}

$insert_comment = "INSERT INTO comments (image_id, username, comment, commented_on) VALUES ('$id', '" . $_SESSION['username'] . "', '" . $comment . "', NOW());";
if ($conn->query($insert_comment)) {
    echo "<div><p class='mb-0 font-wight'><span class='text-uppercase'>" . $_SESSION['username'] . "</span> - <span class='font-wight'>" . date("Y-m-d h:i:s") . "</span></p><p class='mb-0 pb-0'>" . $comment . "</p><hr class='mt-0 pt-0' /></div>";
}
?>