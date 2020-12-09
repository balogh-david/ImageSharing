$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

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
    $.post("logout.php", function() {
      window.location = "../login/login.php";
    });
  });

  $("#username").click(function () {
    window.location = "../login/login.php";
  })
});
