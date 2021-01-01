<!DOCTYPE html />

<html lang="hu">
<head>
    <title><?php echo $headTitle ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="assets/image/favicon.png" />
    <link rel="stylesheet" href="assets/css/global.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
</head>
<body>
    <div class="container">
        <form>
            <div class="text-center">
                <h2 class="mb-5"><?php echo $title ?></h2>
                <a type="button" class="btn text-white mb-3" href="signup"><?php echo $signupLink ?></a>
                <a type="button" class="btn text-white mb-4" href="home"><?php echo $homeLink ?></a>
            </div>

            <div class="divider mb-3">
                <strong class="text-uppercase divider-title"><?php echo $or ?></strong>
            </div>

            <div class="text-center mb-5">
                <h4><?php echo $loginToYourAccount ?></h4>
            </div>

            <div class="form-group input-group font-weight-light mb-5">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                </div>

                <input type="text" class="form-control" id="log-username" placeholder="Felhasználónév" />
                <div class="invalid-feedback ml-2"><?php echo $usernameIsRequired ?></div>
            </div>

            <div class="form-group input-group font-weight-light">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                </div>

                <input type="password" class="form-control" id="log-password" placeholder="Jelszó" />
                <div class="invalid-feedback ml-2"><?php echo $passwordIsRequired ?></div>
            </div>

            <div class="text-center">
                <div>
                    <small class="error text-danger ml-2"></small>
                </div>
                <button type="button" class="btn text-white mt-4"><?php echo $loginBtn ?></button>
            </div>
        </form>

        <div class="alert alert-success alert-lg text-center border mt-5 mb-5" hidden id="successedRegistration" role="alert">
            <?php echo $successAlertMsg ?>
        </div>
    </div>
</body>
</html>