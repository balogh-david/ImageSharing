<?php
session_start();
if (isset($_SESSION["id"]) && $_SESSION["id"] != null) {
    header("Location: ../profile/profile.php");
}
?>

<!DOCTYPE html />

<html lang="hu">
<head>
    <title>Képmegosztó - Bejelentkezés</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="../favicon.png" />
    <link rel="stylesheet" href="../global.css" />
    <link rel="stylesheet" href="login.css" />
</head>
<body>
    <div class="container">
        <form>
            <div class="text-center">
                <h2 class="mb-5">A feltöltéshez regisztrálj ingyenesen.</h2>
                <a type="button" class="btn text-white mb-3" href="../signup/signup.php">Fiók létrehozása</a>
                <a type="button" class="btn text-white mb-4" href="../home/home.php">Kezdőlap</a>
            </div>

            <div class="divider mb-3">
                <strong class="text-uppercase divider-title">vagy</strong>
            </div>

            <div class="text-center mb-5">
                <h4>Jelentkezz be.</h4>
            </div>

            <div class="form-group font-weight-light">
                <label for="log-username">Felhasználónév</label>
                <input type="text" class="form-control" id="log-username" />
                <div class="invalid-feedback ml-2">Felhasználónév megadása kötelező.</div>
            </div>

            <div class="form-group font-weight-light">
                <label for="log-password">Jelszó</label>
                <input type="password" class="form-control" id="log-password">
                <div class="invalid-feedback ml-2">Jelszó megadása kötelező.</div>
            </div>

            <div class="text-center">
                <div>
                    <small class="error text-danger ml-2"></small>
                </div>
                <button type="button" class="btn text-white mt-4">Bejelentkezés</button>
            </div>
        </form>

        <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedRegistration" role="alert">
            A fiók létrehozása sikeresen megtörtént.
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>