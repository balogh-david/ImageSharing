<?php
require 'model/profile_model.php';

Flight::map("profileRender", function() {

       $countArray = ProfileModel::countAllAndCurrentUserImages();
       $All_like = ProfileModel::allReceivedLikes();
       $count_NOPIL = ProfileModel::allGivenLikes();
       $images = ProfileModel::showImages();

       if (!isset($_GET["side"])) {
              $_GET["side"] = "";
       } 

       switch ($_GET["side"]) :
              case "all-images":
                  $file_name = "display_images/all-images.php";
                  break;
              case "liked-images":
                  $file_name = "display_images/liked-images.php";
                  break;
              default:
                  $file_name = "display_images/profile-tab.php";
       endswitch;
       
       Flight::render('profile/profile.php', array(
              #profile.php
              'headTitle' => 'Képmegosztó - Profil',
              'Alltotal' => $countArray["allcount"],
              'total' => $countArray["count"],
              'All_like' => $All_like,
              'images' => $images,
              'nopil' =>  $count_NOPIL,
              'filename' => $file_name,
              'side' => $_GET["side"],
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
              'imageIsDeletedMsg' => 'Fénykép törlése sikeres volt.',
              'imageIsNotDeletedMsg' => 'Fénykép törlése sikeretelen volt.',
       
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
              'deleteModalTitle' => 'Fénykép törlése',
              'deleteConfirmMsg' => 'Biztos törölni szeretnéd a képet?',
              'deleteInfo' => 'A fénykép törlésével törlödnek a hozzá tartozó hozzászólások és kedvelések is.',
              'deleteInfoTwo' => 'A törlés nem vonható vissza!',
              'deleteBtn' => 'Törlés',
              'skipDeleteBtn' => 'Mégse',
       
              #display_images/image-modal.php
              'modalDownload' => 'Letöltés',
              'sendComment' => 'Hozzászólás elküldése',
       
              #upload_image/upload.php
              'chooseFileMsg' => 'Válassza ki képét a vágólapról a feltöltéshez.',
              'requiredFileTypeMsg' => 'JPEG/PNG kiterjesztésű fájl tölthető fel.',
              'noImageSelectedMsg' => 'Nincs kiválasztott fénykép.'
       ));
});
?>