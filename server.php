<?php
// Adatbázis kapcsolat.
$server_name = "127.0.0.1";
$server_username = "root";
$server_password = "";
$database = "image_sharing";

$conn = new mysqli($server_name, $server_username, $server_password, $database);

if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}
?>