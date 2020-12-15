$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

  showResponseMessage("login", "#successedLogin");
  showResponseMessage("success_upload", "#successedUpload");
  showResponseMessage("failed_upload", "#failedUpload");
  showResponseMessage("wrong_file_type", "#wrongFileType");
  showResponseMessage("empty_upload", "#empty_upload")

  function showResponseMessage(localStorageItem, attrName) {
    if (localStorage.getItem(localStorageItem)) {
      localStorage.removeItem(localStorageItem);
      $(attrName).removeAttr("hidden");
      $(attrName).hide();
  
      $(attrName).fadeIn(2000);
  
      setTimeout(() => {
        $(attrName).fadeOut();
      }, 4000);
    }
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
