<?php
require_once('server.php');

Flight::set("done", false);

if (isset($_FILES['file']['type'])) {
    Flight::set("file_type", $_FILES['file']['name']);
    Flight::set("ext", pathinfo(Flight::get("file_type"), PATHINFO_EXTENSION));

    if (isset($_POST['submit']) && Flight::get("ext") != "") {
        if ((Flight::get("ext") == "jpeg" || Flight::get("ext") == "png" || Flight::get("ext") == "jpg")) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                Flight::set("imageData", addslashes(file_get_contents($_FILES['file']['tmp_name'])));
                $imageProperties = getimagesize($_FILES['file']['tmp_name']);

                Flight::set("sql", "INSERT INTO images (user_id, username, file_name, image_data, uploaded_on) VALUES ('" . $_SESSION['id'] . "','" . $_SESSION['username'] . "','" . $imageProperties['mime'] . "','" . Flight::get("imageData") . "', NOW());");
                $conn->query(Flight::get("sql"));
                Flight::set("done", true);
            }
            if (Flight::get("done")) {
                echo '<script>localStorage.setItem("success_upload", 200)</script>';
                echo '<script>window.location="../profile"</script>';
            } else {
                echo '<script>localStorage.setItem("failed_upload", 0)</script>';
            }
        } else {
            echo '<script>localStorage.setItem("wrong_file_type", 1)</script>';
        }
    }

    if (isset($_POST['submit']) && Flight::get("ext") == "") {
        echo '<script>localStorage.setItem("empty_upload", 2)</script>';
    }
}
?>

<form class="text-white" id="myform" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" accept="image/*" hidden />
    <label for="file"><i class="fa fa-upload fa-5x"></i></label>
    <p class="mb-0 "><?php echo $chooseFileMsg ?></p>
    <p class="mb-0 "><?php echo $requiredFileTypeMsg ?></p>

    <div>
        <p class="filename mt-0"><?php echo $noImageSelectedMsg ?></p>
        <input type="submit" class="btn" name="submit" value="Fénykép feltöltése" />
    </div>
</form>