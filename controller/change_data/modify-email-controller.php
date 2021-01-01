<?php
require '../../model/change-data-model.php';
header("Content-type: application/json; charset=utf-8");
session_start();

$row = ChangeDataModel::emailAlreadyExists($_POST['email']);

if ($_SESSION["email"] != $_POST['email'] && $row["row_email"]){
    print(json_encode(array("error" => true, "msg" => "Ez az email cím már használatban van.")));
} else {
    print(json_encode(array("success" => true)));
}
?>