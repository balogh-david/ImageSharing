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
    password = "";
    $("#reg-password").blur(function() {
        password = $(this).val();

        if ($("#confirm-password").val() == password && password != "") {
            $("#confirm-password").removeClass("is-invalid");
            $("#confirm-password").addClass("is-valid");
        } else if ($("#confirm-password").val() != "" && $("#confirm-password").val() != password && password != "") {
            $(".confirm-pass-error").html("A jelszavak nem egyeznek meg.");
            $("#confirm-password").removeClass("is-valid");
            $("#confirm-password").addClass("is-invalid");
        }

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

    // Jelsző megerősítésének ellenőrzése.
    $("#confirm-password").blur(function () {
        confirmPassword = $(this).val();
        if (confirmPassword.length < 1) {
            $(this).addClass("is-invalid");
        } else if (password != "" && confirmPassword == password) {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        } else {
            $(this).addClass("is-invalid");
            $(".confirm-pass-error").html("A jelszavak nem egyeznek meg.");
        }
    });

    $("#checkbox").change(function () {
        if ($("#checkbox").is(':checked')) {
            $("#missing-rules").html("");
        } else {
            $("#missing-rules").html("Adatvédelmi szabályzat elfogadása kötelező!");
        }
    });

    // Regisztrációhoz szükséges kérés.
    $("#signup").click(function() {
        const username_field = document.querySelector("#reg-username");
        const email_field = document.querySelector("#reg-email");
        const password_field = document.querySelector("#reg-password");
        const passwordConfirm_field = document.querySelector("#confirm-password");
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
        if (!passwordConfirm_field.classList.contains("is-valid")) {
            $("#confirm-password").addClass("is-invalid");
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
            password_field.classList.contains("is-valid") &&
            passwordConfirm_field.classList.contains("is-valid") 
            && rulesAccepted) {

            username = $("#reg-username").val();
            email = $("#reg-email").val();
            password = $("#reg-password").val();

            $.post('controller/signup-controller.php', {
                    postname: username,
                    postemail: email,
                    postpassword: password
                },
                function(data) {
                    if (data.error == "usernameAndEmail") {
                        $("#reg-email").removeClass("is-valid");
                        $("#reg-email").addClass("is-invalid");
                        $("#reg-username").removeClass("is-valid");
                        $("#reg-username").addClass("is-invalid");
                        $(".reg-username-error").html(data.msgUsername);
                        $(".reg-email-error").html(data.msgEmail);
                    } else if (data.error == "usernameError") {
                        $("#reg-username").removeClass("is-valid");
                        $("#reg-username").addClass("is-invalid");
                        $(".reg-username-error").html(data.msg);
                    } else if (data.error == "emailError") {
                        $("#reg-email").removeClass("is-valid");
                        $("#reg-email").addClass("is-invalid");
                        $(".reg-email-error").html(data.msg);
                    } else {
                        localStorage.setItem("registration", "success");
                        window.location = "login";
                    }
                });
        }
    });
});