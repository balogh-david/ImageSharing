<?php
require '../../server.php';

class DisplayImagesModel {

    // Fénykép és a hozzá tartozó adatok törlése.
    public static function deleteImage($image_id) {
        $db = DBclass::getInstance();

        $delete_image_comments = sprintf("DELETE FROM comments WHERE image_id=%d", $image_id);
        $result_comments = mysqli_query($db, $delete_image_comments);

        $delete_image_likes = sprintf("DELETE FROM likes WHERE image_id=%d", $image_id);
        $result_likes = mysqli_query($db, $delete_image_likes);

        $delete_image = sprintf("DELETE FROM images WHERE image_id=%d", $image_id);
        $result_image = mysqli_query($db, $delete_image);

        return array("image" => $result_image, "comments" => $result_comments, "likes" => $result_likes);
    }

    // További képek megjelenítésének kezelése.
    public static function showMoreImages($limit, $sorting, $currentSide) {
        $db = DBclass::getInstance();

        if ($currentSide == "liked-images") {
            $sql_liked_images = sprintf("SELECT * FROM images i INNER JOIN likes l ON i.image_id = l.image_id WHERE l.user_id=%d ORDER BY uploaded_on %s LIMIT %s, %d",$_SESSION["id"], $sorting, $limit, 10);
            $result_images = mysqli_query($db, $sql_liked_images);
          } else if ($currentSide == "all-images") {
            $sql_all_images = sprintf("SELECT * FROM images ORDER BY uploaded_on %s LIMIT %s, %d", $sorting, $limit, 10);
            $result_images = mysqli_query($db, $sql_all_images);
          } else {
            $sql_profile_images = sprintf("SELECT * FROM images WHERE user_id=%d ORDER BY uploaded_on %s LIMIT %s, %d;", $_SESSION["id"], $sorting, $limit, 10);
            $result_images = mysqli_query($db, $sql_profile_images);
        }

        return array("rows" => $result_images->num_rows, "result" => $result_images);
    }

    // Képek rendezése feltételek alapján.
    public static function sortingImages($sorting, $currentSide) {
        $db = DBclass::getInstance();
        
        if ($currentSide == "all-images") {
            $sql_all_images = sprintf("SELECT * FROM images ORDER BY uploaded_on %s LIMIT %d;", $sorting, 20);
            $result_images = mysqli_query($db, $sql_all_images);
        } else if ($currentSide == "liked-images") {
            $sql_liked_images = sprintf("SELECT * FROM images i INNER JOIN likes l ON i.image_id = l.image_id WHERE l.user_id=%d ORDER BY uploaded_on %s LIMIT %d", $_SESSION["id"], $sorting, 20);
            $result_images = mysqli_query($db, $sql_liked_images);
        } else {
            $sql_profile_images = sprintf("SELECT * FROM images WHERE user_id=%d ORDER BY uploaded_on %s LIMIT %d;", $_SESSION["id"], $sorting, 20);
            $result_images = mysqli_query($db, $sql_profile_images);
        }

        return array("rows" => $result_images->num_rows, "result" => $result_images);
    }
}
?>