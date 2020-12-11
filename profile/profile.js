$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

  if (localStorage.getItem("login")) {
    localStorage.removeItem("login");
    $("#successedLogin").removeAttr("hidden");
    $("#successedLogin").hide();

    $("#successedLogin").fadeIn(2000);

    setTimeout(() => {
      $("#successedLogin").fadeOut();
    }, 4000);
  }

  if (localStorage.getItem("success_upload")) {
    localStorage.removeItem("success_upload");
    $("#successedUpload").removeAttr("hidden");
    $("#successedUpload").hide();

    $("#successedUpload").fadeIn(2000);

    setTimeout(() => {
      $("#successedUpload").fadeOut();
    }, 4000);
  }

  if (localStorage.getItem("failed_upload")) {
    localStorage.removeItem("failed_upload");
    $("#failedUpload").removeAttr("hidden");
    $("#failedUpload").hide();

    $("#failedUpload").fadeIn(2000);

    setTimeout(() => {
      $("#failedUpload").fadeOut();
    }, 4000);
  }

  $("#file").change(function () {
    if ($(this).val() == "") {
      $(".filename").text("Nincs kiválasztott fénykép.");
    } else {
      $(".filename").text(
        $(this)
          .val()
          .substr($(this).val().lastIndexOf("\\") + 1)
      );
    }
  });

  $("#new_images").click(function () {
    $(this).addClass("active");
    $("#old_images").removeClass("active");
  });

  $("#old_images").click(function () {
    $(this).addClass("active");
    $("#new_images").removeClass("active");
  });

  $("#logout").click(function () {
    $.post("logout.php", function () {
      window.location = "../login/login.php";
    });
  });

  $("#username").click(function () {
    window.location = "../login/login.php";
  });
});
