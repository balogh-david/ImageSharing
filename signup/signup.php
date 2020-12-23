<!DOCTYPE html />

<html lang="hu">
<head>
    <title><?php echo $headTitle ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="../favicon.png" />
    <script src="../regex.js"></script>
    <script src="signup.js"></script>
    <link rel="stylesheet" href="../global.css" />
    <link rel="stylesheet" href="signup.css" />
</head>
<body>
    <div class="container">
        <form>
            <div class="text-center">
                <h2 class="mb-5"><?php echo $title ?></h2>
                <a type="button" class="btn text-white mb-3" href="../login"><?php echo $loginLink ?></a>
                <a type="button" class="btn text-white mb-4" href="../home"><?php echo $homeLink ?></a>
            </div>

            <div class="divider mb-3">
                <strong class="text-uppercase divider-title"><?php echo $or ?></strong>
            </div>

            <div class="text-center mb-5">
                <h4><?php echo $createginToYourAccount ?></h4>
            </div>

            <div class="form-group input-group font-weight-light mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user" id="user"></i></div>
                </div>

                <input type="text" class="form-control" id="reg-username" placeholder="Felhasználónév" />
                <div class="invalid-feedback reg-username-error ml-2"><?php echo $usernameIsRequired ?></div>
            </div>

            <div class="form-group input-group font-weight-light mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                </div>

                <input type="email" class="form-control" id="reg-email" placeholder="example@gmail.com" />
                <div class="invalid-feedback reg-email-error ml-2"><?php echo $emailIsRequired ?></div>
            </div>

            <div class="form-group input-group font-weight-light mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock" id="lock"></i></div>
                </div>

                <input type="password" class="form-control" id="reg-password" placeholder="Jelszó" />
                <div class="invalid-feedback reg-pass-error ml-2"><?php echo $passwordIsRequired ?></div>
            </div>

            <div class="form-group input-group font-weight-light">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock" id="lock"></i></div>
                </div>

                <input type="password" class="form-control" id="confirm-password" placeholder="Jelszó megerősítése" />
                <div class="invalid-feedback confirm-pass-error ml-2"><?php echo $confirmPassword ?></div>
            </div>

            <div class="form-check ml-2">
                <input class="form-check-input" type="checkbox" value="" id="checkbox" />
                <label class="form-check-label" id="rules" for="checkbox"  data-toggle="modal" data-target="#rulesModal"><a href="#"><?php echo $rules ?></a></label>
            </div>

            <div class="ml-2 text-danger font-weight-light" id="missing-rules"></div>

            <div class="text-center">
                <button type="button" class="btn text-white mt-4" id="signup"><?php echo $signupBtn ?></button>
            </div>
        </form>

        <div class="modal fade" id="rulesModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $modalTitle ?></h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold"><?php echo $modalBodyTitle ?></p>
                        <?php echo $modalInfo ?>
                        
                        <p><?php echo $modalInfoA ?></p>
                        <p><?php echo $modalInfoB ?></p>
                        <p><?php echo $modalInfoC ?></p>
                        <p><?php echo $modalInfoD ?></p>
                        <p><?php echo $modalInfoE ?></p>
                        <p><?php echo $modalInfoF ?></p>
                        <p><?php echo $modalInfoG ?></p>
                        <p><?php echo $modalInfoH ?></p>
                        <p><?php echo $modalInfoI ?></p>

                        <div class="text-center">
                            <button class="btn bg-dark text-white w-25" data-dismiss="modal"><?php echo $acceptRulesBtn ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>