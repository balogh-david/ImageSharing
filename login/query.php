<?php
session_start();
require '../flight/Flight.php';
require_once("../server.php");

Flight::set("username", $_POST["postUsername"]);
Flight::set("password", md5($_POST["postPassword"]));

$select_sql = "SELECT email, username, id FROM registered_accounts WHERE username = '" . Flight::get("username") . "' AND password = '" . Flight::get("password") . "';";
$result_select_sql = mysqli_query($conn, $select_sql);
$total_data = mysqli_fetch_assoc($result_select_sql);

if ($result_select_sql->num_rows != 1) {
    echo "error";
} else {
    $_SESSION["username"] = Flight::get("username");
    $_SESSION["id"] = $total_data['id'];
    $_SESSION["email"] = $total_data['email'];
}
?>