<?php
require_once("../server.php");
session_start();

class SignupModel {

    public static function checkSignup($username, $email) {
        $db = DBclass::getInstance();

        $sql_username = sprintf("SELECT username FROM registered_accounts WHERE username='%s'", $username);
        $res_username = $db->query($sql_username);
        $row_username = $res_username->fetch_assoc();

        $sql_email = sprintf("SELECT email FROM registered_accounts WHERE email='%s'", $email);
        $res_email = $db->query($sql_email);
        $row_email = $res_email->fetch_assoc();

        return array("username" => $row_username, "email" => $row_email);
    }
}
?>