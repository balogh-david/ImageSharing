<div class="modal" id="image-modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-title">
        <div>
          <a class="btn mr-2" id="modal-download">Letöltés</a>
          <button class="btn" id="like-btn"><i class="fa fa-heart-o fa-lg" id="like"></i></button>
        </div>
        <div class="mr-4 pb-3 pt-0">
          <a class="closebtn" onclick="closeImage()">&times;</a>
        </div>
      </div>

      <div class="modal-image text-center"></div>
      
      <div>
        <p class="ml-4 image-view-upload-data text-center"></p>
      </div>

      <div>
        <div class="ml-3 mr-3 mt-3 pl-2 pr-2" id="comments"></div>

        <div class="text-center mb-3 mt-3">
          <textarea class="ml-3 mr-3 text-center" rows="1" placeholder="Hozzászólás írása..."></textarea>
          <br />
          <button class="btn mt-3" id="send-comment">Hozzászólás elküldése</button>
        </div>
      </div>
    </div>
  </div>
  <script src="functions_for_images/comment.js"></script>
</div>