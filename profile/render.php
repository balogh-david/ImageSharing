<?php
Flight::render('../profile/profile.php', array(
                                               #profile.php
                                               'headTitle' => 'Képmegosztó - Profil',
                                               'logoutBtn' => 'Kijelentkezés',
                                               'title' => "Képmegosztó",
                                               'firstMenuLink' => 'Összes fénykép',
                                               'secondMenuLink' => 'Kedvelt fényképek',
                                               'thirdMenuLink' => 'Saját fényképek',
                                               'fourthMenuLink' => 'Adatok módosítása',
                                               'fifthMenuLink' => 'Fénykép feltöltése',
                                               'sortNewImages' => 'Legújabb',
                                               'sortOldImages' => 'Legrégebbi',
                                               'successLoginMsg' => 'Sikeres bejelentkezés.',
                                               'successUploadMsg' => 'A fénykép feltöltése sikeres volt.',
                                               'failedUploadMsg' => 'A fénykép feltöltése sikertelen.',
                                               'wrongFileTypeMsg' => 'Érvénytelen fájl formátum.',
                                               'emptyUploadMsg' => 'Fájl kiválasztása kötelező.',

                                               #change_data/modify.php
                                               'modifyTitle' => 'Fiókhoz tartozó adatok módosítása',
                                               'modifyProfilLink' => 'Profil adatok módosítása',
                                               'modifyPwdLink' => 'Jelszó módosítása',
                                               'usernameLabel' => 'Felhasználónév:',
                                               'cannotBeModified' => 'Nem módosítható.',
                                               'emailLabel' => 'Email cím:',
                                               'emailFormatRequired' => 'Email formátum kötelező.',
                                               'fieldIsRequired' => 'A mező kitöltése kötelező.',
                                               'currentPwdLabel' => 'Jelenlegi jelszó:',
                                               'requiredForModify' => 'A módosítás jóváhagyása miatt kötelező mező.',
                                               'modifyBtn' => 'Módosítás',
                                               'newPwdLabel' => 'Új jelszó:',
                                               'min6Char' => 'Minimum 6 karakter.',
                                               'confirmNewPwdLabel' => 'Új jelszó megerősítése:',
                                               'requiredField' => 'Kötelező mező.',
                                               'successedModifyMsg' => 'Sikeres Módosítás.',
                                               'failedModifyMsg' => 'Sikertelen Módosítás.',

                                               #display_images/all-images.php / profile-tab.php
                                               'moreImages' => 'További képek..',

                                               #display_images/image-modal.php
                                               'modalDownload' => 'Letöltés',
                                               'sendComment' => 'Hozzászólás elküldése',

                                               #upload_image/upload.php
                                               'chooseFileMsg' => 'Válassza ki képét a vágólapról a feltöltéshez.',
                                               'requiredFileTypeMsg' => 'JPEG/PNG kiterjesztésű fájl tölthető fel.',
                                               'noImageSelectedMsg' => 'Nincs kiválasztott fénykép.'
                                        ));
?>