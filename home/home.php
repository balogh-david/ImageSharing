<?php
session_start();
if (isset($_SESSION["id"]) && $_SESSION["id"] != null) {
    header("Location: ../profile/profile.php");
}
?>

<!DOCTYPE html />

<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./home.css">
    <title>Képmegosztó - Kezdőlap</title>
</head>
<body>
    <main>
        <div class="title text-center">
            <h1 class="centered">Képmegosztó</h1>
        </div>

        <div class="text-center container">
            <div class="bottom-fix d-flex justify-content-between align-items-center">
                <p class="mb-0">Megkezdéshez jelentkezzen be, vagy készítse el fiókját!</p>
                <p class="mb-0">Korlát 1MB</p>
            </div>

            <h4>Töltse fel képeit és ossza meg őket a világgal.</h4>

            <div class="mt-5">
                <a class="btn bg-dark text-white" href="../login/login.php">Bejelentkezés</a>
            </div>

            <div class="mt-4 mb-5 pb-5">
                <a class="btn bg-dark text-white" href="../signup/signup.php">Fiók létrehozása</a>
            </div>
        </div>
    </main>
</body>
</html>