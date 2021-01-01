<?php
require '../../model/change-data-model.php';
session_start();

$pwd = md5($_POST["password"]);
ChangeDataModel::updateCurrentUserPassword($pwd);
?>