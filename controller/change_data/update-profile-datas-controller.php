<?php
require '../../model/change-data-model.php';
session_start();

$email = $_POST['email'];
ChangeDataModel::updateCurrentUserData($email);
?>