<form class="text-white" id="myform" action="controller/upload-processing-controller.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" accept="image/*" hidden />
    <label for="file"><i class="fa fa-upload fa-5x"></i></label>
    <p class="mb-0 "><?php echo $chooseFileMsg ?></p>
    <p class="mb-0 "><?php echo $requiredFileTypeMsg ?></p>

    <div>
        <p class="filename mt-0"><?php echo $noImageSelectedMsg ?></p>
        <input type="submit" class="btn" name="submit" value="Fénykép feltöltése" />
    </div>
</form>