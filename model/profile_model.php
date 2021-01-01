<?php
require 'server.php';

class ProfileModel {

    // Összes fénykép darabszáma, amely felkerült az oldalra.
    // Összes fénykép darabszáma, amelyet a felhasználó töltött fel.
    public static function countAllAndCurrentUserImages() {
        $db = DBclass::getInstance();

        $res = $db->query(sprintf("SELECT COUNT(*), SUM( user_id = %d ) FROM images", $_SESSION["id"]));
        list($allcount, $count) = $res->fetch_row();
        $res->free_result();

        return array("allcount" => $allcount, "count" => $count);
    }

    // Összes kapott kedvelés száma.
    public static function allReceivedLikes() {
        $db = DBclass::getInstance();

        $res = $db->query("SELECT COUNT(*) FROM likes l INNER JOIN images i ON i.image_id=l.image_id WHERE i.user_id=" . $_SESSION["id"]);
        $All_like = $res->fetch_row()[0];
        $res->free_result();

        return $All_like;
    }

    // Összes adott kedvelés száma.
    public static function allGivenLikes() {
        $db = DBclass::getInstance();

        $res = $db->query("SELECT count(DISTINCT l.id) FROM likes l JOIN images i ON i.image_id=l.image_id WHERE l.user_id=" . $_SESSION["id"]);
        $count_NOPIL = $res->fetch_row()[0];
        $res->free_result();

        return $count_NOPIL;
    }

    // Fényképek megjelenítése különböző feltételek alapján.
    public static function showImages() {
        $db = DBclass::getInstance();

        if (isset($_GET["side"])) {
            switch ($_GET["side"]) {
                case "all-images":
                    $res = $db->query(sprintf("SELECT * FROM images ORDER BY uploaded_on DESC LIMIT %d", 20));
                    $images = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free_result();
                    break;
                case "liked-images":
                    $res = $db->query(sprintf("SELECT * FROM images i INNER JOIN likes l ON i.image_id = l.image_id WHERE l.user_id = %d ORDER BY uploaded_on DESC LIMIT %d", $_SESSION["id"], 20));
                    $images = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free_result();
                    break;
            }
            return $images;
        } else {
            // Összes fénykép, amely a felhasználóhoz tartozik.
            $res = $db->query(sprintf("SELECT i.*,count(DISTINCT l.id) image_likes FROM images i LEFT JOIN likes l ON i.image_id=l.image_id WHERE i.user_id=%d GROUP BY i.image_id ORDER BY uploaded_on DESC LIMIT %d", $_SESSION["id"], 20));
            $images = $res->fetch_all(MYSQLI_ASSOC);
            $res->free_result();

            return $images;
        }
    }
} 