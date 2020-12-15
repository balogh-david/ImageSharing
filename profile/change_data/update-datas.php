<?php
session_start();
require_once("../../server.php");

if (isset($_POST["code"])) {
    $password = md5($_POST["password"]);

    $sql = "UPDATE registered_accounts SET password = '" . $password . "' WHERE username = '" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $sql);
} else {
    $email = $_POST['email'];

    $sql = "UPDATE registered_accounts SET email = '" . $email . "' WHERE username = '" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $sql);
}
?>