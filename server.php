<?php
// Adatbázis kapcsolat.
Flight::set("server_name", "127.0.0.1");
Flight::set("server_username", "root");
Flight::set("server_password", "");
Flight::set("database", "image_sharing");

$conn = new mysqli(Flight::get("server_name"), Flight::get("server_username"), Flight::get("server_password"), Flight::get("database"));

if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>