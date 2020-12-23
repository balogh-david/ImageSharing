<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

Flight::set("sql", "SELECT password FROM registered_accounts WHERE username = '" . $_SESSION['username'] . "';");
Flight::set("password", md5($_POST["confirmPass"]));
$result = mysqli_query($conn, Flight::get("sql"));

if ($result->num_rows == 1) {
    $data = mysqli_fetch_assoc($result);
    if ($data['password'] != Flight::get("password")) {
        echo "error";
    }
} 
?>