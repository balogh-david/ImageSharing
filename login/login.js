$(document).ready(function() {
    // Felhasználónév mező ellenőrzése.
    $("#log-username").blur(function() {
        username = $(this).val();
        if (username.length < 1) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    // Jelszó mező ellenőrzése.
    $("#log-password").blur(function() {
        password = $(this).val();
        if (password.length < 1) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    // Bejelentkezéshez szükséges kérés.
    $(":button").click(function() {
        username = $("#log-username").val();
        password = $("#log-password").val();

        $.post('query.php', {
                postUsername: username,
                postPassword: password
            },
            function(data) {
                if (data == "error") {
                    $(".error").html("Hibás felhasználónév vagy jelszó.");
                } else {
                    window.location.href = "../profile/profile.php";
                }
            });
    });
});