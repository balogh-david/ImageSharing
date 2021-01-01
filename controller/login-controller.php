<?php
require '../model/login-model.php';
header("Content-type: application/json; charset=utf-8");

$row = LoginModel::checkLogin($_POST["postUsername"], $_POST["postPassword"]);

if (!$row) {
    print(json_encode(array("error" => true, "msg" => "Hibás felhasználónév vagy jelszó.")));
} else {
    print(json_encode(array("success" => true)));
    $_SESSION["username"] = $_POST["postUsername"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $row["email"];
}
?>