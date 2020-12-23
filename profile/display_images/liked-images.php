<?php
$_SESSION['side'] = "liked-images";
?>

<script src="display_images/images.js"></script>

<script>
  $("#liked-images").addClass("active");
</script>

<main>
    <div class="gallery p-3 mt-3" id="show_images">
      <?php
      Flight::set("sql_images", "SELECT * FROM images WHERE image_id IN (SELECT image_id FROM likes WHERE user_id='" . $_SESSION["id"] . "') ORDER BY uploaded_on DESC LIMIT 20");
      $result_images = mysqli_query($conn, Flight::get("sql_images"));

      if ($result_images->num_rows > 0) {
        while ($row = mysqli_fetch_array($result_images)) {
          echo '<div class="img"><img id="' . $row['image_id'] . '" src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date">' . $row['uploaded_on'] . '</div><div class="centered">' . $row['username'] . '</div></div>';
        }
      }
      ?>
    </div>

    <?php if ($count_NOPIL['NOPIL'] > 20) { ?>
      <div class="text-center">
        <button class="btn mt-5 mb-5" id="more_images">További képek...</button>
      </div>
    <?php } ?>
</main>

