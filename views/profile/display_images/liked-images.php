<script>$("#liked-images").addClass("active");</script>

<main>
    <div class="gallery p-3 mt-3" id="show_images">
    <?php foreach ($images as $img) : ?>
          <div class="img"><img id="<?= $img['image_id'] ?>" src="data:image/jpeg;base64,<?=base64_encode($img['image_data']) ?>" onclick="openImage(this.src, this.id);selectComments(this.id)" /><div class="bottom-left-date"><?= $img['uploaded_on'] ?></div><div class="centered"><?= $img['username'] ?></div></div>
        <?php endforeach; ?>
    </div>
    </div>

    <?php if ($nopil > 20) : ?>
      <div class="text-center">
        <button class="btn mt-5 mb-5" id="more_images">További képek...</button>
      </div>
    <?php endif; ?>
</main>

