<?php
require '../flight/Flight.php';
require_once("../server.php");

Flight::set("username", $_POST["postname"]);
Flight::set("email", $_POST["postemail"]);
Flight::set("password", md5($_POST["postpassword"]));

Flight::set("sql_username", "SELECT username FROM registered_accounts WHERE username = '" . Flight::get("username") . "'");
Flight::set("sql_email", "SELECT email FROM registered_accounts WHERE email = '" . Flight::get("email") . "'");

$result_sql_username = mysqli_query($conn, Flight::get("sql_username"));
$result_sql_email = mysqli_query($conn, Flight::get("sql_email"));

if ($result_sql_username->num_rows == 0 && $result_sql_email->num_rows == 0) {
    Flight::set("insert", "INSERT INTO registered_accounts (username, email, password) VALUES ('" . Flight::get("username") . "', '" . Flight::get("email") . "', '" . Flight::get("password") . "');");
    $result_insert = mysqli_query($conn, Flight::get("insert"));
} else {
    if ($result_sql_username->num_rows > 0 && $result_sql_email->num_rows > 0) {
        echo "error";
    } else if($result_sql_username->num_rows > 0) {
        echo "username-error";
    } else {
        echo "email-error";
    }
}
?>