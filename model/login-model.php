<?php
require_once("../server.php");
session_start();

class LoginModel {

    public static function checkLogin($username, $pwd) {
        $db = DBclass::getInstance();

        $username = $db->escape_string($username);
        $pwd = md5($pwd);
        
        $sql = sprintf("SELECT email, username, id FROM registered_accounts WHERE username='%s' AND password='%s'", $db->escape_string($username), $pwd);
        $res = $db->query($sql);
        $row = $res->fetch_assoc();

        return $row;
    }
}
?>