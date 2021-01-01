$(document).ready(function() {
    if (localStorage.getItem("registration")) {
        localStorage.removeItem("registration");
        $("#successedRegistration").removeAttr("hidden");
        $("#successedRegistration").hide();

        $("#successedRegistration").fadeIn(2000);

        setTimeout(() => {
            $("#successedRegistration").fadeOut();
        }, 4000);
    }

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

        $.post('controller/login-controller.php', {
                postUsername: username,
                postPassword: password
            },
            function(data) {
                if (data.error) {
                    $(".error").html(data.msg);
                } else {
                    localStorage.setItem("login", "success");
                    window.location.href = "profile";
                }
            });
    });
});