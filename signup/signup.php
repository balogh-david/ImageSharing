<?php
session_start();
if (isset($_SESSION["id"]) && $_SESSION["id"] != null) {
    header("Location: ../profile/profile.php");
}
?>

<!DOCTYPE html />

<html lang="hu">
<head>
    <title>Képmegosztó - Fiók létrehozása</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <h2 class="mb-5">A feltöltéshez jelentkezz be.</h2>
                <a type="button" class="btn text-white mb-3" href="../login/login.php">Bejelentkezés</a>
                <a type="button" class="btn text-white mb-4" href="../home/home.php">Kezdőlap</a>
            </div>

            <div class="divider mb-3">
                <strong class="text-uppercase divider-title">vagy</strong>
            </div>

            <div class="text-center mb-5">
                <h4>Regisztrálj ingyenesen.</h4>
            </div>

            <div class="form-group font-weight-light">
                <label for="reg-username">Felhasználónév</label>
                <input type="text" class="form-control" id="reg-username" placeholder="David" />
                <div class="invalid-feedback reg-username-error ml-2">Felhasználónév megadása kötelező.</div>
            </div>

            <div class="form-group font-weight-light">
                <label for="reg-email">Email cím</label>
                <input type="email" class="form-control" id="reg-email" placeholder="example@gmail.com" />
                <div class="invalid-feedback reg-email-error ml-2">Email cím megadása kötelező.</div>
            </div>

            <div class="form-group font-weight-light">
                <label for="reg-password">Jelszó</label>
                <input type="password" class="form-control" id="reg-password" placeholder="Jelszó" />
                <div class="invalid-feedback reg-pass-error ml-2">Jelszó megadása kötelező.</div>
                <small class="text-muted ml-2">Minimum 6 karakter.</small>
            </div>

            <div class="form-check ml-2">
                <input class="form-check-input" type="checkbox" value="" id="checkbox" />
                <label class="form-check-label" id="rules" for="checkbox"  data-toggle="modal" data-target="#rulesModal"><a href="#">Adatvédelmi szabályzat</a></label>
            </div>

            <div class="ml-2 text-danger font-weight-light" id="missing-rules"></div>

            <div class="text-center">
                <button type="button" class="btn text-white mt-4" id="signup">Fiók létrehozása</button>
            </div>
        </form>

        <div class="modal fade" id="rulesModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adatvédelmi szabályzat</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold">Képekre vonatkozó:</p>
                        A felhasználó számára tilos a Szolgáltatásokon belül és különösen az azokon közzétett kommunikációs lehetõségek keretében olyan tartalmakat közzétenni vagy terjeszteni, melyek

                        <p>a) hatályos jogszabályokba ütköznek, ellenkeznek a közrenddel vagy –erkölccsel;</p>
                        <p>b) harmadik személyek védjegyeit, szabadalmait, használati- vagy formatervezési mintáit, szerzõi jogait, üzleti titkait vagy egyéb jogait sértik;</p>
                        <p>c) obszcén, rasszista, erõszakot dicsõítõ, pornográf, fiatalkorúakra veszélyes vagy gyermekek és fiatalkorúak fejlõdését veszélyeztetõ jellegûek, mások vallását, nemzeti, nemzetiségi hovatartozását gyalázó, sértõ kifejezések,</p>
                        <p>d) sértõ, terhelõ vagy rágalmazó jellegûek;</p>
                        <p>e) lánclevél- vagy hólabda-jellegû elemeket tartalmaznak;</p>
                        <p>f) megtévesztõ módon azt a benyomást keltik, hogy a Szolgáltató által kerültek közzétételre vagy annak támogatását élvezik;</p>
                        <p>g) harmadik személyek adatait tartalmazzák azok hozzájárulása nélkül;</p>
                        <p>h) kereskedelmi, különösen reklám jellegûek (például más weboldalak hirdetése, szigorúan tiltott a Szolgáltatások bármelyikéhez tartozó weboldal címének, vagy akár a nevére utaló információ közlése)</p>
                        <p>i) szabadon letölthető bármely kép, amely publikálásra került.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>