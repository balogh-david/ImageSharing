<?php
require '../../server.php';

class FunctionForImagesModel {

    // Fénykép megjelenítésekor megjelenő fénykép tulajdonos neve, illetve a feltöltési dátum.
    public static function getImageOwnerAndUploadDate($image_id) {
        $db = DBclass::getInstance();

        $sql = sprintf("SELECT username, uploaded_on FROM images WHERE image_id='%s'", $image_id);
        $result = mysqli_query($db, $sql);

        return array("rows" => $result->num_rows, "result" => $result);
    }

    // Hozzászólás hozzáfüzése az adott képhez.
    public static function insertComment($image_id, $comment) {
        $db = DBclass::getInstance();

        $sql = sprintf("INSERT INTO comments (image_id, username, comment, commented_on) VALUES (%d, '%s', '%s', NOW())", $image_id, $_SESSION["username"], $db->escape_string($comment));

        return $db->query($sql);
    }

    // Fénykép kedvelés kezelése (törlés,beszúrás).
    public static function likes($imageIsLiked, $image_id) {
        $db = DBclass::getInstance();

        if ($imageIsLiked == "true") {
            $sql = sprintf("INSERT INTO likes (image_id, user_id) VALUES (%d, %d)", $image_id, $_SESSION["id"]);
            $result = mysqli_query($db, $sql);
        } else {
            $sql = sprintf("DELETE FROM likes WHERE image_id=%d AND user_id=%d", $image_id, $_SESSION["id"]);
            $result = mysqli_query($db, $sql);
        }

        return $result;
    }

    // Megjelenített fényképhez tartozó hozzászólások kezelése.
    public static function selectImageComments($image_id) {
        $db = DBclass::getInstance();

        $sql = sprintf("SELECT * FROM comments WHERE image_id=%d", $image_id);
        $res = $db->query($sql);

        return array("rows" => $res->num_rows, "result" => $res);
    }

    // Megjelenített fényképhez tartozó kedvelések kezelése.
    public static function selectImageLikes($image_id) {
        $db = DBclass::getInstance();

        $sql = sprintf("SELECT * FROM likes WHERE image_id=%d AND user_id=%d", $image_id, $_SESSION["id"]);
        $res = mysqli_query($db, $sql);

        return $res->num_rows;
    }
}
?>