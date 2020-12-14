<?php
session_start();
require_once("../server.php");

if (!isset($_SESSION["id"]) || $_SESSION["id"] == null) {
    header("Location: ../login/login.php");
}

$side = filter_input(INPUT_GET, "side");

$_SESSION['side'] = "profile";

/* Fiókhoz tartozó összes feltöltött kép darabszáma. */
$sql_count_images = "SELECT COUNT(*) AS total FROM images WHERE user_id = '" . $_SESSION["id"] . "';";
$result_sql_count_images = mysqli_query($conn, $sql_count_images);
$count = mysqli_fetch_assoc($result_sql_count_images);

/* Oldalra feltöltött összes kép darabszáma. */
$sql_count_Allimages = "SELECT COUNT(*) AS Alltotal FROM images";
$result_sql_count_Allimages = mysqli_query($conn, $sql_count_Allimages);
$Allcount = mysqli_fetch_assoc($result_sql_count_Allimages);

$sql_number_of_pictures_I_liked = "SELECT COUNT(*) AS NOPIL FROM images WHERE image_id IN (SELECT image_id FROM likes WHERE user_id='" . $_SESSION["id"] . "');";
$result_sql_number_of_pictures_I_liked = mysqli_query($conn, $sql_number_of_pictures_I_liked);
$count_NOPIL = mysqli_fetch_assoc($result_sql_number_of_pictures_I_liked);

$sql_liked_images = "SELECT COUNT(*) AS likedTotal FROM likes WHERE image_id IN (SELECT image_id FROM images WHERE user_id='" . $_SESSION['id'] . "');";
$result_sql_liked_images = mysqli_query($conn, $sql_liked_images);
$All_like = mysqli_fetch_assoc($result_sql_liked_images);

$_SESSION['total'] = $count['total'];
$_SESSION['Alltotal'] = $Allcount['Alltotal'];

if (isset($_POST["logout"])) {
    $_SESSION["id"] = null;
    $_SESSION["username"] = null;
}
?>

<!DOCTYPE html>

<html lang="hu">
<head>
    <title>Képmegosztó - Profil</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <script src="profile.js"></script>
    <link rel="stylesheet" href="../global.css" />
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <nav class="p-2 d-flex justify-content-between" id="navbar">
        <div class="d-flex">
            <p class="text-white text-uppercase m-0 mr-2" id="username"><?php echo $_SESSION['username']; ?></p>
            <strong data-toggle="tooltip" title="Feltöltött képeidre kapott összes szív száma."
                class="account-information mr-1" id="total-count-hearts"><?php echo $All_like['likedTotal']; ?></strong>
            <strong data-toggle="tooltip" title="Feltöltött képek száma." class="account-information"
                id="total-count-images"><?php echo $count['total']; ?></strong>
        </div>
        <p class="text-white text-uppercase m-0" id="logout">Kijelentkezés</p>
    </nav>

    <div class="container mt-3 ">
        <h1 class="text-center">Képmegosztó </h1>
        <div class="mt-4" id="menu">
            <a class="nav-link" id="all-images" href="profile.php?side=all-images">Összes fénykép</a>
            <a class="nav-link" id="liked-images" href="profile.php?side=liked-images">Kedvelt fényképek</a>
            <a class="nav-link" id="profile" href="profile.php?side=profile">Saját fényképek</a>
            <a class="nav-link" id="modify" href="#" data-toggle="modal" data-target="#modal_modify">Adatok módosítása</a>
            <a class="nav-link" id="upload" href="#" onclick="openUpload()">Fénykép feltöltése</a>
        </div>

        <hr class="solid" />

        <div class="sorting d-flex justify-content-center">
            <a href="#" class="mr-5 active" id="new_images">Legújabb</a>
            <a href="#" id="old_images">Legrégebbi</a>
        </div>
    </div>

    <?php require_once("change_data/modify.php"); ?>
    <?php require_once("display_images/image-modal.php"); ?>
    
    <div>
        <?php
        switch ($side) {
            case "all-images":
                require_once("display_images/all-images.php");
                break;
            case "liked-images":
                require_once("display_images/liked-images.php");
                break;
            default:
                require_once("display_images/profile-tab.php");
        }
        ?>
    </div>

    <div id="my-upload" class="overlay bg-dark mt-5">
        <a class="closebtn text-white" onclick="closeUpload()">&times;</a>
        <div class="overlay-content mt-5">
            <?php require_once("upload_image/upload.php") ?>
        </div>
    </div>

    <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedLogin" role="alert">
            Sikeres bejelentkezés.
    </div>

    <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedUpload" role="alert">
            A fénykép feltöltése sikeres volt.
    </div>

    <div class="alert alert-danger alert-lg text-center border mt-5 mb-5" hidden id="failedUpload" role="alert">
            A fénykép feltöltése sikertelen.
    </div>
</body>
</html>