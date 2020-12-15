<?php
require_once('../server.php');

$done = false;

if (isset($_FILES['file']['type'])) {
    $file_type = $_FILES['file']['name'];
    $ext = pathinfo($file_type, PATHINFO_EXTENSION);

    if (isset($_POST['submit']) && $ext != "") {
        if (($ext == "jpeg" || $ext == "png")) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $imageData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                $imageProperties = getimagesize($_FILES['file']['tmp_name']);

                $sql = "INSERT INTO images (user_id, username, file_name, image_data, uploaded_on) VALUES ('" . $_SESSION['id'] . "','" . $_SESSION['username'] . "','" . $imageProperties['mime'] . "','" . $imageData . "', NOW());";
                $conn->query($sql);
                $done = true;
            }
            if ($done) {
                echo '<script>localStorage.setItem("success_upload", 200)</script>';
                echo '<script>window.location="profile.php"</script>';
            } else {
                echo '<script>localStorage.setItem("failed_upload", 0)</script>';
            }
        } else {
            echo '<script>localStorage.setItem("wrong_file_type", 1)</script>';
        }
    }

    if (isset($_POST['submit']) && $ext == "") {
        echo '<script>localStorage.setItem("empty_upload", 2)</script>';
    }
}
?>

<form class="text-white" id="myform" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" accept="image/*" hidden />
    <label for="file"><i class="fa fa-upload fa-5x"></i></label>
    <p class="mb-0 ">Válassza ki képét a vágólapról a feltöltéshez.</p>
    <p class="mb-0 ">JPEG/PNG kiterjesztésű fájl tölthető fel.</p>

    <div>
        <p class="filename mt-0">Nincs kiválasztott fénykép.</p>
        <input type="submit" class="btn" name="submit" value="Fénykép feltöltése" />
    </div>
</form>