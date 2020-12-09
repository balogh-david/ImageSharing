$(document).ready(function() {
    // Modal ablak megjelenítése.
    $("#rules").click(function () {
        $("#rulesModal").modal('show');
    });

    // Felhasználónév mező ellenőrzése.
    $("#reg-username").blur(function() {
        username = $(this).val();
        if (username.length < 1) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });

    // Email mező ellenőrzése.
    $("#reg-email").blur(function() {
        email = $(this).val();
        if (email.length < 1) {
            $(this).addClass("is-invalid");
        } else if (email.match(email_Regex) == null) {
            $(this).addClass("is-invalid");
            $(".reg-email-error").html("A megadott email formátum érvénytelen.");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });

    // Jelszó mező ellenőrzése.
    $("#reg-password").blur(function() {
        password = $(this).val();
        if (password.length < 1) {
            $(this).addClass("is-invalid");
        } else if (password.length < 6) {
            $(this).addClass("is-invalid");
            $(".reg-pass-error").html("Jelszónak minimum 6 karakterből kell, hogy álljon.");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });

    // Regisztrációhoz szükséges kérés.
    $("#signup").click(function() {
        const username_field = document.querySelector("#reg-username");
        const email_field = document.querySelector("#reg-email");
        const password_field = document.querySelector("#reg-password");
        rulesAccepted = false;

        if (!username_field.classList.contains("is-valid")) {
            $("#reg-username").addClass("is-invalid");
        }
        if (!email_field.classList.contains("is-valid")) {
            $("#reg-email").addClass("is-invalid");
        }
        if (!password_field.classList.contains("is-valid")) {
            $("#reg-password").addClass("is-invalid");
        }

        // Szabályzat ellenőrzése
        if ($("#checkbox").is(':checked')) {
            $("#missing-rules").html("");
            rulesAccepted = true;
        } else {
            $("#missing-rules").html("Adatvédelmi szabályzat elfogadása kötelező!");
        }

        if (username_field.classList.contains("is-valid") &&
            email_field.classList.contains("is-valid") &&
            password_field.classList.contains("is-valid") && rulesAccepted) {

            username = $("#reg-username").val();
            email = $("#reg-email").val();
            password = $("#reg-password").val();

            $.post('query.php', {
                    postname: username,
                    postemail: email,
                    postpassword: password
                },
                function(data) {
                    if (data == "error") {
                        $("#reg-email").removeClass("is-valid");
                        $("#reg-email").addClass("is-invalid");
                        $("#reg-username").removeClass("is-valid");
                        $("#reg-username").addClass("is-invalid");
                        $(".reg-username-error").html("Ez a felhasználónév már használatban van.");
                        $(".reg-email-error").html("Ez az email cím már használatban van.");
                    } else if (data == "username-error") {
                        $("#reg-username").removeClass("is-valid");
                        $("#reg-username").addClass("is-invalid");
                        $(".reg-username-error").html("Ez a felhasználónév már használatban van.");
                    } else if (data == "email-error") {
                        $("#reg-email").removeClass("is-valid");
                        $("#reg-email").addClass("is-invalid");
                        $(".reg-email-error").html("Ez az email cím már használatban van.");
                    } else {
                        window.location.href = "../login/login.php";
                    }
                });
        }
    });
});