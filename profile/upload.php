<?php
require_once('../server.php');

if (isset($_FILES['file']['type'])) {
    $file_type = $_FILES['file']['type'];
    $allowed = array("image/jpeg", "image/png");
}

if (isset($_POST['submit'])) {
    if (in_array($file_type, $allowed) && is_uploaded_file($_FILES['file']['tmp_name'])) {
        $imageData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $imageProperties = getimagesize($_FILES['file']['tmp_name']);

        $sql = "INSERT INTO images (user_id, username, file_name, image_data, uploaded_on) VALUES ('" . $_SESSION['id'] . "','" . $_SESSION['username'] . "','" . $imageProperties['mime'] . "','" . $imageData . "', NOW());";
        $conn->query($sql);

        echo '<script>window.location="profile.php"</script>';
    }
}
?>

<form class="text-white" id="myform" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" accept="image/*" hidden />
    <label for="file"><i class="fa fa-upload fa-5x"></i></label>
    <p class="mb-0 ">Válassza ki képét a vágólapról a feltöltéshez.</p>

    <div>
        <p class="filename mt-0">Nincs kiválasztott fénykép.</p>
        <input type="submit" class="btn" name="submit" value="Fénykép feltöltése" />
    </div>

    <script src="profile.js"></script>
</form>