<?php require_once("server.php"); ?>

<main>
  <div class="mt-4">
    <div class="gallery p-3" id="show_images">
      <?php
      Flight::set("sql_images", "SELECT * FROM images WHERE user_id = " . $_SESSION['id'] . " ORDER BY uploaded_on DESC LIMIT 20;");
      $result_images = mysqli_query($conn, Flight::get("sql_images"));

      if ($result_images->num_rows > 0) {
        while ($row = mysqli_fetch_array($result_images)) {
          echo '<div class="img"><img id=' . $row['image_id'] . ' src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div data-toggle="tooltip" title="Fénykép törlése után az oldal újratöltődik." class="top-right-delete delete-image" onclick="deleteImage(' . $row['image_id'] . ')"><i class="fa fa-times"></i></div></div>';
        }
      }
      ?>
    </div>

    <?php if ($_SESSION['total'] > 20) { ?>
      <div class="text-center">
        <button class="btn mt-5 mb-5" id="more_images"><?php echo $moreImages ?></button>
      </div>
    <?php } ?>
  </div>

  <div class="modal fade" id="confirm-delete-image" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $deleteModalTitle ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="mb-0"><?php echo $deleteConfirmMsg ?></p>
          <small><?php echo $deleteInfo ?></small> <br />
          <small class="text-danger"><strong><?php echo $deleteInfoTwo ?></strong></small>

          <br />

          <div class="mt-3 text-center">
            <button class="btn btn-danger mr-4 w-25" id="delete"><?php echo $deleteBtn ?></button>
            <button class="btn btn-dark w-25" data-dismiss="modal"><?php echo $skipDeleteBtn ?></button>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<script>
  $("#profile").addClass("active");
</script>