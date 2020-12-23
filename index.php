<?php
require 'flight/Flight.php';
session_start();

Flight::map('checkLoggedIn', function(){
    return isset($_SESSION["id"]) && $_SESSION["id"] != null;
});

Flight::map('renderOrRedirectByLoggedIn', function($render, $redirect){
    if (Flight::checkLoggedIn()) {
        Flight::redirect($redirect);
    } else {
        Flight::render($render);
    }
});

Flight::map('renderOrRedirectByNotLoggedIn', function($render, $redirect){
    if (!Flight::checkLoggedIn()) {
        Flight::redirect($redirect);
    } else {
        Flight::render($render);
    }
});

Flight::route("/login", function() {
    Flight::renderOrRedirectByLoggedIn("../login/render.php", "profile");
});

Flight::route("/login/*", function() {
    Flight::redirect("login");
});  

Flight::route("/home", function(  ) {
    Flight::renderOrRedirectByLoggedIn("../home/render.php", "profile");
}); 

Flight::route("/home/*", function() {
    Flight::redirect("home");
}); 

Flight::route("/signup", function() {
    Flight::renderOrRedirectByLoggedIn("../signup/render.php", "profile");
});

Flight::route("/signup/*", function() {
    Flight::redirect("signup");
}); 

Flight::route("/profile", function() {
    Flight::renderOrRedirectByNotLoggedIn("../profile/render.php", "login");
}); 

Flight::route("/profile/*", function() {
    Flight::redirect("profile");
});

Flight::route("/*", function() {
    Flight::redirect("home");
});

Flight::start();
?>