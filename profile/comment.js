$(document).ready(function () {
  $("img").click(function () {
    image_id = $(this).attr("id");
    $.post(
      "select-comments.php",
      {
        image_id: image_id,
      },
      function (data) {
        loadComment(data);
      }
    );

    $.post(
      "get-image-owner.php",
      {
        image_id: image_id,
      },
      function (data) {
        $(".image-view-upload-data").html(data);
      }
    );
  });

  function loadComment(data) {
    $("#comments").html(data);
  }

  $("#like").click(function () {

    imageIsLiked = false;
    image_id = $(".modal-image img").attr("id");

    if ($(this).hasClass("fa-heart-o")) {
      $(this).removeClass("fa-heart-o");
      $(this).addClass("fa-heart").css({ color: "red" });
      imageIsLiked = true;
    } else if ($(this).hasClass("fa-heart")) {
      $(this).removeClass("fa-heart");
      $(this).addClass("fa-heart-o").css({ color: "white" });
      imageIsLiked = false;
    }

    $.post("like.php", {imageIsLiked:imageIsLiked, image_id:image_id}, function(data) {
    });
  });

  $("#send-comment").click(function () {
    id = $(".modal-image img").attr("id");
    comment = $("textarea").val().trim();
    if (comment.length > 0) {
      $.post(
        "insert-comment.php",
        {
          id: id,
          comment: comment,
        },
        function (data) {
          if (
            $("#comments p").text() ==
            "Ehhez a fényképhez nem tartózik hozzászólás."
          ) {
            $("#comments").html(data);
          } else {
            $("#comments").append(data);
          }
          $("textarea").val("");
        }
      );
    }
  });
});
