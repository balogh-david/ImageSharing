$(document).ready(function () {

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

    $.post("functions_for_images/like.php", {imageIsLiked:imageIsLiked, image_id:image_id}, function(data) {
    });
  });

  $("#send-comment").click(function () {
    id = $(".modal-image img").attr("id");
    comment = $("textarea").val().trim();
    if (comment.length > 0) {
      $.post(
        "functions_for_images/insert-comment.php",
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

function selectComments(id) {
  $.post(
    "functions_for_images/select-comments.php",
    {
      image_id: id,
    },
    function (data) {
      $("#comments").html(data);
    }
  );

  $.post(
    "functions_for_images/get-image-owner.php",
    {
      image_id: id,
    },
    function (data) {
      $(".image-view-upload-data").html(data);
    }
  );
}
