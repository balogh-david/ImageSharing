<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

if (isset($_POST["code"])) {
    Flight::set("password", md5($_POST["password"]));

    Flight::set("sql", "UPDATE registered_accounts SET password = '" . Flight::get("password") . "' WHERE username = '" . $_SESSION['username'] . "'");
    $result = mysqli_query($conn, Flight::get("sql"));
} else {
    Flight::set("email", $_POST['email']);

    Flight::set("sql", "UPDATE registered_accounts SET email = '" . Flight::get("email") . "' WHERE username = '" . $_SESSION['username'] . "'");
    $result = mysqli_query($conn, Flight::get("sql"));
}
?>