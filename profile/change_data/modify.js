$(document).ready(function () {
  $("#success_msg").hide();

  $("#email").blur(function () {
    email = $(this).val();
    if (email.length < 1) {
      $(this).addClass("is-invalid");
    } else if (email.match(email_Regex) == null) {
      $(this).addClass("is-invalid");
      $(".email-error").html("A megadott email formátum érvénytelen.");
    } else {
      $.post("change_data/modify-email.php", { email: email }, function (data) {
        if (data == "error") {
          $("#email").addClass("is-invalid");
          $(".email-error").html("Ez az email cím már használatban van.");
        } else {
          $("#email").removeClass("is-invalid");
        }
      });
    }
  });

  $("#password").blur(function () {
    password = $(this).val();
    if (password.length < 1) {
      $(this).addClass("is-invalid");
    } else if (password.length < 6) {
      $(this).addClass("is-invalid");
      $(".password-error").html(
        "Jelszónak legalább 6 karakterből kell, hogy álljon."
      );
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  $("#confirm").blur(function () {
    confirmPass = $(this).val();
    if (confirmPass.length < 1) {
      $(this).addClass("is-invalid");
    } else {
      $.post(
        "change_data/confirm-password.php",
        { confirmPass: confirmPass },
        function (data) {
          if (data == "error") {
            $("#confirm").addClass("is-invalid");
            $(".confirm-error").html(
              "Megadott jelszó nem egyezik az őn jelszavával."
            );
          } else {
            $("#confirm").removeClass("is-invalid");
          }
        }
      );
    }
  });

  $("#modify-btn").click(function () {
    email = $("#email").val();
    password = $("#password").val();
    confirmPass = $("#confirm").val();

    email_field = document.querySelector("#email");
    password_field = document.querySelector("#password");
    confirmPass_field = document.querySelector("#confirm");

    if (
      email.length > 0 &&
      !email_field.classList.contains("is-invalid") &&
      password.length > 0 &&
      !password_field.classList.contains("is-invalid") &&
      confirmPass.length > 0 &&
      !confirmPass_field.classList.contains("is-invalid")
    ) {
      $.post(
        "change_data/update-datas.php",
        {
          email: email,
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
  });
});
