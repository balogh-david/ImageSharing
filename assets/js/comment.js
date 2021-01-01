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

        $.post(
            "controller/function_for_images/like-controller.php",
            {
                imageIsLiked: imageIsLiked,
                image_id: image_id,
            },
            function (data) {}
        );
    });

    $("#send-comment").click(function () {
        id = $(".modal-image img").attr("id");
        comment = $("textarea").val().trim();
        if (comment.length > 0) {
            $.post(
                "controller/function_for_images/insert-comment-controller.php",
                {
                    id: id,
                    comment: comment,
                },
                function (data) {
                    if (
                        $("#comments p").text() ==
                        "Ehhez a fényképhez nem tartózik hozzászólás."
                    ) {
                        $("#comments").html(data.comment);
                    } else {
                        $("#comments").append(data.comment);
                    }
                    $("textarea").val("");
                }
            );
        }
    });
});

function selectComments(id) {
    $.post(
        "controller/function_for_images/select-comments-controller.php",
        {
            image_id: id,
        },
        function (data) {
            if (data.comments) {
                for (i = 0; i < data.comments.length; i++) {
                    if (i == 0) {
                        $("#comments").html(data.comments[i].comment);
                    } else {
                        $("#comments").append(data.comments[i].comment);
                    }
                }
            } else {
                $("#comments").html(data.noComment);
            }
        }
    );

    $.post(
        "controller/function_for_images/get-image-owner-controller.php",
        {
            image_id: id,
        },
        function (data) {
            $(".image-view-upload-data").html(data.imageOwner);
        }
    );
}
