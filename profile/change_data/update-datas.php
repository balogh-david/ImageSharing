<?php
session_start();
require_once("../../server.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "UPDATE registered_accounts SET email = '" . $email . "', password = '" . $password . "' WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $sql);
?>