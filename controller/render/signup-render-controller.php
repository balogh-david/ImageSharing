<?php
Flight::map("signupRender", function() {
     Flight::render('signup/signup.php', array(
          'headTitle' => 'Képmegosztó - Fiók létrehozása',
          'title'  => 'A feltöltéshez jelentkezz be.',
          'loginLink' => 'Bejelentkezés',
          'homeLink' => 'Kezdőlap',
          'or' => 'Vagy',
          'createginToYourAccount' => 'Regisztrálj ingyenesen.',
          'usernameIsRequired' => 'Felhasználónév megadása kötelező.',
          'emailIsRequired' => 'Email cím megadása kötelező.',
          'passwordIsRequired' => 'Jelszó megadása kötelező.',
          'confirmPassword' => 'Jelszó megerősítése kötelező.',
          'rules' => 'Adatvédelmi szabályzat',
          'signupBtn' => 'Fiók létrehozása',
          'successAlertMsg' => 'A fiók létrehozása sikeresen megtörtént.',
          'modalTitle' => 'Adatvédelmi szabályzat',
          'modalBodyTitle' => 'Képekre vonatkozó:',
          'modalInfo' => 'A felhasználó számára tilos a Szolgáltatásokon belül és különösen az azokon közzétett kommunikációs lehetõségek keretében olyan tartalmakat közzétenni vagy terjeszteni, melyek:',
          'modalInfoA' => 'a) hatályos jogszabályokba ütköznek, ellenkeznek a közrenddel vagy –erkölccsel;',
          'modalInfoB' => 'b) harmadik személyek védjegyeit, szabadalmait, használati- vagy formatervezési mintáit, szerzõi jogait, üzleti titkait vagy egyéb jogait sértik;',
          'modalInfoC' => 'c) obszcén, rasszista, erõszakot dicsõítõ, pornográf, fiatalkorúakra veszélyes vagy gyermekek és fiatalkorúak fejlõdését veszélyeztetõ jellegûek, mások vallását, nemzeti, nemzetiségi hovatartozását gyalázó, sértõ kifejezések,',
          'modalInfoD' => 'd) sértõ, terhelõ vagy rágalmazó jellegûek;',
          'modalInfoE' => 'e) lánclevél- vagy hólabda-jellegû elemeket tartalmaznak;',
          'modalInfoF' => 'f) megtévesztõ módon azt a benyomást keltik, hogy a Szolgáltató által kerültek közzétételre vagy annak támogatását élvezik;',
          'modalInfoG' => 'g) harmadik személyek adatait tartalmazzák azok hozzájárulása nélkül;',
          'modalInfoH' => 'h) kereskedelmi, különösen reklám jellegûek (például más weboldalak hirdetése, szigorúan tiltott a Szolgáltatások bármelyikéhez tartozó weboldal címének, vagy akár a nevére utaló információ közlése)',
          'modalInfoI' => 'i) szabadon letölthető bármely kép, amely publikálásra került.',
          'acceptRulesBtn' => 'Oké'
     ));
});
?>