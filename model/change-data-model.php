<?php
require '../../server.php';

class ChangeDataModel {

    // Jelszó megerősítés ellenőrzése.
    public static function confirmPassword($pwd) {
        $db = DBclass::getInstance();

        $sql = sprintf("SELECT COUNT(*) AS count FROM registered_accounts WHERE username='%s' AND password='%s'", $_SESSION['username'], $pwd);
        $res = $db->query($sql);
        $row = $res->fetch_assoc();

        return $row["count"];
    }

    // Foglalt email cím ellenőrzése.
    public static function emailAlreadyExists($email) {
        $db = DBclass::getInstance();

        $sql_email = sprintf("SELECT email FROM registered_accounts WHERE email='%s'", $email);
        $res_email = $db->query($sql_email);
        $row_email = $res_email->fetch_assoc();

        return array("row_email" => $row_email);
    }

    // Profil adatok módosítása
    public static function updateCurrentUserData($email) {
        $db = DBclass::getInstance();
        
        $sql = sprintf("UPDATE registered_accounts SET email='%s' WHERE username='%s'", $db->escape_string($email), $_SESSION["username"]);
        $result = mysqli_query($db, $sql);
   
        return $result;
    }

    // Jelszó módosítása
    public static function updateCurrentUserPassword($pwd) {
        $db = DBclass::getInstance();
        
        $sql = sprintf("UPDATE registered_accounts SET password='%s' WHERE username='%s'", $pwd, $_SESSION["username"]);
        $result = mysqli_query($db, $sql);

        return $result;
    }
}
?>