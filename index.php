<?php
require 'vendor/autoload.php';
require 'controller/render/login-render-controller.php';
require 'controller/render/signup-render-controller.php';
require 'controller/render/home-render-controller.php';
require 'controller/render/profile-render-controller.php';

session_start();


if (isset($_SESSION["id"]) && $_SESSION["id"] != null) {
    Flight::route("GET|POST /profile", function() {
        Flight::profileRender();
    }); 

    Flight::route("GET|POST /logout", function() {
        session_destroy();
        Flight::redirect("login");
    });

    Flight::route("GET|POST /*", function() {
        Flight::redirect("../profile");
    });
} else {
    Flight::route("GET|POST /home", function() {
        Flight::homeRender();
    }); 

    Flight::route("GET|POST /signup", function() {
        Flight::signupRender();
    });

    Flight::route("GET|POST /login", function() {
        Flight::loginRender();
    });

    Flight::route("GET|POST /*", function() {
        Flight::redirect("../login");
    });
}

Flight::start();
?>