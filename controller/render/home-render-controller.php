<?php
Flight::map("homeRender", function() {
    Flight::render('home/home.php', array(
        'headTitle' => 'Képmegosztó - Kezdőlap',
        'title' =>  'Képmegosztó',
        'motto' => 'Töltse fel képeit és ossza meg őket a világgal.',
        'bottomFixMsg' => 'Megkezdéshez jelentkezzen be, vagy készítse el fiókját!',
        'loginLink' => 'Bejelentkezés',
        'signupLink' => 'Fiók létrehozása'
    ));
});
?>