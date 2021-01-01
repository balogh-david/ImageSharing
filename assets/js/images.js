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
      url: "controller/display_images/sorting-images-controller.php",
      data: {
        sorting: sorting,
        currentSide: $("#currentSide").val(),
      },
      success: function (data) {
        for (i = 0; i < data.images.length; i++) {
          if (i == 0) {
            $("#show_images").html(data.images[i].image);
          } else {
            $("#show_images").append(data.images[i].image);
          }
        }

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
      url: "controller/display_images/more-images-controller.php",
      data: {
        limit: limit,
        sorting: sorting,
        currentSide: $("#currentSide").val(),
      },
      success: function (data) {
        if (data.images) {
          for (i = 0; i < data.images.length; i++) {
            $(".overflow-auto").css({ "overflow-anchor": "none" });
            $("#show_images").append(data.images[i].image);
          }
        }

        if (data.noMoreImage) {
          $("#more_images").hide();
        }

        limit += 10;
        $('[data-toggle="tooltip"]').tooltip();
      },
    });
  });

  $("#modal-download").click(function () {
    src = $("#image-modal img").attr("src");
    id = $("#image-modal img").attr("id");

    element = window.document.createElement("a");
    element.setAttribute("href", src);
    element.setAttribute("download", "fenykep.jpeg");

    element.style.display = "none";
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
  });

  $("#delete").click(function () {
    $.post(
      "controller/display_images/delete-image-controller.php",
      {
        image_id: deletedImageId,
      },
      function (response) {
        if (response.delete) {
          localStorage.setItem("imageIsDeleted", 202);
          location.reload();
        } else {
          localStorage.setItem("imageIsNotDeleted", 300);
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
    "controller/function_for_images/select-like-controller.php",
    { image_id: id },
    function (data) {
      if (data.liked) {
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
