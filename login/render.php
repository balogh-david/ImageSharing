<?php
Flight::render('../login/login.php', array('headTitle' => 'Képmegosztó - Kezdőlap',
                                           'title' => 'A feltöltéshez regisztrálj ingyenesen.',
                                           'signupLink' => 'Fiók létrehozása',
                                           'homeLink' => 'Kezdőlap',
                                           'or' => 'Vagy',
                                           'loginToYourAccount' => 'Jelentkezzen be.',
                                           'usernameIsRequired' => 'Felhasználónév megadása kötelező.',
                                           'passwordIsRequired' => 'Jelszó megadása kötelező.',
                                           'loginBtn' => 'Bejelentkezés',
                                           'successAlertMsg' => 'A fiók létrehozása sikeresen megtörtént.'
                                        ));
?>