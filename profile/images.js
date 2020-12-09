$(document).ready(function () {
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
      url: "sorting_images.php",
      data: {
        sorting: $(this).text(),
      },
      success: function (data) {
        $("#show_images").html(data);
        $("#more_images").show();
        limit = 20;
      },
    });
  });

  $("#more_images").click(function () {
    $.ajax({
      type: "get",
      url: "more_images.php",
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
        }
      },
    });
  });

  $("#modal-download").on("click", function () {
    var url = $(".modal-image img")
      .attr("src")
      .replace(/^data:image\/[^;]/, "data:application/octet-stream");
    location.href = url;
  });
});

function closeUpload() {
  document.getElementById("my-upload").style.height = "0%";
}

function openUpload() {
  document.getElementById("my-upload").style.height = "60%";
}

function openImage(src, id) {
  $.post("select-like.php", {image_id:id}, function(data) {
    if (data == "liked") {
      $("#like").removeClass("fa-heart-o");
      $("#like").addClass("fa-heart").css({ color: "red" });
    } else {
      $("#like").removeClass("fa-heart");
      $("#like").addClass("fa-heart-o").css({ color: "white" });
    }
  });

  $("#image-modal").modal("show");
  $(".modal-image").html("<img src=" + src + " id=" + id + " />");
}

function closeImage() {
  $("#image-modal").modal("hide");
}
