<?php
require_once("../server.php");
session_start();

class UploadModel {

    // Fénykép feltöltés kezelése.
    public static function uploadImage() {
        $db = DBclass::getInstance();

        if (isset($_FILES['file']['type'])) {
            $file_type = $_FILES['file']['name'];
            $ext = pathinfo($file_type, PATHINFO_EXTENSION);
        
            if (isset($_POST['submit']) && $ext != "") {
                if (($ext == "jpeg" || $ext == "png" || $ext == "jpg")) {
                    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                        $image_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                        $imageProperties = getimagesize($_FILES['file']['tmp_name']);
        
                        $sql = sprintf("INSERT INTO images (user_id, username, file_name, image_data, uploaded_on) VALUES (%d, '%s', '%s', '%s', NOW());", $_SESSION["id"], $_SESSION["username"], $imageProperties['mime'], $image_data);
                        $db->query($sql);
                        $done = true;
                    }
                    if ($done) {
                        $code = "SUCCESS";
                    } else {
                        $code = "FAILED";
                    }
                } else {
                    $code = "WRONG_FILE";
                }
            }
            if (isset($_POST['submit']) && $ext == "") {
                $code = "EMPTY_FILE";
            }
        }

        return $code;
    }
}
?>