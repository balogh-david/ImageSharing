<?php
session_start();
require_once("../server.php");

$sql = "SELECT password FROM registered_accounts WHERE username = '" . $_SESSION['username'] . "';";
$password = md5($_POST['confirmPass']);
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    $data = mysqli_fetch_assoc($result);
    if ($data['password'] != $password) {
        echo "error";
    }
} 
?>