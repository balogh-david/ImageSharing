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
</main>

<script>
  $("#profile").addClass("active");
</script>