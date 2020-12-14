<?php
session_start();
require_once("../../server.php");

$email = $_POST['email'];
$sql = "SELECT email FROM registered_accounts WHERE username = '" . $_SESSION['username'] . "';";
$sql_email = "SELECT email FROM registered_accounts WHERE email = '" . $email . "';";
$result = mysqli_query($conn, $sql);
$result_email = mysqli_query($conn, $sql_email);

$value = mysqli_fetch_assoc($result);
if ($value['email'] != $email && $result_email->num_rows > 0){
    echo "error";
}
?>