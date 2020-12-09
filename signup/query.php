<?php
require_once("../server.php");

$username = $_POST['postname'];
$email = $_POST['postemail'];
$password = md5($_POST['postpassword']);

$sql_username = "SELECT username FROM registered_accounts WHERE username = '$username'";
$sql_email = "SELECT email FROM registered_accounts WHERE email = '$email'";

$result_sql_username = mysqli_query($conn, $sql_username);
$result_sql_email = mysqli_query($conn, $sql_email);

if ($result_sql_username->num_rows == 0 && $result_sql_email->num_rows == 0) {
    $insert = "INSERT INTO registered_accounts (username, email, password) VALUES ('$username', '$email', '$password');";
    $result_insert = mysqli_query($conn, $insert);
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