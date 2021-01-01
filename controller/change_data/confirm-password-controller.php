<?php
require '../../model/change-data-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

$row = ChangeDataModel::confirmPassword(md5($_POST["confirmPass"]));

if ($row == "0") {
    print(json_encode(array("error" => true, "msg" => "Megadott jelszó nem egyezik az őn jelszavával.")));
} else {
    print(json_encode(array("success" => true)));
}
?>