<?php
session_start();
require '../../flight/Flight.php';
require_once("../../server.php");

Flight::set("email", $_POST['email']);
Flight::set("sql", "SELECT email FROM registered_accounts WHERE username = '" . $_SESSION['username'] . "';");
Flight::set("sql_email", "SELECT email FROM registered_accounts WHERE email = '" . Flight::get("email") . "';");
$result = mysqli_query($conn, Flight::get("sql"));
$result_email = mysqli_query($conn, Flight::get("sql_email"));

$value = mysqli_fetch_assoc($result);
if ($value['email'] != Flight::get("email") && $result_email->num_rows > 0){
    echo "error";
}
?>