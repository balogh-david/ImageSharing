<!DOCTYPE html />

<html lang="hu">
<head>
    <title><?php echo $headTitle ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="/assets/image/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/assets/js/profile.js"></script>
    <script src="/assets/js/images.js"></script>   
    <script src="/assets/js/comment.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="/assets/css/profile.css" />
</head>
<body>
    <nav class="p-2 d-flex justify-content-between" id="navbar">
        <div class="d-flex">
            <p class="text-white text-uppercase m-0 mr-2" id="username"><?php echo $_SESSION['username']; ?></p>
            <strong data-toggle="tooltip" title="Általad kedvelt fényképek száma." class="account-information mr-1"
                id="total-liked-images"><?php echo $nopil; ?></strong>
            <strong data-toggle="tooltip" title="Feltöltött képeidre kapott összes kedvelések száma."
                class="account-information mr-1" id="total-count-hearts"><?php echo $All_like; ?></strong>
            <strong data-toggle="tooltip" title="Feltöltött képek száma." class="account-information"
                id="total-count-images"><?php echo $total; ?></strong>
        </div>
        <input type="hidden" value="<?= $side ?>" id="currentSide" />
        <a class="text-white text-uppercase mt-1" id="logout" href="logout"><?php echo $logoutBtn ?></a>
    </nav>

    <div class="container mt-3 ">
        <h1 class="text-center"><?php echo $title ?></h1>
        <div class="mt-4" id="menu">
            <a class="nav-link" id="all-images" href="?side=all-images"><?php echo $firstMenuLink ?></a>
            <a class="nav-link" id="liked-images" href="?side=liked-images"><?php echo $secondMenuLink ?></a>
            <a class="nav-link" id="profile" href="profile"><?php echo $thirdMenuLink ?></a>
            <a class="nav-link" id="modify" href="#" data-toggle="modal" data-target="#modal_modify"><?php echo $fourthMenuLink ?></a>
            <a class="nav-link" id="upload" href="#" onclick="openUpload()"><?php echo $fifthMenuLink ?></a>
        </div>

        <hr class="solid" />

        <div class="sorting d-flex justify-content-center">
            <a href="#" class="mr-5 active" id="new_images"><?php echo $sortNewImages ?></a>
            <a href="#" id="old_images"><?php echo $sortOldImages ?></a>
        </div>
    </div>

    <?php require_once("change_data/modify.php"); ?>
    <?php require_once("display_images/image-modal.php"); ?>
    
    <div>
        <?php
        require_once($filename);
        ?>
    </div>

    <div id="my-upload" class="overlay bg-dark mt-5">
        <a class="closebtn text-white" onclick="closeUpload()">&times;</a>
        <div class="overlay-content mt-5">
            <?php require_once("upload_image/upload.php") ?>
        </div>
    </div>

    <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedLogin" role="alert">
        <?php echo $successLoginMsg ?>
    </div>

    <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedUpload" role="alert">
        <?php echo $successUploadMsg ?>
    </div>

    <div class="alert alert-danger alert-lg text-center border mt-5 mb-5" hidden id="failedUpload" role="alert">
        <?php echo $failedUploadMsg ?>
    </div>

    <div class="alert alert-danger alert-lg text-center border mt-5 mb-5" hidden id="wrongFileType" role="alert">
        <?php echo $wrongFileTypeMsg ?>
    </div>

    <div class="alert alert-danger alert-lg text-center border mt-5 mb-5" hidden id="empty_upload" role="alert">
        <?php echo $emptyUploadMsg ?>
    </div>

    <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="imageIsDeleted" role="alert">
        <?php echo $imageIsDeletedMsg ?>
    </div>

    <div class="alert alert-danger alert-lg text-center border mt-5 mb-5" hidden id="imageIsNotDeleted" role="alert">
        <?php echo $imageIsNotDeletedMsg ?>
    </div>
</body>
</html>