$(document).ready(function () {
    $("#success_msg").hide();

    $("#close-icon").click(function () {
        $("#confirm").val("");
        $("#confirm").removeClass("is-invalid");

        $("#password").val("");
        $("#password").removeClass("is-invalid");

        $("#newPassConfirm").val("");
        $("#newPassConfirm").removeClass("is-invalid");

        $("#currentPass").val("");
        $("#currentPass").removeClass("is-invalid");
    });

    $("#email").keyup(function () {
        email = $(this).val();
        if (email.length < 1) {
            $(this).addClass("is-invalid");
        } else if (email.match(email_Regex) == null) {
            $(this).addClass("is-invalid");
            $(".email-error").html("A megadott email formátum érvénytelen.");
        } else {
            $.post(
                "controller/change_data/modify-email-controller.php",
                { email: email },
                function (data) {
                    if (data.error) {
                        $("#email").addClass("is-invalid");
                        $(".email-error").html(data.msg);
                    } else {
                        $("#email").removeClass("is-invalid");
                    }
                }
            );
        }
    });

    $("#confirm").keyup(function () {
        confirmPass = $(this).val();
        if (confirmPass.length < 1) {
            $(this).addClass("is-invalid");
        } else {
            $.post(
                "controller/change_data/confirm-password-controller.php",
                { confirmPass: confirmPass },
                function (data) {
                    if (data.error) {
                        $("#confirm").addClass("is-invalid");
                        $(".confirm-error").html(data.msg);
                    } else {
                        $("#confirm").removeClass("is-invalid");
                    }
                }
            );
        }
    });

    $("#currentPass").keyup(function () {
        currentPass = $(this).val();
        if (currentPass.length < 1) {
            $(this).addClass("is-invalid");
        } else {
            $.post(
                "controller/change_data/confirm-password-controller.php",
                { confirmPass: currentPass },
                function (data) {
                    if (data.error) {
                        $("#currentPass").addClass("is-invalid");
                        $(".currentPass-error").html(data.msg);
                    } else {
                        $("#currentPass").removeClass("is-invalid");
                    }
                }
            );
        }
    });

    $("#password").keyup(function () {
        password = $(this).val();
        if (password.length < 1) {
            $(this).addClass("is-invalid");
        } else if (password.length < 6) {
            $(this).addClass("is-invalid");
            $(".password-error").html(
                "Jelszónak legalább 6 karakterből kell, hogy álljon."
            );
        } else if (
            password != $("#newPassConfirm").val() &&
            $("#newPassConfirm").val() != ""
        ) {
            $("#newPassConfirm").addClass("is-invalid");
            $(".newPassConfirm-error").html("A jelszavak nem egyeznek meg.");
        } else {
            $("#newPassConfirm").removeClass("is-invalid");
            $(this).removeClass("is-invalid");
        }
    });

    $("#newPassConfirm").keyup(function () {
        newPassConfirm = $(this).val();
        if (newPassConfirm.length < 1) {
            $(this).addClass("is-invalid");
        } else if (
            newPassConfirm != $("#password").val() &&
            $("#password").val() != ""
        ) {
            $(this).addClass("is-invalid");
            $(".newPassConfirm-error").html("A jelszavak nem egyeznek meg.");
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    $("#profil-datas-modify").click(function () {
        $("#modal-content-profile").removeAttr("hidden");
        $("#modal-content-password").attr("hidden", true);
    });

    $("#password-datas-modify").click(function () {
        $("#modal-content-password").removeAttr("hidden");
        $("#modal-content-profile").attr("hidden", true);
    });

    $("#modify-profile-btn").click(function () {
        email = $("#email").val();
        confirmPass = $("#confirm").val();
        goodFields = 0;

        email_field = document.querySelector("#email");
        confirmPass_field = document.querySelector("#confirm");

        if (email.length == 0) {
            $("#email").addClass("is-invalid");
        } else {
            goodFields += 1;
        }

        if (confirmPass.length == 0) {
            $("#confirm").addClass("is-invalid");
        } else {
            goodFields += 1;
        }

        if (goodFields == 2) {
            if (
                email.length > 0 &&
                !email_field.classList.contains("is-invalid") &&
                confirmPass.length > 0 &&
                !confirmPass_field.classList.contains("is-invalid")
            ) {
                $.post(
                    "controller/change_data/update-profile-datas-controller.php",
                    {
                        email: email,
                    },
                    function (response) {
                        $("#successedModify").removeAttr("hidden");
                        $("#successedModify").hide();

                        $("#successedModify").fadeIn(2000);

                        setTimeout(() => {
                            $("#successedModify").fadeOut();
                        }, 4000);
                    }
                );
            } else {
                $("#failedModify").removeAttr("hidden");
                $("#failedModify").hide();

                $("#failedModify").fadeIn(2000);

                setTimeout(() => {
                    $("#failedModify").fadeOut();
                }, 4000);
            }
        }
    });

    $("#modify-password-btn").click(function () {
        password = $("#password").val();
        confirmPass = $("#newPassConfirm").val();
        confirmCurrentPass = $("#currentPass").val();
        goodFields = 0;

        password_field = document.querySelector("#password");
        confirmPass_field = document.querySelector("#newPassConfirm");
        confirmCurrentPass_field = document.querySelector("#currentPass");

        if (password.length == 0) {
            $("#password").addClass("is-invalid");
        } else {
            goodFields += 1;
        }

        if (confirmPass.length == 0) {
            $("#newPassConfirm").addClass("is-invalid");
        } else {
            goodFields += 1;
        }

        if (confirmCurrentPass.length == 0) {
            $("#currentPass").addClass("is-invalid");
        } else {
            goodFields += 1;
        }

        if (goodFields == 3) {
            if (
                password.length > 0 &&
                !password_field.classList.contains("is-invalid") &&
                confirmPass.length > 0 &&
                !confirmPass_field.classList.contains("is-invalid") &&
                confirmCurrentPass.length > 0 &&
                !confirmCurrentPass_field.classList.contains("is-invalid")
            ) {
                $.post(
                    "controller/change_data/update-password-datas-controller.php",
                    {
                        password: password,
                    },
                    function (response) {
                        $("#successedModify").removeAttr("hidden");
                        $("#successedModify").hide();

                        $("#successedModify").fadeIn(2000);

                        setTimeout(() => {
                            $("#successedModify").fadeOut();
                        }, 4000);
                    }
                );
            } else {
                $("#failedModify").removeAttr("hidden");
                $("#failedModify").hide();

                $("#failedModify").fadeIn(2000);

                setTimeout(() => {
                    $("#failedModify").fadeOut();
                }, 4000);
            }
        }
    });
});
