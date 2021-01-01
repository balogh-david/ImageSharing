<?php
require '../model/signup-model.php';
header("Content-type: application/json; charset=utf-8");

$emailAndUsername = SignupModel::checkSignup($_POST["postname"], $_POST["postemail"]);

if ($emailAndUsername["username"] && $emailAndUsername["email"]) {
    print(json_encode(array("error" => "usernameAndEmail", "msgUsername"=>"Ez a felhasználónév már használatban van.", "msgEmail"=>"Ez az email cím már használatban van.")));
} else if($emailAndUsername["username"]) {
    print(json_encode(array("error" => "usernameError", "msg"=>"Ez a felhasználónév már használatban van.")));
} else if ($emailAndUsername["email"]) {
    print(json_encode(array("error" => "emailError", "msg"=>"Ez az email cím már használatban van.")));
} else {
    print(json_encode(array("success" => true)));
    $insert = sprintf("INSERT INTO registered_accounts (username, email, password) VALUES ('%s', '%s', '%s')", $db->escape_string($username), $db->escape_string($email), $pwd);
    $res_insert = mysqli_query($db, $insert);
}

?>