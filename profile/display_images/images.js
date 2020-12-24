$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

  deletedImageId = -1;
  sorting = "DESC";
  limit = 20;

  $(".sorting a").click(function () {
    if ($(this).text() == "Legrégebbi") {
      sorting = "ASC";
    } else {
      sorting = "DESC";
    }

    $.ajax({
      type: "post",
      url: "display_images/sorting_images.php",
      data: {
        sorting: $(this).text(),
      },
      success: function (data) {
        $("#show_images").html(data);
        $("#more_images").show();
        limit = 20;
        $('[data-toggle="tooltip"]').tooltip();
      },
    });
  });

  $("#more_images").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "display_images/more_images.php",
      data: {
        limit: limit,
        sorting: sorting,
      },
      success: function (data) {
        if (data == 0) {
          $("#more_images").hide();
        } else {
          $(".overflow-auto").css({ "overflow-anchor": "none" });
          $("#show_images").append(data);
          limit += 10;
          $('[data-toggle="tooltip"]').tooltip();
        }
      },
    });
  });

  $("#modal-download").click(function () {
    src = $("#image-modal img").attr("src");
    id = $("#image-modal img").attr("id");

    if (navigator.msSaveBlob) {
      $.post(
        "display_images/download.php",
        {
          imageId: id,
        },
        function (response) {
          var uint8 = new Uint8Array(response.length);
          for (var i = 0; i < uint8.length; i++) {
            uint8[i] = response.charCodeAt(i);
          }

          blob = new Blob([uint8], { type: "image/jpeg;charset=utf-8" });
          navigator.msSaveOrOpenBlob(blob, "fenykep.jpeg");
        }
      );
    } else {
      element = window.document.createElement("a");
      element.setAttribute("href", src);
      element.setAttribute("download", "fenykep.jpeg");

      element.style.display = "none";
      document.body.appendChild(element);

      element.click();

      document.body.removeChild(element);
    }
  });

  $("#delete").click(function () {
    $.post(
      "display_images/delete-image.php",
      {
        image_id: deletedImageId,
      },
      function (response) {
        console.log(response);
        if (response.match(100)) {
          localStorage.setItem("imageIsDeleted", 202);
          location.reload();
        }
      }
    );
  });
});

function closeUpload() {
  document.getElementById("my-upload").style.height = "0%";
}

function openUpload() {
  document.getElementById("my-upload").style.height = "60%";
}

function openImage(src, id) {
  $.post(
    "functions_for_images/select-like.php",
    { image_id: id },
    function (data) {
      if (data == "liked") {
        $("#like").removeClass("fa-heart-o");
        $("#like").addClass("fa-heart").css({ color: "red" });
      } else {
        $("#like").removeClass("fa-heart");
        $("#like").addClass("fa-heart-o").css({ color: "white" });
      }
    }
  );

  $("#image-modal").modal("show");
  $(".modal-image").html("<img src=" + src + " id=" + id + " />");
}

function closeImage() {
  $("#image-modal").modal("hide");
}

function deleteImage(id) {
  $("#confirm-delete-image").modal("show");
  deletedImageId = id;
}
